@extends('master')
@section("content")
        <div class="tab-content">
            <div style="display:flex;">
                <div><a class="btn btn-primary" href="{{ route('add')}}">Add Task</a></div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div><a class="btn btn-primary" href="{{ route('add-project')}}">Add Project</a></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Select Project</label>
                    <select id="project_id" name="project_id" class="form-control">
                        <option value="">All</option>
                        @foreach($project_list as $key => $value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            <div class="tab-pane fade in active" id="demos">
                <section>
                    <h2>Task List</h2>
                    <table class="table table-sortable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Task Name</th>
                            <th>Priority</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="tbody">
                        @foreach($tasks as $task)
                        <tr>
                            <td><span class="glyphicon glyphicon-move"></span> {{$task->id}}</td>
                            <td>{{$task->name}}</td>
                            <td>{{$task->priority}}</td>
                            <td>
                                <a class="btn btn-secondary" href="{{route('edit',$task->id)}}">Edit</a>
                                <a class="btn btn-secondary" onclick="deleteTask('{{$task->id}}')">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    
                        </tbody>
                    </table>
                </section>
                            
            </div>
        </div>
    
	@csrf
@endsection

@section("js")
<script>

            function deleteTask(id)
            {
                if(confirm("are you sure you want to delete it ?")){        
                $("#tbody").html('<tr><td></td><td>Please wait loding ....</td><td></td></tr>');
                $.post("delete/"+id,{
                data : {}
                },
                function(data, status){

                    $("#tbody").html(data);
                    $('.table-sortable tbody').sortable({
                        handle: 'span'
                    });
                });
                }
            } 
		$(function() {
            $('.thumbnail-sortable').sortable({
                placeholderClass: 'col-sm-6 col-md-4'
            });
            $('.table-sortable tbody').sortable({
                handle: 'span'
            });


            $('.table-sortable tbody').sortable().bind('sortupdate', function(e, ui) {
                console.log(e.target.children[0].children[0].innerText); //
                let array = e.target.children;
                updatedSortList={};
                for (const [key, value] of Object.entries(array)) {
                    console.log(`${key}: ${value.children[0].innerText}`);
                    updatedSortList[key]=parseInt(value.children[0].innerText);
                }
                $("#tbody").html('<tr><td></td><td>Please wait loding ....</td><td></td></tr>');
                $.post("{{route('reorder-list')}}",{
                data : JSON.stringify(updatedSortList)
                },
                function(data, status){

                    $("#tbody").html(data);
                    $('.table-sortable tbody').sortable({
                        handle: 'span'
                    });
                });

                console.log(updatedSortList);   
            });
           
            $("#project_id").on('change',function(){
                    
                $("#tbody").html('<tr><td></td><td>Please wait loding ....</td><td></td></tr>');
                $.post("{{route('project-wise-list')}}",{
                project_id:this.value 
                },
                function(data, status){

                    $("#tbody").html(data);
                    $('.table-sortable tbody').sortable({
                        handle: 'span'
                    });
                });                    
            });
		});


	</script>
@endsection