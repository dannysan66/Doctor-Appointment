@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-6">
            <img src="/banner/health.svg" class="img-fluid">
        </div>
        <div class="col-md-6" style="margin-top: 100px;">
            <h2>Create an account & Book your appointment</h2>
            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
            <div class="mt-5">
               <a href="{{url('/register')}}"> <button class="btn btn-purple">Register as Patient</button></a>
                <a href="{{url('/login')}}"><button class="btn btn-blue">Login</button></a>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<!--Search doctor-->
<form action="{{url('/')}}" method="GET">
    <div class="card">
        <div class="card-body">
            <div class="card-header">Find Doctors</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" name="date" class="form-control" id="datepicker">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-blue" type="submit">Find Doctors</button>

                    </div>

                </div>

            </div>
        </div>

    </div>
</form>

    <!--display doctors-->
    <div class="card">
        <div class="card-body">
            <div class="card-header"> Doctors </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Expertise</th>
                            <th>Book</th>
                        </tr>
                    </thead>
                    <tbody>
                       @forelse($doctors as $doctor)
                        <tr>
                            <th scope="row">1</th>
                            <td>
                                <img src="{{asset('images/')}}/{{$doctor->doctor->image}}" style="border-radius: 50%; width:60px;">
                            </td>
                            <td>
                                {{$doctor->doctor->name}}
                            </td>
                            <td>
                                {{$doctor->doctor->department}}
                            </td>
                            <td>
                                <a href="{{route('create.appointment',[$doctor->user_id,$doctor->date])}}"><button class="btn btn-purple">Book Appointment</button></a>
                            </td>
                        </tr>
                        @empty
                        <td>No doctors available today</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!------Services Section------>
<section id="services">
    <div class="container text-center">
        <h1 class="title">WHAT WE DO ?</h1>
        <div class="row text-center row-top">
            <div class="col-md-4 services">
                <img src="banner/pill.png" alt="" class="service-img">
                <h4>Prescriptions</h4>
                <p>Prescribe you with the best recommended medicine to help you get healthy again.</p>
            </div>

            <div class="col-md-4 services">
                <img src="banner/heart.png" alt="" class="service-img">
                <h4>Health</h4>
                <p>We take care of all our patients and nurture them back to health. We take pride in our ability to help pateients regain their "Healthbar."</p>
            </div>

            <div class="col-md-4 services">
                <img src="banner/book.png" alt="" class="service-img">
                <h4>Bookings</h4>
                <p>Help you book appointments as soon as possible to get you back on your feet.</p>
            </div>
        </div>
    </div>
</section>

<!------About Us Section------>
<section id="about-us">
    <div class="container">
        <h1 class="title text-center">WHY CHOOSE US ?</h1>
        <div class="row row-top">
            <div class="col-md-6 about-us">
                <p class="about-title">Why we're different</p>
                <ul>
                    <li>Make sure all patients are treated in great care!</li>
                    <li>Fast booking times</li>
                    <li>Prescribe the best medicine for our patients</li>
                    <li>Have the best doctors to attend our patients</li>
                    <li>We attend our patients at a fast pace without the loss of quality</li>
                </ul>
            </div>

            <div class="col-md-6">
                <img src="banner/doctor1.png" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<!------Social Media Section------>
<section id="social-media">
    <div class="container text-center">
        <h4>FIND US ON SOCIAL MEDIA</h4>
        <div class="social-icons">
            <a href="https://www.facebook.com/"><img src="banner/facebook-icon.png" alt=""></a>
            <a href="https://www.instagram.com/"><img src="banner/instagram-icon.png" alt=""></a>
            <a href="https://twitter.com/i/flow/login"><img src="banner/twitter-icon.png" alt=""></a>
            <a href="https://www.snapchat.com/en-US"><img src="banner/snapchat-icon.png" alt=""></a>
        </div>
    </div>
</section>

<!------Contact Us Section------>
<section id="footer">
    <img src="banner/wave2.png" class="footer-img" alt="">
    <div class="container">
        <div class="row">
            <div class="col-md-4 footer-box left-footer">
                <img src="banner/Health.png" alt="">
                <p>Manage your bookings by creating an account with us!
                    You'll be able to book appointments, view your bookings,
                     and view your prescriptions.
                </p>
            </div>

            <div class="col-md-4 footer-box middle-footer">
                <p class="contact"><b>CONTACT US</b></p>
                <p><i class="fa-solid fa-map-pin"></i> 323 North St Los Angeles CA, 90001</p>
                <p><i class="fa-solid fa-phone"></i> (310) 333-3333</p>
                <p><i class="fa-solid fa-envelope"></i> Healthbar@gmail.com</p>
            </div>

            <div class="col-md-4 footer-box">
                <p class="contact"><b>SUBSCRIBE</b></p>
                <input type="email" class="form-control" placeholder="Your Email">
                <button type="button" class="btn btn-primary">Subscribe</button>

            </div>
        </div>
        <hr>

        <!------Copyright------>
        <p class="copyright"><i class="fa-solid fa-copyright"></i> Website created by Healthbar</p>
    </div>
</section>
@endsection
