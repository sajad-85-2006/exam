@extends('admin')

@section('content')

    <div>
        <div style="float: left">
            <h3>All Exam:</h3>
            <p>All Users Sing Up In Your Web Site</p>
        </div>
        <a href="/admin/exam/edit/{{$id}}">
            <button style="float: right" class="btn btn-primary ">New Exam</button>


        </a>
        <form method="post" action="/admin/exam/delete/{{$id}}">
            @csrf
            <button style="float: right; margin-right: 10px" class="btn btn-danger ">Delete Exam</button>
        </form>
        <br>
        @if(count($Exam)!=0)
            <table class="table">
                <thead>
                <tr>
                    <th>QU</th>
                    <th>answer</th>
                    <th>id test</th>
                    <th>creat at</th>
                </tr>
                </thead>
                <tbody>
                @foreach($Exam as $E)
                    <tr data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <td><a href="/admin/exam/{{$E['id']}}">{{$E['question']}}</a></td>
                        <td>{{$E['answer']}}</td>
                        <td>{{\App\Models\Test::where('id',$E['test_id'])->first('title')->title}}</td>
                        <td>{{$E['created_at']}}</td>
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

