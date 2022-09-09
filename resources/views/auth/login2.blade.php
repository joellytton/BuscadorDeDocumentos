<!DOCTYPE html>
<html class="no-js" lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}">

    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
 
</head>

<body>
    <style>
        .limiter {
            width: 100%;
            margin: 0 auto;
        }

        .container-login {
            width: 100%;
            min-height: 100vh;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            padding: 15px;
            background: #f0f4fb;
            /* background: -webkit-linear-gradient(-135deg, #c850c0, #4158d0);
            background: -o-linear-gradient(-135deg, #c850c0, #4158d0);
            background: -moz-linear-gradient(-135deg, #c850c0, #4158d0);
            background: linear-gradient(-135deg, #c850c0, #4158d0); */
        }

        .wrap-login {
            width: 960px;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;

            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 177px 130px 33px 95px;
        }

        .login-pic {
            width: 316px;
        }

        .login-form {
            width: 300px;
        }

        .login-form-title {
            /* font-family: Poppins-Bold; */
            font-size: 24px;
            color: #333333;
            line-height: 1.2;
            text-align: center;

            width: 100%;
            display: block;
            padding-bottom: 54px;
        }

        .wrap-input {
            position: relative;
            width: 100%;
            z-index: 1;
            margin-bottom: 10px;
        }

        .input {
            /* font-family: Poppins-Medium; */
            font-size: 15px;
            line-height: 1.5;
            color: #666666;

            display: block;
            width: 100%;
            background: #e6e6e6;
            height: 50px;
            border-radius: 25px;
            padding: 0 30px 0 68px;
        }

        .focus-input {
            display: block;
            position: absolute;
            border-radius: 25px;
            bottom: 0;
            left: 0;
            z-index: -1;
            width: 100%;
            height: 100%;
            box-shadow: 0px 0px 0px 0px;
            color: rgba(87, 184, 70, 0.8);
        }

        .input:focus+.focus-input {
            -webkit-animation: anim-shadow 0.5s ease-in-out forwards;
            animation: anim-shadow 0.5s ease-in-out forwards;
        }

        .symbol-input {
            font-size: 15px;

            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            align-items: center;
            position: absolute;
            border-radius: 25px;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            padding-left: 35px;
            pointer-events: none;
            color: #666666;

            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            -moz-transition: all 0.4s;
            transition: all 0.4s;
        }

        .input:focus+.focus-input+.symbol-input {
            color: #57b846;
            padding-left: 28px;
        }

        .container-login-form-btn {
            width: 100%;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding-top: 20px;
        }

        .login-form-btn {
            /* font-family: Montserrat-Bold; */
            font-size: 15px;
            line-height: 1.5;
            color: #fff;
            text-transform: uppercase;

            width: 100%;
            height: 50px;
            border-radius: 25px;
            background: #57b846;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 25px;

            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            -moz-transition: all 0.4s;
            transition: all 0.4s;
        }

        .login-form-btn:hover {
            background: #333333;
        }

        .p-t-12 {
            padding-top: 12px;
        }

        .p-t-136 {
            padding-top: 136px;
        }

        .txt1 {
            /* font-family: Poppins-Regular; */
            font-size: 16px;
            line-height: 1.5;
            color: #999999;
        }

        .txt2 {
            /* font-family: Poppins-Regular; */
            font-size: 13px;
            line-height: 1.5;
            color: #666666;
        }

        /*------------------------------------------------------------------
[ Responsive ]*/
        @media (max-width: 992px) {
            .wrap-login {
                padding: 177px 90px 33px 85px;
            }

            .login-pic {
                width: 35%;
            }

            .login-form {
                width: 50%;
            }
        }

        @media (max-width: 768px) {
            .wrap-login {
                padding: 100px 80px 33px 80px;
            }

            .login-pic {
                display: none;
            }

            .login-form {
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .wrap-login {
                padding: 100px 15px 33px 15px;
            }
        }

    </style>
    <div class="limiter">
        <div class="container-login">

            <div class="wrap-login">
                <div class="login-pic" data-tilt>
                    <img src="https://colorlib.com/etc/lf/Login_v1/images/img-01.png" alt="IMG">
                </div>

                <form class="login-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login-form-title">J@SPE <br> Sistema Cooperativo de Conhecimento Legal</span>

                    @if ($errors->any())
                    <ul class="mb-3 list-disc list-inside text-sm text-center text-red-600" style="margin-top: -34px;">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <div class="wrap-input">
                        <input class="input" type="text" name="login" value="{{old('login')}}" autocomplete='off'
                            required autofocus placeholder="Login">
                        <span class="focus-input"></span>
                        <span class="symbol-input">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input">
                        <input class="input" type="password" name="senha" required autocomplete="current-password"
                            placeholder="Senha">
                        <span class="focus-input"></span>
                        <span class="symbol-input">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login-form-btn">
                        <button class="login-form-btn" type="submit">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <a class="txt1" href="#">
                            Esqueceu a senha ?
                        </a>
                    </div>

                    <div class="p-t-136"></div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
