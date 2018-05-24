@extends('layouts.userMaterialize')

@section('content')
<div class="container">
    <div class="row">
    <div class="col m6 offset-m3">
    <div class="card">
        <div class="card-image">
          <img src="{{asset('image/siluetaGradas.png')}}">          
        </div>
        <div class="card-content">        
        <form method="POST" action="{{ route('login') }}">
        @csrf
            <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input name="email" value="{{ old('email') }}" id="email" type="email" class="validate" required autofocus>
                <label for="email">{{ __('E-Mail Address') }}</label>
                <span class="helper-text" data-error="Este campo es requerido | formato de email"></span>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">vpn_key</i>
                <input name="password" id="password" type="password" class="validate" required>
                <label for="password">{{ __('Password') }}</label>
                <span class="helper-text" data-error="Este campo es requerido"></span>
            </div>  
            <input type="checkbox" name="remember" checked style="visibility:hidden">
            <div class="center-align">       
                <button class="btn waves-effect waves-light orange" type="submit" name="action">{{ __('Login') }}
                    <i class="material-icons right">send</i>
                </button>
            </div> 
        </form>       
        </div>
        <div class="card-action">
          <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
          <a href="{{ route('register') }}">{{ __('Register') }}</a>
        </div>
    </div>
    </div>
    </div>
</div>
@endsection
