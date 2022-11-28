<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Trans;
use App\Models\Country;
use App\Models\Identity;
use App\Models\University;
use App\Models\Faculity;
use App\Models\Degree;
use App\Models\Certificate;
use App\Models\State;
use App\Models\Work;
use App\Models\Inistitute;
use App\Models\Jobtitle;
use Session;
use App;
use URL;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    
    public function registration()
    {
        if(empty(auth()->user()->id))
        return view('auth.create');
        else
        return redirect(route('users.show',auth()->user()->id));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function userStore(Request $request)
    {
        $user = new User();
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'phone' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|min:6',
        ]);
        if ($request->hasFile('img')) {
            //get filename with extension
            $filenameWithExt = $request->file('img')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('img')->getClientOriginalExtension();
            //create filename to store
            $fileNametoStore = $filename . '_' . time() . '.' . $extension;
            //upload image
            $path = $request->file('img')->move(public_path('img/users'), $fileNametoStore);
            //$path = $request->file('img')->storeAs('public/img/market/thumbnail/', $fileNametoStore);
        }
        if ($request->hasFile('img')) {
            $user->img = $fileNametoStore;
        } else {
            $user->img = "profile.jpg";
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request['password']);
        $user->status = 1;
        $user->save();

        //$user_id = $this->user_model->addUser($user);
        $post = array('password' => $user->password, 'email' => $user->email);
        Auth::loginUsingId($user->id);

        Session::flash('نجاح', 'تمت اضافة البيانات بنجاح');

        return redirect(route('users.show',$user->id));
        
    }
}
