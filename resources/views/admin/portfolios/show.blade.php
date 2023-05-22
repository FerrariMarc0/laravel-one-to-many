@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">{{$portfolio->name}}</h1>

        <div class="card w-75 m-auto">
            <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->name }}">
            <hr>
            <p>{{$portfolio->description}}</p>
        </div>
        <a class="btn btn-warning" href="{{ route('admin.portfolios.edit', $portfolio) }}">Modifica</a>
    </div>
@endsection
