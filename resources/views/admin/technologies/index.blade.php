@extends('layouts.admin')

@section('content')

    <h1>Lista Tecnologie</h1>

    <div class="container my-5">

        <form action="{{ route('admin.technologies.store') }}" method="POST">
            @csrf

            <div class="input-group mb-3">

                <input type="text" class="form-control" placeholder="Nome nuova tecnologia" id="new-technology-input" name="name">

                <button type="submit" class="btn btn-warning">Invia</button>

            </div>


        </form>

        <ul>
            @foreach ($technologies as $technology)
            <li>
                <a href="{{$technology->link}}">{{$technology->name}}</a>
            </li>
            @endforeach

        </ul>

    </div>


@endsection


@section('title')
Lista tecnologie
@endsection
