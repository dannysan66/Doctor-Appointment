@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>Doctors</h5>
                    <span>Add Doctor</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Doctor</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        @if(Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
        @endif
        <div class="card">
            <div class="div card-header">
                <h3>Confirm Delete</h3>
            </div>
            <div class="card-body">
                <img src="{{ asset('images/') }}/{{ $user->image }}" width="120px" height="120px" alt="">
                <h2>{{ $user->name }}</h2>
                <form class="forms-sample" action="{{ route('doctor.destroy', [$user->id]) }}" method="post">@csrf
                    @method('DELETE')

                    <div class="card-footer">
                        <button type="submit" class="btn btn-danger mr-2">Confirm</button>
                        <a href="{{ route('doctor.index') }}" class="btn btn-secondary">
                            Cancel
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
