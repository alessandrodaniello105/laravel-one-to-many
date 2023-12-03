@extends('layouts.admin')

@section('content')

    <h1>Lista Tipi</h1>

    @if (session('success'))
        <div class="alert alert-primary" role="alert">
            {{session('success')}}
        </div>
    @endif

    <div class="container my-3">
        <div class="row">

            {{-- Lista tipi + numero progetti --}}
            <div class="col col-4 float-start">
                <div class="card">
                    <div class="card-body">
                        <table class="table">

                            <thead>
                              <tr>
                                <th scope="col">Nome</th>
                                <th class="text-center" scope="col">Numero progetti</th>
                                <th scope="col">Azioni</th>
                              </tr>
                            </thead>

                            <tbody>

                                @foreach ($types as $type)
                                <tr>
                                    <td>{{$type->name}}</td>
                                    <td class="text-center">{{count($type->typeProjects)}}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{route('admin.types.edit', $type)}}">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>

                                        @include('admin.partials.formDelete', ["route" => route('admin.types.destroy', $type)])
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

            {{-- Colonna crea/edit tipo --}}
            <div class="col-3 float-start">

                {{-- Card creazione --}}
                <div class="card">
                    <div class="card-body">

                        <h3>Crea un nuovo tipo</h3>

                        <form action="{{ route('admin.types.store') }}" method="POST">
                            @csrf

                            <div class="input-group mb-3">

                                <input type="text" class="form-control" placeholder="Nome nuovo tipo" id="new-type-input" name="name">

                                <button type="submit" class="btn btn-warning">Invia</button>

                            </div>


                        </form>

                    </div>

                </div>
                {{-- /Card creazione --}}

                {{-- Card modifica --}}
                @if (Route::currentRouteName() !== 'admin.types.index')
                <div class="card my-3">
                    <div class="card-body">

                        <h3>Edita un tipo</h3>

                        <form action="{{ route('admin.types.update', $type) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="input-group mb-3">

                                <input type="text" class="form-control" placeholder="Nuovo nome tipo"  name="name" value="{{ $sel_type?->name}}">

                                <button type="submit" class="btn btn-warning">Invia</button>

                            </div>

                        </form>

                    </div>
                </div>
                @endif

                {{-- /Card modifica --}}

            </div>

        </div>


        {{-- <div class="mx-3 col-3 float-start">
            <h3>Crea un nuovo tipo</h3>
            <form action="{{ route('admin.types.store') }}" method="POST">
                @csrf

                <div class="input-group mb-3">

                    <input type="text" class="form-control" placeholder="Nome nuovo tipo" id="new-type-input" name="name">

                    <button type="submit" class="btn btn-warning">Invia</button>

                </div>


            </form>
        </div> --}}
    </div>


    {{-- <div class="container my-5">



        <ul>
            @foreach ($types as $type)
            <li>
                {{$type->name}}
            </li>
            @endforeach

        </ul>

    </div> --}}

@endsection


@section('title')
Lista tipi
@endsection
