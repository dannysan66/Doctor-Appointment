@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-white bg-dark lead">
                    Appointments ({{$bookings->count()}})
                </div>
                <form action="{{ route('patient') }}" method="GET">
                <div class="card-header">
                    <b>Filter: </b>
                    <div class="row">
                    <div class="col-md-10">
                        <input type="text" class="form-control datetimepicker-input" id="datepicker"
                        data-toggle="datetimepicker" data-target="#datepicker" name="date" style="margin-left: 5px;">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
                </div>
            </form>

                <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Photo</th>
                          <th scope="col">Date</th>
                          <th scope="col">User</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone Number</th>
                          <th scope="col">Gender</th>
                          <th scope="col">Time</th>
                          <th scope="col">Doctor</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($bookings as $key=>$booking)
                        <tr>
                          <th scope="row">{{$key+1}}</th>
                          <td><img src="/profile/{{$booking->user->image}}"
                            width="80" style="border-radius:50%;" alt="">
                          </td>
                          <td>{{$booking->date}}</td>
                          <td>{{$booking->user->name}}</td>
                          <td>{{$booking->user->email}}</td>
                          <td>{{$booking->user->phone_number}}</td>
                          <td>{{$booking->user->gender}}</td>
                          <td>{{$booking->time}}</td>
                          <td>{{$booking->doctor->name}}</td>
                          <td>
                              @if($booking->status==0)
                              <a href="{{ route('update.status',[$booking->id]) }}">
                              <button class="btn btn-blue">Pending</button>
                              </a>
                              @else
                              <a href="{{ route('update.status',[$booking->id]) }}">
                              <button class="btn btn-primary">Checked</button>
                              </a>
                              @endif
                          </td>
                        </tr>
                        @empty
                        <td>There is no appointments today</td>
                        @endforelse

                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">

    .btn-blue {
        background: #1d2366 !important;
        color: white;
    }

    .btn-blue:hover {
        opacity: 90%;
        background: #1d2366 !important;
        color: white !important;
    }

    .btn-purple {
        background: #6c63ff;
        color: white;
        margin-right: 10px !important;
        border: none !important;
    }

    .btn-purple:hover {
        background: #6c63ff !important;
        opacity: 90%;
        color: white !important;
    }

</style>
@endsection
