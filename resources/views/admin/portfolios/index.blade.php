@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h1 class="my-4">Progetti</h1>
            <a class="btn btn-primary" href="{{ route('admin.portfolios.create') }}">Nuovo progetto</a>
        </div>

        @if(@session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome Progetto</th>
                    <th scope="col">Data inizio</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Opzioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($portfolios as $portfolio)
                <tr>
                    <th scope="row">{{ $portfolio->id }}</th>
                    <td>@if($portfolio->image) <span class="badge bg-secondary p-2">Img</span> @endif{{ $portfolio->name }}</td>
                    <td>{{ $portfolio->start_date }}</td>
                    <td>{{ $portfolio->description }}</td>
                    <td>{{ $portfolio->slug }}</td>
                    <td>
                        <ul class="list-unstyled d-flex flex-column gap-3">
                            <li><a class="btn btn-primary" href="{{ route('admin.portfolios.show', $portfolio)  }}">Dettagli</a></li>
                            <li><a class="btn btn-warning" href="{{ route('admin.portfolios.edit', $portfolio) }}">Modifica</a></li>
                            <li><a class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#portfolio-{{$portfolio->id}}">Elimina</a></li>
                        </ul>
                    </td>
                </tr>

                    <!-- Modal -->
                <div class="modal fade" id="portfolio-{{$portfolio->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Attenzione!</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <span>Vuoi eliminare definitivamente questo progetto? <strong>(ID:{{$portfolio->id}})</strong></span>
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Indietro</button>
                                    <button type="submit" class="btn btn-danger">Elimina</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
