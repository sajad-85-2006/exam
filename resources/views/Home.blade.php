@extends('app')

@section('link')

<style>
    @keyframes fadeIn{
        0% {
            opacity: 0;
            filter: brightness(1) blur(20px);
        }
        10% {
            opacity: 1;
            filter: brightness(2) blur(10px);
        }
        100% {
            opacity: 1;
            filter: brightness(1) blur(0);
        }
    }

</style>
@endsection


@section('content')
    <!-- partial:index.partial.html -->
    <div class="body1">
        <img class="img1" src="/asset/img/vecteezy_tick-checkmark-checklist-illustration-in-vector_.jpg" alt="brown cat with green eyes" width="800">

    </div>
    <!-- partial -->
@endsection
