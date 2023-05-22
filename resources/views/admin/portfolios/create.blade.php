@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Creazione progetto</h1>
        <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                @error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="@error('description') is-invalid @enderror" name="description" id="description" cols="200" rows="10">{{ old('description') }}</textarea>
                @error('description')<div class="alert alert-danger">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="start_date">Data</label><br>
                <input class="@error('start_date') is-invalid @enderror" type="date" id="start_date" name="start_date" value="{{ old('start_date') }}">
                @error('start_date')<div class="alert alert-danger">{{ $message }}</div>@enderror
            </div>

            {{-- Anteprima immagine upload--}}
            <div class="preview w-25 m-auto">
                <img class="img-fluid" id="file-image-preview">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
@endsection
