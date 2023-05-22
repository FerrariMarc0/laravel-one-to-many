@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h1 class="my-4">Type's list</h1>
            <a class="btn btn-primary" href="{{ route('admin.types.create') }}">Nuovo Tipo</a>
        </div>

        @if(@session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Opzioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                <tr>
                    <th scope="row">{{ $type->id }}</th>
                    <td>{{ $type->name }}</td>
                    <td>{{ $type->slug }}</td>
                    <td>
                        <ul class="list-unstyled d-flex justify-content-end gap-1 m-0">
                            <li><a class="btn btn-primary" href="{{ route('admin.types.show', $type)  }}">Dettagli</a></li>
                            <li><a class="btn btn-warning" href="{{ route('admin.types.edit', $type) }}">Modifica</a></li>
                            <li><a class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#type-{{$type->id}}">Elimina</a></li>
                        </ul>
                    </td>
                </tr>

                    <!-- Modal -->
                <div class="modal fade" id="type-{{$type->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Attenzione!</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <span>Vuoi eliminare definitivamente questo tipo? <strong>(ID:{{$type->id}})</strong></span>
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('admin.types.destroy', $type) }}" method="POST">
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
