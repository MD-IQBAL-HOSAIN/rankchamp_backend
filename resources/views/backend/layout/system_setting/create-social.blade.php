@extends('backend.app')

@section('title',  'Create New Social Media')

@section('content')
<main class="content--wrapper p-5">

    {{-- Form --}}
    <section class="container">

        <div class="card text-center backend-form-wrapper">
            <div class="card-header text-start">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="pt-3">Create New Social Media</h4>
                    <div>
                        <a href="{{ route('social.media') }}" class="btn btn-sm primary-bg">View All</a>
                    </div>
                </div>
            </div>
            <div class="card-body my-4 text-start">
                <form action="{{ route('social.media.store') }}" method="POST" class="mb-4">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <label for="platform" class="form-label text-light">Social
                                Media</label>
                            <select
                                class="form-select text-light sb-select-field"
                                id="platform" name="platform">
                                <option value="">Select Platform</option>
                                <option value="1">Facebook</option>
                                <option value="2">TikTok</option>
                                <option value="3">Twitter</option>
                                <option value="4">Instagram</option>
                                <option value="5">Youtube</option>
                            </select>
                        </div>
                        <div class="col-6" style="margin-top: 33px">
                            <div class="form-outline">
                                <input type="text" name="link"
                                    class="form-control  text-light"
                                    id="link" value="{{ old('link') }}" />
                                <label for="link" class="form-label text-light">Link: </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-5">
                        <button type="submit" class="btn btn-success text-white ">
                            Submit
                        </button>
                        <a href="{{ url()->previous() }}" type="submit" class="btn btn-danger text-white mt-5">
                            Cancle
                        </a>
                    </div>
            </div>
        </div>
    </section>
</main>

@endsection