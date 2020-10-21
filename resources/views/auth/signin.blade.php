@extends('templates.default')

@section('content')
<div class="row">
    <div class="col-lg-4 mx-auto">
    <h3>Sign in</h3>
    <form method="POST" action="{{ route('auth.signin') }}" novalidate>
        @csrf
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="text" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" value="{{ Request::old('email') ?: ''}}">
          @if ($errors->has('email'))
              <span class="help-block text-danger">
                  {{ $errors->first('email') }}
              </span>
          @endif
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" >
          @if ($errors->has('password'))
              <span class="help-block text-danger">
                  {{ $errors->first('password') }}
              </span>
          @endif
        </div>
         <div class="custom-control custom-checkbox mb-3">
             <input type="checkbox" name="remember" class="custom-control-input" id="remember">
             <label for="remember" class="custom-control-label">Save me</label>
         </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
      </form>
    </div>
  </div>
@endsection