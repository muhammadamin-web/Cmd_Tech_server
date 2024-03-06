@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-4">{{ __('Создать категорию') }}</h2>

            <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Name (Russian) -->
                @foreach (config('app.available_locales') as $locale)
                    <!-- Name -->
                    <div class="form-group">
                        <label for="name_{{ $locale }}">{{ __('Название') }} ({{ $locale }})</label>
                        <input id="name_{{ $locale }}" type="text" class="form-control @error('name_' . $locale) is-invalid @enderror" name="name_{{ $locale }}" value="{{ old('name_' . $locale) }}" required autocomplete="name_{{ $locale }}" autofocus>
                        @error('name_' . $locale)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                @endforeach

                <!-- Image Upload -->
                <div class="form-group">
                    <label for="image_path">{{ __('Image') }}</label>
                    <input id="image_path" type="file" class="form-control-file @error('image_path') is-invalid @enderror" name="image_path" accept="image/*">
                    @error('image_path')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Submit and Cancel Buttons -->
                <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Create') }}
                        </button>
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                            {{ __('Cancel') }}
                        </a>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection