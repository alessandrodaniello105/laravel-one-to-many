@extends('layouts.admin')

@section('content')

    <h1>Lista Progetti | <a href="{{route('admin.projects.create')}}"><i class="fa-solid fa-square-plus"></i></a></h1>

    @if (session('success'))
        <div class="alert alert-primary" role="alert">
            {{session('success')}}
        </div>
    @endif

    <ul id="projects-list">
        @foreach ($projects as $project)
        <li>
            ID: {{$project->id}} | Titolo Progetto: {{$project->title}} | Tecnologie utilizzate: {{$project->technology->name}} |

            {{-- SHOW BUTTON --}}
            <a class="btn btn-primary" href="{{route('admin.projects.show', $project)}}">
                <i class="fa-solid fa-eye"></i>
            </a>

            {{-- EDIT BUTTON --}}
            <a class="btn btn-warning" href="{{route('admin.projects.edit', $project)}}">
                <i class="fa-solid fa-pencil"></i>
            </a>

            {{-- DELETE BUTTON --}}
            <form class="d-inline-block" method="POST" action="{{route('admin.projects.destroy', $project)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-eraser"></i></button>
            </form>

        </li>
        @endforeach

    </ul>

@endsection

@section('title')
Lista progetti
@endsection
