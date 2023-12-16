@extends('master')
@section("content")
        <div class="tab-content">
        <div><a class="btn btn-primary" href="{{ route('home')}}">Back</a></div>

            @if(Session::has('flash'))
            <div class="alert alert-success">{{ Session::get('flash')}}</div>                
            @endif
            @if($errors->any())
                 @foreach($errors->all() as $error)   
                <div class="alert alert-warning">{{$error}}</div>                
                @endforeach
            @endif
                <form method="post" action="{{route('store')}}">
                    @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Task Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Task name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Priority</label>
                    <select name="priority" class="form-control">
                        <option value="">Select Priority</option>
                        <option value="1">High</option>
                        <option value="2">Medium</option>
                        <option value="3">Low</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Select Project</label>
                    <select name="project_id" class="form-control">
                        <option value="">Select Project</option>
                        @foreach($project_list as $key => $value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>           
                        </div>
@endsection
                