<!DOCTYPE html>
<html lang="en">

<head>394 224
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Anton|Passion+One|PT+Sans+Caption' rel='stylesheet'
        type='text/css'>
    <title>@yield('title')</title>

    <style>
        body {
            background: #fff;
        }

        .error-container {
            height: 100vh !important;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-family: 'montserrat', sans-serif;

        }

        .big-text {
            font-size: 200px;
            font-weight: 900;
            font-family: sans-serif;
            background: url(https://cdn.pixabay.com/photo/2018/05/30/15/39/thunderstorm-3441687_960_720.jpg) no-repeat;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-size: cover;
            background-position: center;
        }

        .small-text {
            font-family: montserrat, sans-serif;
            color: rgb(0, 0, 0);
            font-size: 24px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .form-group {
            display: flex;
            /* border: 1px #53a0e4 solid;
                border-radius:30px;
                overflow: hidden;*/
        }

        .form-control {
            overflow: hidden;
            background: #fff;
            border: 1px #53a0e4 solid;
            border-right: none;
            border-radius: 25px 0px 0px 25px;
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: #61b045;
            box-shadow: none;
        }


        /* Style the submit button */
        form .search-btn {
            all: unset;
            width: 15%;
            padding: 10px;
            background: #1e50e2;
            color: white;
            font-size: 17px;
            border: 1px #1e50e2 solid;
            border-left: none;
            /* Prevent double borders */
            border: 1px #53a0e4 solid;
            border-radius: 0px 25px 25px 0px;
            cursor: pointer;
        }

        form .search-btn:hover {
            background: #0b7dda;
        }

        .button {
            color: #fff;
            padding: 12px 36px;
            font-weight: 600;
            border: none;
            position: relative;
            font-family: 'Raleway', sans-serif;
            display: inline-block;
            text-transform: uppercase;
            -webkit-border-radius: 90px;
            -moz-border-radius: 90px;
            border-radius: 90px;
            margin: 2px;
            margin-top: 2px;
            background-image: linear-gradient(to right, #09b3ef 0%, #1e50e2 51%, #09b3ef 100%);
            background-size: 200% auto;
            flex: 1 1 auto;
            text-decoration: none;

        }


        .button:hover,
        .button:focus {
            color: #ffffff;
            background-position: right center;
            -webkit-box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, 0.1);
            box-shadow: 0px 5px 15px 0px rgba(0, 0, 0, 0.1);
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="container error-container">
            <div class="row  d-flex align-items-center justify-content-center">
                <div class="col-md-12 text-center">
                    <h1 class="big-text">@yield('code')</h1>
                    <h2 class="small-text">@yield('message_1')</h2>
                </div>
                <div class="col-md-6  text-center">
                    <p>@yield('message_2')</p>
                    @hasSection('link')
                        <div class="pull-right">
                            <a href="{{route('auth.logout')}}" class="button button-dark-blue iq-mt-15
                        text-center">REFRESH</a>
                        </div>
                        <div class="clearfix"></div>
                    @else
                    <a href="{{route('FrontHome.index')}}" class="button button-dark-blue iq-mt-15 text-center">GOTO
                        HOME PAGE</a>
                    @endif
                    

                    
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>