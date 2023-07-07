@extends('layouts.app')

@section('content')


  <div class="container">

    <div class="container">

        <div class="row justify-content-center">
            <h1>مقال جدبد</h1>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Post') }}</div>

                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title">{{ __('العنوان') }}</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="content">{{ __('المحتوه') }}</label>
                                <textarea name="content" id="content" class="form-control" rows="4" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('انشأ') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <div class="container">

      </table>


@endsection
