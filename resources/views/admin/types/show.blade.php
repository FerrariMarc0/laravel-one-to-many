@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">{{$type->name}}</h1>

        <h4>Lista dei progetti associati a questo tipo:</h4>
        <ul>
            @foreach ($type->portfolios as $portfolio)
                <li><a href="{{ route('admin.portfolios.edit', $portfolio) }}">{{ $portfolio->name }}</a></li>
            @endforeach
        </ul>
        <a class="btn btn-warning" href="{{ route('admin.types.edit', $type) }}">Modifica</a>
    </div>
@endsection
