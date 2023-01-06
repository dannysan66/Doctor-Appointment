<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Time;
use App\Models\User;
use App\Models\Booking;
use App\Models\Prescription;
use App\Mail\AppointmentMail;

class FrontendController extends Controller
{
    public function index()
    {
        date_default_timezone_set('America/Los_Angeles');
        if(request('date')){
            $doctors = $this->findDoctorsBasedOnDate(request('date'));
            return view('welcome', compact('doctors'));
        }
        $doctors = Appointment::where('date', date('Y-m-d'))->get();
        return view('welcome', compact('doctors'));
    }

    public function show($doctorId,$date)
    {
        $appointment = Appointment::where('user_id',$doctorId)->where('date',$date)->first();
        $times = Time::where('appointment_id',$appointment->id)->where('status',0)->get();
        $user = User::where('id',$doctorId)->first();
        $doctor_id = $doctorId;

        return view('appointment',compact('times','date','user','doctor_id'));
    }

    public function findDoctorsBasedOnDate($date)
    {
        $doctors = Appointment::where('date', $date)->get();
        return $doctors;
    }

    public function store(Request $request)
    {
        date_default_timezone_set('America/Los_Angeles');
        $request->validate(['time'=>'required']);
        $check = $this->checkBookingTimeInterval();
        if($check)
        {
            return redirect()->back()->with('errmessage','You already scheduled an appointment.');
        }

        Booking::create([
            'user_id'=>auth()->user()->id,
            'doctor_id'=>$request->doctorId,
            'time'=>$request->time,
            'date'=>$request->date,
            'status'=>0,
        ]);

        Time::where('appointment_id',$request->appointmentId)
        ->where('time',$request->time)
        ->update(['status'=>1]);

        //Email notification sent
        $doctorName = User::where('id',$request->doctorId)->first();
        $mailData = [
            'name'=>auth()->user()->name,
            'time'=>$request->time,
            'date'=>$request->date,
            'doctorName'=>$doctorName->name,
        ];
        try {
            \Mail::to(auth()->user()->email)->send(new AppointmentMail($mailData));
        }catch(\Exception $e){

        }

        return redirect()->back()->with('message','Your appointment was scheduled.');
    }


    //Doesn't let users book more than one appointment until 24 hours
    public function checkBookingTimeInterval()
    {
        return Booking::orderby('id','desc')
        ->where('user_id',auth()->user()->id)
        ->whereDate('created_at',date('Y-m-d'))
        ->exists();
    }

    public function myBookings()
    {
        $appointments = Booking::latest()->where('user_id',auth()->user()->id)->get();
        return view('booking.index',compact('appointments'));
    }

    public function myPrescription()
    {
        $prescriptions = Prescription::where('user_id',auth()->user()->id)->get();
        return view('my-prescription',compact('prescriptions'));
    }
}
