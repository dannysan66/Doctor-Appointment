<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'gender'=>'required',
        ]);
        User::where('id', auth()->user()->id)
        ->update($request->except('_token'));
        return redirect()->back()->with('message','Profile was successfully updated');
    }

    public function profilePic(Request $request)
    {
        $this->validate($request, [
            'file'=>'required|image|mimes:jpeg,jpg,png'
        ]);
        if($request->hasFile('file'))
        {
            $image = $request->file('file');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destination = public_path('/profile');
            $image->move($destination, $name);

            $user = User::where('id',auth()->user()->id)->update(['image'=>$name]);
            return redirect()->back()->with('message','Profile image was successfully updated');
        }
    }
}
