<aside class="bg-dark py-3">
    <nav>
        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <ul>


                {{-- <li class="mb-3">
                    <a href="{{route('admin.home')}}">Dashboard</a>
                </li> --}}

                {{-- <li class="mb-3">
                    <a href="{{route('admin.projects.index')}}">Lista Progetti</a>
                </li> --}}


                <div class="container-fluid p-0">
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDarkDropdown"
                        aria-controls="navbarNavDarkDropdown"
                        aria-expanded="false"
                        aria-label="Toggle navigation">

                        <span class="navbar-toggler-icon"></span>

                    </button>

                    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">

                        <ul class="navbar-nav flex-column">

                            <li class="nav-item">

                                <button class="btn btn-dark">
                                    <a href="{{route('admin.home')}}">Dashboard</a>
                                </button>

                            </li>

                            <li class="nav-item dropdown">

                                <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Progetti
                                </button>

                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="{{route('admin.projects.index')}}">Lista Progetti</a></li>
                                    <li><a class="dropdown-item" href="{{route('admin.typeProjects')}}">Lista Progetti per Tipo</a></li>
                                    <li><a class="dropdown-item" href="{{route('admin.projects.create')}}">Nuovo progetto</a></li>
                                </ul>

                            </li>

                            <li class="nav-item">

                                <button class="btn btn-dark">
                                    <a href="{{route('admin.technologies.index')}}">Lista Tecnologie</a>
                                </button>

                            </li>

                            <li class="nav-item">

                                <button class="btn btn-dark">
                                    <a href="{{route('admin.types.index')}}">Lista Tipi</a>
                                </button>

                            </li>

                        </ul>

                    </div>
                </div>

                {{-- <li class="mb-3">
                    <a href="{{route('admin.technologies.index')}}">Lista Tecnologie</a>
                </li>

                <li class="mb-3">
                    <a href="{{route('admin.types.index')}}">Lista Tipi</a>
                </li> --}}

                {{-- <li class="mb-3">
                    <a href="{{route('admin.typeProjects')}}">Lista Progetti per Tipo</a>
                </li> --}}
            </ul>
        </nav>







    </nav>
</aside>
