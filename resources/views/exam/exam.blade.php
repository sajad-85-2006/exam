@extends('app')

@section('content')
@if(count($exam) !=0)
    @if(session('status'))
        @if(session('status')=='Reject')
            <div class="row" style="margin-top: 30px">
                <div class="col-2"></div>
                <div class="alert alert-danger col-8" role="alert">
                    <h4 class="alert-heading">Your Are Not Successful</h4>
                    <p>Oh NO!! You Are Reject 😓😭</p>

                    <table style="text-align: center;border-radius: 10px;margin-top: 30px" id="keword"
                           class="table table-danger table-bordered">
                        <thead class="thead-dark">
                        <tr class="">
                            <th class="col">ture</th>
                            <th class="col">false</th>
                            <th class="col">don`t no</th>
                            <th class="col">All</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$ture}}</td>
                            <td>{{$false}}</td>
                            <td>{{$dont}}</td>
                            <td>{{$all}}</td>
                        </tr>
                        </tbody>

                    </table>
                </div>
                <div class="col-2"></div>
            </div>
        @else
            <div class="row" style="margin-top: 30px">
                <div class="col-2"></div>
                <div class="alert alert-success col-8" role="alert">
                    <h4 class="alert-heading">Your Are Successful</h4>
                    <p>Very Good!! You Are Successful 🤩🥳</p>

                    <table style="text-align: center;border-radius: 10px;margin-top: 30px" id="keword"
                           class="table table-success table-bordered">
                        <thead class="thead-dark">
                        <tr class="">
                            <th class="col">ture</th>
                            <th class="col">false</th>
                            <th class="col">don`t no</th>
                            <th class="col">All</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$ture}}</td>
                            <td>{{$false}}</td>
                            <td>{{$dont}}</td>
                            <td>{{$all}}</td>
                        </tr>
                        </tbody>

                    </table>
                </div>
                <div class="col-2"></div>
            </div>
        @endif
    @else
        @if(count($check)==0)
            <div class="body">
                <div id="carouselExampleFade" class="carousel slide carousel-fade box" data-bs-ride="false">
                    <form id="regForm" action="/exam/{{$id}}" method="post">
                        @csrf
                        <div class="header"><h3>Header</h3></div>
                        @for($x = 0;$x < count($exam);$x++)
                            <div class="tab">
                                <div class="qu"><p>{{$x}}-{{$exam[$x]['qu']}}</p></div>
                                <div class="row">
                                    <div class="col-3"></div>
                                    <div class="form-check col-2">
                                        <input class="form-check-input" value="ture" type="radio" name="test-{{$x}}"
                                               id="true">
                                        <label class="form-check-label" for="true">
                                            Ture
                                        </label>
                                    </div>
                                    <div class="form-check col-2">
                                        <input class="form-check-input" value="false" type="radio" name="test-{{$x}}"
                                               id="false">
                                        <label class="form-check-label" for="false">
                                            False
                                        </label>
                                    </div>
                                    <div class="form-check col-2">
                                        <input checked class="form-check-input" value="dont" type="radio"
                                               name="test-{{$x}}" id="dont">
                                        <label class="form-check-label" for="dont">
                                            I Don't No
                                        </label>
                                    </div>
                                    <div class="col-3"></div>

                                </div>
                            </div>
                        @endfor

                        <div style="overflow:auto;text-align: center;margin-top: 30px;">
                            <div>
                                <button type="button" class="btn btn-danger" id="prevBtn" onclick="nextPrev(-1)">
                                    Previous
                                </button>
                                <button type="button" class="btn btn-success" id="nextBtn" onclick="nextPrev(1)">Next
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @else
            @if($status=='Reject')
                <div class="row" style="margin-top: 30px">
                    <div class="col-2"></div>
                    <div class="alert alert-danger col-8" role="alert">
                        <h4 class="alert-heading">Your Are Not Successful</h4>
                        <p>Oh NO!! You Are Reject 😓😭</p>

                        <table style="text-align: center;border-radius: 10px;margin-top: 30px" id="keword"
                               class="table table-danger table-bordered">
                            <thead class="thead-dark">
                            <tr class="">
                                <th class="col">ture</th>
                                <th class="col">false</th>
                                <th class="col">don`t no</th>
                                <th class="col">All</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$ture}}</td>
                                <td>{{$false}}</td>
                                <td>{{$dont}}</td>
                                <td>{{$all}}</td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                    <div class="col-2"></div>
                </div>
            @else
                <div class="row" style="margin-top: 30px">
                    <div class="col-2"></div>
                    <div class="alert alert-success col-8" role="alert">
                        <h4 class="alert-heading">Your Are Successful</h4>
                        <p>Very Good!! You Are Successful 🤩🥳</p>

                        <table style="text-align: center;border-radius: 10px;margin-top: 30px" id="keword"
                               class="table table-success table-bordered">
                            <thead class="thead-dark">
                            <tr class="">
                                <th class="col">ture</th>
                                <th class="col">false</th>
                                <th class="col">don`t no</th>
                                <th class="col">All</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$ture}}</td>
                                <td>{{$false}}</td>
                                <td>{{$dont}}</td>
                                <td>{{$all}}</td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                    <div class="col-2"></div>
                </div>
            @endif
        @endif
    @endif
@else
    <div class="row" style="margin-top: 70px">
        <div class="col-5"></div>
        <div class="col-2"><h3 style="color: gray;text-align: center;margin-top: 30px">Not Found</h3></div>
        <div class="col-5"></div>
    </div>
@endif
@endsection
