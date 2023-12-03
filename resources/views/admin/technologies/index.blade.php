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

        <div class="card">
            <ul style="list-style: none;" class="d-flex justify-content-around flex-wrap text-center">
                @foreach ($technologies as $technology)
                <li class="rounded my-3 btn-colored">
                    <a style="width: 300px" class="p-4 d-inline-block" href="{{$technology->link}}">{{$technology->name}}</a>
                </li>
                @endforeach

            </ul>
        </div>

    </div>


@endsection


@section('title')
Lista tecnologie
@endsection
