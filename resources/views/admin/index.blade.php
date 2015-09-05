@extends('layouts.base')

@section('content')

    <ul class="list-group">
      @foreach($errors->all() as $error)
        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
      @endforeach
    </ul>

    {!! Form::open(['url' => '/admin/login', 'method' => 'post', 'class' => 'form']) !!}
      <div class="form-inline">
        {!! Form::text('username', null, array('required', 'style' => 'width: 200px;', 'class' => 'form-control', 'placeholder' => 'username')) !!}
        {!! Form::password('password', array('required', 'class' => 'form-control', 'placeholder' => 'password')) !!}
        {!! Form::submit('Login', array('class' => 'btn btn-primary')) !!}
      </div>
    {!! Form::close() !!}
@endsection
