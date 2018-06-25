<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/homepage.css') }}" rel="stylesheet">

</head>
<body>
<video autoplay muted loop id="AquaticDrones">
    <source src="https://daks2k3a4ib2z.cloudfront.net/57f217ad80f54a0b096d897d/59f70296696c200001fc7386_Aquatic_Drones_fragmentn-transcode.mp4"
            type="video/mp4">
</video>

<div class="flex-center position-ref full-height">

    <div class="content div-clear">
        <div class="main-content  uk-card">
        <img src="{{asset('/images/aquatic_drones_logo.svg')}}" class="logo">
            <div class="uk-card-header main-content-head">
                TaskManager
            </div>
            <div class="uk-card-body main-content-body">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                        <fieldset>
                            <div class="control-group">
                            <!-- Username -->
                            <label class="control-label"  for="email">E-mail</label>
                            <div class="controls">
                                <input id="email" type="email"
                                   class="input-xlarge uk-input{{ $errors->has('email') ? ' uk-form-danger' : '' }}" name="email"
                                   value="{{ old('email') }}" required autofocus>
                            </div>
                            </div>
                            <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" for="password">Wachtwoord</label>
                            <div class="controls">
                                <input id="password" type="password"
                                   class="input-xlarge uk-input{{ $errors->has('password') ? ' uk-form-danger' : '' }}"
                                   name="password" value="{{ old('password') }}" required>
                            </div>
                            <div class="">
                            <label><input class="uk-checkbox" type="checkbox"
                                          name="remember"{{ old('remember') ? ' checked' : '' }}> Onthoud mij</label>
                            </div>
                            </div>
                            <div class="control-group">
                            <!-- Button -->
                                <label style="margin-left: 33%;"><input class="btn" type="submit" name="button" value="Inloggen"/>
                                <a class="uk-float-right" href="{{ route('password.request') }}">
                                Wachtwoord vergeten
                            </a></label>
                            </div>
                        </fieldset>
                        </form>
                    </div>
                </div>
            </div>
               <!-- <fieldset>
         <ol>
             <li><label for="lorem">lorem</label><input type="text" id="lorem" /></li>
             <li><label for="ipsum">ipsum</label><input type="password" id="ipsum" /></li>
             <li><label for="li">li</label><input type="text" id="li" /></li>
         </ol>
     </fieldset> -->
                <p>A task managment platform for Aquatic Drones | Build by team AQUAFISH ©2018</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
