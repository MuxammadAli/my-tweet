@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <form action="{{ route('status.post')}}" method="post">
                @csrf
                <div class="form-group">
                    <textarea name="status" rows="3" class="form-control {{ $errors->has('status') ? 'is-invalid' : ''}}" 
                                           placeholder="What is new? {{ Auth::user()->getFirstNameOrUsername() }}"></textarea>
                   @if ($errors->has('status'))
                       <div class="invalid-feedback">
                           {{ $errors->first('status') }}
                       </div>
                   @endif
                </div>
                <button type="submit" class="btn btn-primary">Add to post</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5">

        </div>
    </div>
@endsection