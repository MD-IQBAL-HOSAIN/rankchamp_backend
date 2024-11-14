@extends('backend.app')

@section('title', 'Profile Setting')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Profile Setting</h4>
                        <p class="card-description">Setup your profile, please <code>provide your valid
                                data</code>.</p>
                        <div class="mt-4">
                            <form class="forms-sample" method="POST" action="{{route('profile.update')}}">
                                @csrf
                                <div class="form-group row mb-3">
                                    <div class="col-12">
                                        <label class="form-lable">Name:</label>
                                        <input type="text"
                                            class="form-control form-control-md border-left-0 @error('name') is-invalid @enderror"
                                            placeholder="Name" name="name" value="{{ Auth::user()->name }}" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col-12">
                                        <label class="form-lable">Email:</label>
                                        <input type="email"
                                            class="form-control form-control-md border-left-0 @error('email') is-invalid @enderror"
                                            placeholder="Email" name="email" value="{{ Auth::user()->email }}" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                            </form>


                            <h4 class="card-title mt-4">Update your password</h4>
                            <form class="forms-sample mt-4" method="post" action="{{route('password.update')}}">
                                @csrf
                                <div class="form-group row mb-3">
                                    <div class="col-12">
                                        <label class="form-lable">Current Password:</label>
                                        <input type="password"
                                            class="form-control form-control-md border-left-0 @error('current_password') is-invalid @enderror"
                                            placeholder="Current Password" name="current_password" required>
                                        @error('current_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col-12">
                                        <label class="form-lable">New Password:</label>
                                        <input type="password"
                                            class="form-control form-control-md border-left-0 @error('password') is-invalid @enderror"
                                            placeholder="New Password" name="password" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col-12">
                                        <label class="form-lable">Confirm Password:</label>
                                        <input type="password"
                                            class="form-control form-control-md border-left-0 @error('password_confirmation') is-invalid @enderror"
                                            placeholder="Confirm Password" name="password_confirmation" required>
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
