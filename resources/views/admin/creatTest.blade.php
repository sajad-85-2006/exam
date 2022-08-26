@extends('admin')

@section('content')
    <div>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>

                    @endforeach
                </ul>

            </div>
        @endif
        <form method="post" action="/admin/test/create">
            @csrf
            <label style="margin: 10px" for="name" class="form-control-label">Write Your Title:</label>
            <input style="margin: 10px" type="text" id="name" name="title" placeholder="Title Test"
                   class="form-control">
            <label style="margin: 10px" for="exam" class="form-control-label">number Your exam:</label>
            <input style="margin: 10px" type="number" id="exam" name="exam" placeholder="number exam"
                   class="form-control">
            <button style="margin: 10px" class="btn btn-primary">Save</button>
        </form>
    </div>

@endsection
