@extends('layouts.dash')

@section('contenu')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4 d-flex justifyp-content-center mb-3"><span style="color: green">Bienvenue</span>, <Strong>{{username()}}</h1>
    
      <div class="d-flex justify-content-center">
      {{-- <img class="rounded  d-block" src="{{asset('images/armoirie2.jpg')}}"> --}}
      <img width="50%" height="50%"  src="{{asset('images/armoirie2.jpg')}}">
    </div>
    <hr class="my-4">
  </div>
</div>
@endsection