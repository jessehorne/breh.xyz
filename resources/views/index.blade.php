@extends('layouts.base')

@section('title', 'Home')

@section('content')
  @if(Session::get('url'))
    <ul class="list-group">
      <li class="list-group-item list-group-item-success">
        {{ "http://127.0.0.1:8000/s/" . Session::get('url') }}
      </li>
    </ul>
  @endif

  {!! Form::open(['route' => 'create', 'class' => 'form']) !!}
    <div class="form-inline">
      {!! Form::text('url', null, array('required', 'class' => 'form-control', 'placeholder' => 'http://example.com')) !!}
      {!! Form::submit('Shorten', array('class' => 'btn btn-primary')) !!}
    </div>
  {!! Form::close() !!}

  <ul class="list-group">
    @foreach($errors->all() as $error)
      <li class="list-group-item list-group-item-warning"> {{ $error }}</li>
    @endforeach
  </ul>

  <div style="position: absolute; width: 100%; left: auto; right: auto; bottom: 50px;">
    Made with <a href="http://laravel.com/">Laravel</a>
    and <a href="http://getbootstrap.com/">Bootstrap</a>
    by <a href="http://jessehorne.github.io/">me</a>
  </div>
@endsection
