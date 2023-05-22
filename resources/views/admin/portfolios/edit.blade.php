@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="my-4">Modifica progetto: {{ $portfolio->name }}</h1>
        <form action="{{ route('admin.portfolios.update', $portfolio) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $portfolio->name) }}">
                @error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="@error('description') is-invalid @enderror" name="description" id="description" cols="200" rows="10">{{ old('description', $portfolio->description) }}</textarea>
                @error('description')<div class="alert alert-danger">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="start_date">Data</label>
                <input class="@error('start_date') is-invalid @enderror" type="date" id="start_date" name="start_date" value="{{ old('start_date', $portfolio->start_date) }}">
                @error('start_date')<div class="alert alert-danger">{{ $message }}</div>@enderror
            </div>

            <div class="form-check form-switch mt-5 d-flex justify-content-center">
                <label class="form-check-label me-5" for="set_image">Gestione immagine</label>
                <input class="form-check-input" type="checkbox" role="switch" id="set_image" value="1" name="set_image" @if($portfolio->image) checked @endif>
            </div>

            <div class="mb-3 @if(!$portfolio->image) d-none @endif" id="image-input-box">
                <label for="image" class="form-label">Immagine</label>
                <input class="form-control" type="file" id="image" name="image">

                {{-- Anteprima immagine upload--}}
                <div class="preview w-50 m-auto">
                    <img class="img-fluid" id="file-image-preview" @if($portfolio->image) src="{{ asset('storage/' . $portfolio->image) }}" @endif>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salva modifiche</button>

        </form>
    </div>
@endsection
