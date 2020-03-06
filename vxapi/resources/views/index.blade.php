<!doctype html>
<html lang="en">
<head>
    <style type="text/css">
        .loader {
            height: 100%;
            width: 100%
        }

        .loader
        .l_main {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 172px;
            height: 128px;
            margin: 0;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%)
        }

        @media (max-width: 550px) {
            .loader {
                -webkit-transform: scale(0.75);
                transform: scale(0.75)
            }
        }

        @media (max-width: 440px) {
            .loader {
                -webkit-transform: scale(0.5);
                transform: scale(0.5)
            }
        }

        .l_square {
            position: relative
        }

        .l_square:nth-child(1) {
            margin-left: 0px
        }

        .l_square:nth-child(2) {
            margin-left: 44px
        }

        .l_square:nth-child(3) {
            margin-left: 88px
        }

        .l_square:nth-child(4) {
            margin-left: 132px
        }

        .l_square
        span {
            position: absolute;
            top: 0px;
            left: 20px;
            height: 36px;
            width: 36px;
            border-radius: 2px;
            background-color: rgba(35, 34, 34, .8)
        }

        .l_square span:nth-child(1) {
            top: 0px
        }

        .l_square span:nth-child(2) {
            top: 44px
        }

        .l_square span:nth-child(3) {
            top: 88px
        }

        .l_square:nth-child(1) span {
            -webkit-animation: animsquare1 2s infinite ease-in;
            animation: animsquare1 2s infinite ease-in
        }

        .l_square:nth-child(2) span {
            -webkit-animation: animsquare2 2s infinite ease-in;
            animation: animsquare2 2s infinite ease-in
        }

        .l_square:nth-child(3) span {
            -webkit-animation: animsquare3 2s infinite ease-in;
            animation: animsquare3 2s infinite ease-in
        }

        .l_square:nth-child(4) span {
            -webkit-animation: animsquare4 2s infinite ease-in;
            animation: animsquare4 2s infinite ease-in
        }

        .l_square span:nth-child(1) {
            -webkit-animation-delay: 0.00s;
            animation-delay: 0.00s
        }

        .l_square span:nth-child(2) {
            -webkit-animation-delay: 0.15s;
            animation-delay: 0.15s
        }

        .l_square span:nth-child(3) {
            -webkit-animation-delay: 0.30s;
            animation-delay: 0.30s
        }

        @-webkit-keyframes animsquare1 {
            0%, 5%, 95%, 100% {
                -webkit-transform: translate(0px, 0px) rotate(0deg);
                transform: translate(0px, 0px) rotate(0deg)
            }
            30%, 70% {
                -webkit-transform: translate(-40px, 0px) rotate(-90deg);
                transform: translate(-40px, 0px) rotate(-90deg)
            }
        }

        @keyframes animsquare1 {
            0%, 5%, 95%, 100% {
                -webkit-transform: translate(0px, 0px) rotate(0deg);
                transform: translate(0px, 0px) rotate(0deg)
            }
            30%, 70% {
                -webkit-transform: translate(-40px, 0px) rotate(-90deg);
                transform: translate(-40px, 0px) rotate(-90deg)
            }
        }

        @-webkit-keyframes animsquare2 {
            0%, 10%, 90%, 100% {
                -webkit-transform: translate(0px, 0px) rotate(0deg);
                transform: translate(0px, 0px) rotate(0deg)
            }
            35%, 65% {
                -webkit-transform: translate(-40px, 0px) rotate(-90deg);
                transform: translate(-40px, 0px) rotate(-90deg)
            }
        }

        @keyframes animsquare2 {
            0%, 10%, 90%, 100% {
                -webkit-transform: translate(0px, 0px) rotate(0deg);
                transform: translate(0px, 0px) rotate(0deg)
            }
            35%, 65% {
                -webkit-transform: translate(-40px, 0px) rotate(-90deg);
                transform: translate(-40px, 0px) rotate(-90deg)
            }
        }

        @-webkit-keyframes animsquare3 {
            0%, 15%, 85%, 100% {
                -webkit-transform: translate(0px, 0px) rotate(0deg);
                transform: translate(0px, 0px) rotate(0deg)
            }
            40%, 60% {
                -webkit-transform: translate(-40px, 0px) rotate(-90deg);
                transform: translate(-40px, 0px) rotate(-90deg)
            }
        }

        @keyframes animsquare3 {
            0%, 15%, 85%, 100% {
                -webkit-transform: translate(0px, 0px) rotate(0deg);
                transform: translate(0px, 0px) rotate(0deg)
            }
            40%, 60% {
                -webkit-transform: translate(-40px, 0px) rotate(-90deg);
                transform: translate(-40px, 0px) rotate(-90deg)
            }
        }

        @-webkit-keyframes animsquare4 {
            0%, 20%, 80%, 100% {
                -webkit-transform: translate(0px, 0px) rotate(0deg);
                transform: translate(0px, 0px) rotate(0deg)
            }
            45%, 55% {
                -webkit-transform: translate(-40px, 0px) rotate(-90deg);
                transform: translate(-40px, 0px) rotate(-90deg)
            }
        }

        @keyframes animsquare4 {
            0%, 20%, 80%, 100% {
                -webkit-transform: translate(0px, 0px) rotate(0deg);
                transform: translate(0px, 0px) rotate(0deg)
            }
            45%, 55% {
                -webkit-transform: translate(-40px, 0px) rotate(-90deg);
                transform: translate(-40px, 0px) rotate(-90deg)
            }
        }

        html, body {
            width: 100%;
            height: 100%;
        }

        .row > div {
            padding: 0;
        }

        .card {
            min-height: 100px;
            background-color: rgba(176, 224, 230, .95);
            margin: 6px;
            padding: 5px;
            text-align: center;
        }

        .card > img {
            width: 50%;
            margin: auto;
        }

        .card > h4 {
            text-align: left;
            padding: 0 10px;
        }

        .card a {
            color: #f1f1f1;
        }

        .card:hover {
            background-color: rgb(176, 224, 230);
            cursor: pointer;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="loader" id="loader">
        <div class="l_main">
            <div class="l_square"><span></span><span></span><span></span></div>
            <div class="l_square"><span></span><span></span><span></span></div>
            <div class="l_square"><span></span><span></span><span></span></div>
            <div class="l_square"><span></span><span></span><span></span></div>
        </div>
    </div>
    <div id="my_app"></div>
    <script>
        window.onload = function () {
            document.getElementById("loader").style.display = "none"
        }
    </script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
