@extends('layouts.master')

@section ('title')
    Create post
@endsection

@section('content')
<h2>Registration </h2>

<form method="POST" action="/register">
    {{ csrf_field() }}

        <div class="form-group">
            <label>Name</label>
            <input name="name" type="text" class="form-control"  placeholder="Enter name">
            @include('layouts.partials.error-message', ['field'=>'name'])
        </div>
        <div class="form-group">
            <label>Email</label>
            <input name="email" type="text" class="form-control" placeholder="Enter email">
            @include('layouts.partials.error-message', ['field'=>'email'])
        </div>
        <div class="form-group">
            <label>Age</label>
            <input name="age" type="text" class="form-control" >
            @include('layouts.partials.error-message', ['field'=>'email'])
        </div>
        <div class="form-group">
            <label>Password</label>
            <input name="password" type="password" class="form-control"  placeholder="Enter password">
            @include('layouts.partials.error-message', ['field'=>'password'])
        </div>
     <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection