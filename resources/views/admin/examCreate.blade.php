@extends('admin')

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>

                @endforeach
            </ul>

        </div>
    @endif
{{--    <p>{{$r}}</p>--}}
<form action="/admin/exam/edit/{{$id}}" method="post">
    @csrf
    @for ($x = 1; $x <= $r; $x++)
        <div class="border" style="padding: 20px">
            <label for="qu">
                Write Your Qu:
            </label>
            <input id="qu" name="title_{{$x}}" type="text" class="form-control" placeholder="Write Your QU">
            <div style="margin-top: 30px" class="row">
                <div class="col-3">
                    <label class="form-control-label">
                        Ture
                    </label>
                    <input value="ture" class="form-check-input" type="radio" name="answer_{{$x}}" style="width:30px;height:30px" checked >

                </div>
                <div class="col-3">
                    <label class="form-control-label">
                        False
                    </label>
                    <input value="false" class="form-check-input" type="radio" name="answer_{{$x}}" style="width:30px;height:30px"  >

                </div>

            </div>
        </div>
        <br>

    @endfor

    <div style="margin-top: 10px">
        <button class="btn btn-primary">save</button>
    </div>
</form>
@endsection

