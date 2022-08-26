<nav class="navbar navbar-dark bg-black absolute-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Offcanvas dark navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dark offcanvas</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Exams
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            @foreach(\App\Models\Test::all() as $test)
                                <li><a class="dropdown-item" href="/exam/{{$test['id']}}">{{$test['title']}}</a></li>
                            @endforeach
                                <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/admin/test/create">Create Exam</a></li>
                        </ul>
                    </li>
                </ul>
                <form method="post" class="d-inline-block" style="margin-top: 30px" action="{{route('logout')}}">
                    @csrf
                    <button class="btn btn-danger">Logout</button>
                </form>

                <a href="/admin" class="btn btn-success">Panel Admin</a>
            </div>
        </div>
    </div>
</nav>
