@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
  <ul class="list-group">
    <li class="list-group-item">
      <b>Page Views - </b>
      <p style="display: inline-block; margin-left: 10px;">{{ DB::table('stats')->first()->page_views }}</p>
    </li>
    <li class="list-group-item">
      <b>Links Created -</b>
      <p style="display: inline-block; margin-left: 10px;">{{ DB::table('stats')->first()->links_created }}</p>
    </li>
  </ul>
@endsection
