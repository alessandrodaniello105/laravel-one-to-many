@extends('layouts.admin')

@section('content')

    <h1>Lista Tecnologie</h1>

    <ul>
        @foreach ($technologies as $technology)
        <li>
            <a href="{{$technology->link}}">{{$technology->name}}</a>
        </li>
        @endforeach

    </ul>

@endsection


@section('title')
Lista tecnologie
@endsection
