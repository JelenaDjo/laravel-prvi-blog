@extends('layouts.master')

@section ('title')
    Create post
@endsection


@section('content')

<h2> Login Users</h2>
<form method="POST" action="/login">
    {{ csrf_field() }}

       
        <div class="form-group">
            <label>Email</label>
            <input name="email" type="text" class="form-control" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input name="password" type="password" class="form-control"  placeholder="Enter password">
        </div>
     <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    
    @if(count($errors->all()))
        @foreach($errors->all() as $error)
        <div class="alter alter-danger">
            {{ $error }}
        </div> 
        @endforeach
    @endif    
@endsection


