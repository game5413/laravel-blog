@extends('layouts.main.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 px-0">
            <div class="card">
                <form method="POST" action="{{ route('posts.store') }}">
                    <div class="card-body">
                        @csrf

                        <div class="form-group row">
                            <label for="category" class="col-2 col-form-label">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="category" name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                    <option value="" {{ old('category_id') == "" ? "selected" : "" }}>Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <small id="categoryHelp" class="form-text text-muted">If you not fill this field, system will clasified as uncategorized post.</small>

                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-2 col-form-label">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="slug" class="col-2 col-form-label">{{ __('Slug') }}</label>

                            <div class="col-md-6">
                                <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" autocomplete="slug">
                                <small id="slugHelp" class="form-text text-muted">If you not fill this field, system will automatically generate it for you.</small>
                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-2 col-form-label">{{ __('Content') }}</label>

                            <div class="col-md-6">
                                <textarea id="body" class="form-control" name="body" required autocomplete="body" row="5">{{ old('body') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer justify-content-end">
                        <a href="{{ route('posts') }}" role="button" class="btn btn-danger">Cancel</a>
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@endpush
