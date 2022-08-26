@extends('admin')

@section('content')

    <div>
        <div style="float: left">
            <h3>All Exam:</h3>
            <p>All Users Sing Up In Your Web Site</p>
        </div>
        <a href="/admin/test/create">
            <button style="float: right" class="btn btn-primary ">New Test</button>
        </a>
        <br>
        @if(count($Exam))
            <table class="table table-hover ">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Number Exam</th>
                    <th>User Created</th>
                    <th>sing up</th>
                    <td>...</td>
                </tr>
                </thead>
                <tbody>
                @foreach($Exam as $E)
                    <tr data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <td><a href="/admin/exam/show/{{$E['id']}}"
                               style="text-decoration: none;color: #0a0a0a">{{$E['title']}}</a></td>
                        <td><a href="/admin/exam/show/{{$E['id']}}"
                               style="text-decoration: none;color: #0a0a0a">{{$E['exam']}}</a></td>
                        <td><a href="/admin/exam/show/{{$E['id']}}"
                               style="text-decoration: none;color: #0a0a0a">{{\App\Models\User::where('id',$E['user_id'])->first('name')->name}}</a>
                        </td>
                        <td><a href="/admin/exam/show/{{$E['id']}}"
                               style="text-decoration: none;color: #0a0a0a">{{$E['created_at']}}</a></td>

                        <td>
                            <form style="display: inline-block" action="/admin/test/delete/{{$E['id']}}" method="post">
                                @csrf
                                <button class="btn-danger btn">Delete</button>
                            </form>
                            <a href="/admin/exam/show/{{$E['id']}}"><button class="btn btn-success">Show Exam</button></a>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        @else
            <div class="row" style="margin-top: 70px">
                <div class="col-5"></div>
                <div class="col-2"><h3 style="color: gray;text-align: center;margin-top: 30px">Not Found</h3></div>
                <div class="col-5"></div>
            </div>
        @endif
    </div>
@endsection

