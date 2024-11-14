@extends('backend.app')

@section('title', 'Edit Privacy')


@section('content')

    <h3>Privacy & Policy</h3>
    <div class="shadow p-3 mb-5 bg-body rounded">
        <form action="{{ route('privacy.update', $PrivacyPolicy->slug) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title"
                    value="{{ old('title', $PrivacyPolicy->title) }}" placeholder="Enter title">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description">{{ old('description', $PrivacyPolicy->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
