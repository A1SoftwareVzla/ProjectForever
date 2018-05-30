@extends('layouts.userMaterialize')

@section('content')
<div class="container">
<div class="row">
    <div class="col m6 offset-m3">
    <div class="card">
        <div class="card-image">
          <img src="{{asset('image/siluetaGradas.png')}}"> 
          <span class="card-title">{{ __('Reset Password') }}</span>         
        </div>
        <div class="card-content">  
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
            <input name="email" value="{{ old('email') }}" id="email" type="email" class="validate" required autofocus>
            <label for="email">{{ __('E-Mail Address') }}</label>
            <span class="helper-text" data-error="Este campo es requerido | formato de email"></span>
        </div>

        <div class="center-align">       
            <button class="btn waves-effect waves-light orange" type="submit" name="action">{{ __('Send Password Reset Link') }}
                <i class="material-icons right">send</i>
            </button>
        </div>

        </form>
        </div>
    </div>
    </div>
    </div>
</div>

<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->
@endsection
