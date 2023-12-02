@extends('layouts.admin')

@section('content')
{{-- @php
    $types = config('types')
@endphp --}}


    <h1>Lista Tipi</h1>

    <div class="container my-5">

        <form action="{{ route('admin.types.store') }}" method="POST">
            @csrf

            <div class="input-group mb-3">

                <input type="text" class="form-control" placeholder="Nome nuovo tipo" id="new-type-input" name="name">

                <button type="submit" class="btn btn-warning">Invia</button>

            </div>


        </form>


        <ul>
            @foreach ($types as $type)
            <li>
                {{$type->name}}
            </li>
            @endforeach

        </ul>

    </div>

@endsection


@section('title')
Lista tipi
@endsection
