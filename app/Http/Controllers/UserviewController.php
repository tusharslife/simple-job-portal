<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class UserviewController extends Controller
{
    public function __construct(){
        $this->middleware(['seeker']);
    }

    public function index(){
        return view('profile.seekershow');
    }

    public function store(Request $request){
        $this->validate($request, [
            'address' => 'required',
            'phone_number' => 'required|numeric',
            'experience' => 'required|min:20',
            'bio' => 'required|min:20'
        ]);

        $user_id = auth()->user()->id;

        Profile::where('user_id', $user_id)->update([
            'address' => request('address'),
            'phone_number' => request('phone_number'),
            'experience' => request('experience'),
            'bio' => request('bio')
        ]);

        return redirect()->back()->with('profile_message', 'Profile Updated');
    }


    public function avatar(Request $request){
        $this->validate($request, [
            'avatar' => 'required|mimes:png,jpeg,jpg'
        ]);
        $user_id = auth()->user()->id;

        if($request->hasFile('avatar')){
            $file = $request->file('avatar');

            $ext = $file->getClientOriginalExtension();

            $filename = time().'.'.$ext;

            $file->move('uploads/avatar/', $filename);

            Profile::where('user_id', $user_id)->update([
                'avatar' => $filename
            ]);

            return redirect()->back()
                ->with('avatar_message', 'Avagar Updated')
                ->with('class', 'alert alert-success');

        } else {
            return redirect()->back()
                ->with('avatar_message', 'Choose a file')
                ->with('class', 'alert alert-danger');
        }
    }


}
