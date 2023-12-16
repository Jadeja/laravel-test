<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TEST </title>
    <!-- Latest compiled- and minified CSS -->
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<style>
    body { background-color:#fafafa;}
        .table-sortable {
            position: relative;
        }
        .table-sortable .sortable-placeholder {
            height: 37px;
        }
        .table-sortable .sortable-placeholder:after {
            position: absolute;
            z-index: 10;
            content: " ";
            height: 37px;
            background: #f9f9f9;
            left: 0;
            right: 0;
        }
	</style>
</head>
<body>
    <div class="container" style="margin-top:150px;">
        <header>
        </header>
        @yield('content')
        <!-- <div class="tab-content">
            <div><a class="btn btn-primary" href="{{ route('add')}}">Add Task</a></div>
            <div class="tab-pane fade in active" id="demos">
                <section>
                    <h2>Sortable table</h2>
                    <table class="table table-sortable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><span class="glyphicon glyphicon-move"></span> 1</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <td><span class="glyphicon glyphicon-move"></span> 2</td>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <td><span class="glyphicon glyphicon-move"></span> 3</td>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        </tbody>
                    </table>
                </section>
                            
            </div>
        </div> -->
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="{{ asset('js/app.js')}}"></script>
	<!-- <script>
		$(function() {
            $('.thumbnail-sortable').sortable({
                placeholderClass: 'col-sm-6 col-md-4'
            });
            $('.table-sortable tbody').sortable({
                handle: 'span'
            });
            $('.list-group-sortable').sortable({
                placeholderClass: 'list-group-item'
            });
            $('.list-group-sortable-exclude').sortable({
                placeholderClass: 'list-group-item',
                items: ':not(.disabled)'
            });
            $('.list-group-sortable-handles').sortable({
                placeholderClass: 'list-group-item',
                handle: 'span'
            });
            $('.list-group-sortable-connected').sortable({
                placeholderClass: 'list-group-item',
                connectWith: '.connected'
            });
		});
	</script> -->
    @yield("js")
</body>
</html>
