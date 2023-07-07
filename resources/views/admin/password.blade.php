@extends('layouts.app')
@section('content')

<form action="{{ route('admin.password.update') }}" method="POST">
    @csrf

    <div class="form-group">كلمة السر الحاليه</label>
        <input type="password" name="current_password" id="current_password" class="form-control">
        @error('current_password')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="new_password">كلمة السر الجديده</label>
        <input type="password" name="new_password" id="new_password" class="form-control">
        @error('new_password')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="new_password_confirmation">تاطيد كلمة السر الجديده</label>
        <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control">
    </div>

    @if ($errors->has('current_password'))
        <div class="alert alert-danger">
            {{ $errors->first('current_password') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <button type="submit" class="btn btn-primary">تغير كلمة السر</button>
</form>

@endsection
