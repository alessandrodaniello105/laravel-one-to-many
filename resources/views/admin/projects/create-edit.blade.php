@extends('layouts.admin')

@section('content')

@if ($errors->any())

<div class="alert alert-danger">

    <ul>
        @foreach ($errors->all() as $error)
        <li>
            {{$error}}
        </li>

        @endforeach
    </ul>

</div>


@endif

    <h1>{{ $title }}</h1>

    <form
      action="{{ $route }}"
      method="POST"
      enctype="multipart/form-data">

        @csrf
        @method( $method )


        <div class="container p-3">

        {{-- TITOLO --}}
        <div class="mb-3">
            <label for="title" class="form-label">Inserisci il titolo del progetto</label>
            <input
              type="text"
              class="form-control @error('title') is-invalid @enderror"
              placeholder="Progetto bello"
              name="title"
              value="{{old('title', $project?->title )}}">

            @error('title')
                <ul class="text-danger mt-1">
                    <li><p class="">{{$message}}</p></li>
                </ul>
            @enderror

        </div>


        {{-- DESCRIZIONE --}}
        <div class="form-floating mb-3">
            <textarea
              class="form-control @error('description') is-invalid @enderror"
              id="description"
              name="description"
              style="height: 100px"
              placeholder="Descrizione del progetto"
              >{{old('description', $project?->description)}}</textarea>

            <label for="description">Descrizione del progetto</label>

            @error('description')
                <ul class="text-danger mt-1">
                    <li><p class="">{{$message}}</p></li>
                </ul>
            @enderror

        </div>

        {{-- IMMAGINE --}}
        <div class="mb-3">
            <label for="image" class="form-label">Carica un'immagine</label>
            <input
              id="image"
              type="file"
              class="form-control"
              name="image"
              value={{old('image', $project?->image)}}>
        </div>

        {{-- se al progetto non è impostata un'immagine, vado a prendere il placeholder dalla cartella img dentro public, --}}
        {{-- <img src="{{Storage::}} {{$project?->image ?? asset()}}" alt=""> --}}


        {{-- TECNOLOGIE --}}
        <div class="mb-3">
            <select
              class="form-select @error('technologies') is-invalid @enderror"
              name="technology_id"
              id="technology_id"
              value="{{old('technology_id', $project?->technology_id)}}">

                <option value="0">Scegli la tecnologia principale</option>

                @foreach ($technologies as $tech)

                    <option {{($project?->technology_id === $tech->id)? 'selected' : ''}} value="{{$tech->id}}">
                        {{$tech->name}}
                    </option>

                    {{-- <option @if ($project?->technologies === $tech->name) selected @endif value="{{$tech->name}}">
                        {{$tech->name}}
                    </option> --}}

                @endforeach
            </select>

            {{-- @error('technologies')
                <ul class="text-danger mt-1">
                    <li><p class="">{{$message}}</p></li>
                </ul>
            @enderror --}}

        </div>

        {{-- TIPO --}}
        <div class="mb-3">
            <select
              class="form-select @error('type_id') is-invalid @enderror"
              name="type_id"
              id="type_id"
              value="{{old('type_id')}}"
              >

                <option value="0">Scegli il tipo</option>

                @foreach ($types as $type)
                    <option @if ($type->id === old('type_id', $project?->type?->id)) selected @endif value="{{$type->id}}">{{$type->name}}</option>
                @endforeach

            </select>

            @error('type')
                <ul class="text-danger mt-1">
                    <li><p class="">{{$message}}</p></li>
                </ul>
            @enderror

        </div>

        {{-- LINK --}}
        <div class="mb-3">

            <label for="link" class="form-label">Inserisci il link al progetto</label>

           <input
              type="text"
              class="form-control @error('link') is-invalid @enderror"
              placeholder="https://..."
              name="link"
              value="{{old('link')}}">

            @error('link')
                <ul class="text-danger mt-1">
                    <li><p class="">{{$message}}</p></li>
                </ul>
            @enderror

        </div>

        <button type="submit" class="btn btn-primary">Invia</button>
        <button type="reset" class="btn btn-danger">Pulisci i campi</button>

        <a class="btn btn-secondary" href="{{ route('admin.projects.index') }}">Annulla</a>

    </form>

@endsection

@section('title')
Crea un progetto
@endsection
