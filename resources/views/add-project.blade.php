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
                <form method="post" action="{{route('store-project')}}">
                    @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Project Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Project name">
                </div>            
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>           
                        </div>
@endsection
                