@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-lg-6">
       <h3>Редактирование профиля</h3>
        <form method="POST" action="{{ route('profile.edit') }}" novalidate>
        @csrf
        <div class="form-group">
          <label for="first_name">Ваша Имя</label>
          <input type="text" name="first_name" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" id="first_name" value="{{ Request::old('first_name') ?: Auth::user()->first_name}}">
          @if ($errors->has('first_name'))
              <span class="help-block text-danger">
                  {{ $errors->first('first_name') }}
              </span>
          @endif
        </div>
        <div class="form-group">
          <label for="lastname">Ваша Фамилия</label>
          <input type="text" name="lastname" class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}" id="lastname" value="{{ Request::old('lastname') ?: Auth::user()->lastname }}" >
          @if ($errors->has('lastname'))
              <span class="help-block text-danger">
                  {{ $errors->first('lastname') }}
              </span>
          @endif
        </div>

        <div class="form-group">
            <label for="location">Локация</label>
            <input type="text" name="location" class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" id="location" value="{{ Request::old('location') ?: Auth::user()->location}}" >
            @if ($errors->has('location'))
                <span class="help-block text-danger">
                    {{ $errors->first('location') }}
                </span>
            @endif
          </div>
        <button type="submit" class="btn btn-primary">Обновить профиль</button>
        </form>
        </div>
    </div>
@endsection