@extends('layouts.admin')

@section('content')
    @if(session('success'))

        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>

    @endif

    <h1>{{$project->title}} |
        {{-- EDIT BUTTON --}}
        <a class="btn btn-warning" href="{{route('admin.projects.edit', $project)}}">
            <i class="fa-solid fa-pencil"></i>
        </a> |

        {{-- DELETE BUTTON --}}
        <form class="d-inline-block" method="POST" action="{{route('admin.projects.destroy', $project)}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-eraser"></i></button>
        </form>
    </h1>

    <p>{{ $project->description }}</p>
    <p>{{$project->technology->name}}</p>
    <p>{{$project->type->name}}</p>

@endsection

@section('title')
Mostra progetto
@endsection
