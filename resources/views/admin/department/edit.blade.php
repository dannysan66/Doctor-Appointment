@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>Departments</h5>
                    <span>Update Department</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Department</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header bg-dark lead">
                <h3 style="color:white;">Add Department</h3>
            </div>
            <div class="card-body">
                <form class="forms-sample" action="{{ route('department.update', [$department->id]) }}" method="post">@csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group">
                            <label for="">Department name</label>
                            <input type="text" name="department" class="form-control
                            @error('department') is-invalid @enderror" placeholder="department name" value="{{ $department->department }}">
                            @error('department')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
