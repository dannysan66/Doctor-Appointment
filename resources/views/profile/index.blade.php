@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-success">{{ (Session::get('message')) }}</div>
        @endif
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('User Profile') }}</div>

                <div class="card-body">
                    @if(!auth()->user()->image)
                    <img src="/images/BZfq0zDhPsTRK0QSk2EY4hsKKNN6q7d2aeWxtQ51.png" width="120" alt="">
                    @else
                    <img src="/profile/{{ auth()->user()->image }}" width="120" style="border-radius:50%;" alt="">
                    <br>
                    @endif
                    <br>
                    <p>Name: {{ auth()->user()->name }}</p>
                    <p>Email: {{ auth()->user()->email }}</p>
                    <p>Address: {{ auth()->user()->address }}</p>
                    <p>Phone Number: {{ auth()->user()->phone_number }}</p>
                    <p>Gender: {{ auth()->user()->gender }}</p>
                    <p>Bio: {{ auth()->user()->description }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Update Profile') }}</div>

                <div class="card-body">
                    <form action="{{ route('profile.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ auth()->user()->name }}">
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ auth()->user()->address }}">
                        </div>

                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" value="{{ auth()->user()->phone_number }}">
                        </div>

                        <div class="form-group">
                            <label for="">Gender </label>
                            <select name="gender" id="" class="form-control @error('gender') is-invalid @enderror">
                                <option value="">select gender</option>
                                <option value="male" @if(auth()->user()->gender==='male')selected @endif>Male</option>
                                <option value="female" @if(auth()->user()->gender==='female')selected @endif>Female</option>
                            </select>
                            @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Bio</label>
                            <textarea name="description" class="form-control">{{ auth()->user()->description }}</textarea>
                        </div>

                        <br>

                        <div class="form-group">
                            <button class="btn btn-purple" type="submit">Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('Update Image') }}</div>
                <form action="{{ route('profile.pic') }}" method="post" enctype="multipart/form-data">
                        @csrf
                <div class="card-body">
                    <input type="file" name="file" class="form-control" required="">
                    <br>
                    @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit" class="btn btn-purple">Update</button>
                </div>
            </form>
            </div>
        </div>

    </div>
</div>
@endsection
