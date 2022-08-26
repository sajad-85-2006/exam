@extends('admin')

@section('content')

    <div>
        <h3>All Users:</h3>
        <p>All Users Sing Up In Your Web Site</p>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th>name</th>
                <th>email</th>
                <th>rol</th>
                <th>sing up</th>
                <th style="width: 300px;">...</th>
            </tr>
            </thead>
            <tbody>
            @foreach($user as $u)
                <tr>
                    <td>{{$u['name']}}</td>
                    <td>{{$u['email']}}</td>
                    <td>{{$u['role']}}</td>
                    <td>{{$u['created_at']}}</td>
                    <td>
                        <form style="display:inline-block;margin: 2px" method="post" action="/admin/user/delete/{{$u['id']}}">
                            @csrf
                            <button style="display:inline-block;margin: 2px" class="btn btn-danger">Delete</button>
                        </form>
                        <form style="display:inline-block;margin: 2px" method="post" action="/admin/user/admin/{{$u['id']}}">
                            @csrf
                            <button style="display:inline-block;margin: 2px" class="btn btn-success">Add Admin</button>
                        </form>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>

@endsection
