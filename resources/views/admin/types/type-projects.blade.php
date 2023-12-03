@extends('layouts.admin')

@section('content')


    <h1>Lista Progetti per Tipi</h1>

    <div class="container my-5">

        <ul>
            {{-- ciclo i tipi --}}
            @foreach ($types as $type)
            <li> {{ $type->name }}
                <ul>

                    {{-- ciclo i progetti per tipo --}}
                    @foreach ($type->typeProjects as $project)
                    <li>
                        <a href="{{ route('admin.projects.show', $project) }}">{{ $project->title }}</a>
                    </li>
                    @endforeach
                </ul>


            </li>
            @endforeach

        </ul>

    </div>

@endsection


@section('title')
Lista Progetti per Tipi
@endsection
