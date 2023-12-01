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

    <form action="{{ $route }}" method="POST">
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
            <label for="img-input" class="form-label">Carica un'immagine</label>
            <input id="img-input" type="file" class="form-control">
        </div>


        {{-- TECNOLOGIE --}}
        <div class="mb-3">
            <select
              class="form-select @error('technologies') is-invalid @enderror"
              name="technologies"
              value="{{old('technologies', $project?->technologies)}}">

                <option value="0">Scegli la tecnologia principale</option>

                @foreach ($technologies as $tech)

                    <option {{($project?->technologies === $tech->name)? 'selected' : ''}} value="{{$tech->name}}">
                        {{$tech->name}}
                    </option>

                    {{-- <option @if ($project?->technologies === $tech->name) selected @endif value="{{$tech->name}}">
                        {{$tech->name}}
                    </option> --}}

                @endforeach
            </select>

            @error('technologies')
                <ul class="text-danger mt-1">
                    <li><p class="">{{$message}}</p></li>
                </ul>
            @enderror

        </div>

        {{-- TECNOLOGIE  se fosse un array--}}
        {{--
        <div class="form-check mb-3">

            @foreach ($technologies as $tech)

            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
              Default radio
            </label>
            @endforeach

        </div> --}}


        {{-- TIPO --}}
        <div class="mb-3">
            <select
              class="form-select @error('type') is-invalid @enderror"
              name="type"
              value="{{old('type', $project?->type)}}">

                <option value="0">Scegli il tipo</option>

                @foreach ($types as $type)
                    <option @if ($project?->type === $type->name) selected @endif value="{{$type->name}}">{{$type->name}}</option>
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
