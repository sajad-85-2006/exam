@extends('admin')

@section('link')
    <style>
        * {
            /*box-sizing: border-box;*/
            /*text-align: center;*/
            /*margin: 0 auto;*/
        }

        /*body {*/
        /*    display: grid;*/
        /*    place-items: center;*/
        /*    min-height: 100vh;*/
        /*    overflow: hidden;*/
        /*}*/

        h1 {
            margin: 0 auto;
            font-size: clamp(2rem, 1rem + 10vmin, 10rem);
            display: inline-flex;
            align-items: flex-start;
            flex-direction: column;
            line-height: 1;
            text-align: center;

        }

        :root {
            --red: #c1c1c1;
            --green: #282828;
            --yellow: #767676;
            --speed: 0.65s;
        }

        h1 span {
            --color: var(--red);
            color: var(--color);
            position: relative;
            clip-path: inset(-20% 0);
            animation-name: text-reveal, shimmy;
            animation-duration: var(--speed);
            animation-delay: calc((0.5 + var(--index)) * (var(--speed) / 3));
            animation-fill-mode: both;
            animation-timing-function: steps(1), ease-out;
            text-align: center;
            margin: 0 auto;
        }

        @keyframes shimmy {
            0% {
                transform: translateX(-1ch);
            }
        }

        @keyframes text-reveal {
            0% {
                color: transparent;
            }
            50%, 100% {
                color: var(--color);
            }
        }

        h1 span:after {
            text-align: center;
            margin: 0 auto;
            content: "";
            position: absolute;
            inset: -20% 0;
            background-color: var(--color);
            animation-name: block-reveal;
            animation-duration: var(--speed);
            animation-delay: calc((0.5 + var(--index)) * (var(--speed) / 3));
            animation-fill-mode: both;
        }

        @keyframes block-reveal {
            0% {
                transform: translateX(-110%);
            }
            45%, 55% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(110%);
            }
        }

        h1 span:nth-of-type(1) {
            --color: var(--green);
            --index: 0;

        }

        h1 span:nth-of-type(2) {
            --color: var(--yellow);
            --index: 1;
        }

        h1 span:nth-of-type(3) {
            --color: var(--red);
            --index: 2;
        }
    </style>
@endsection

@section('content')
    <div style="        margin: 0 auto;display: block;text-align: center">

        <h1 class="h1-1">
            <span class="span">Here</span>
            <span>we</span>
            <span>gooooo!</span>
        </h1>
    </div>
@endsection
