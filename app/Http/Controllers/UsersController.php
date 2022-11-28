<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use File;
use Carbon\Carbon;
use App\Models\Record;
use App\Models\User;

use Excel;
use App\Imports\AttendeesImport;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('link', 'users');
        $users = User::where('status',1)->get();
       
        
        return view('admin.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $user->permission = $request->permission;
        $user->password = Hash::make($request['password']);
        $user->status = 1;
        $user->save();

        Session::flash('نجاح', 'تمت اضافة المستخدم بنجاح');

        return redirect(route('users.view',$user->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $available_day = false;
        $available_checkin = false;
        $available_checkout = false;

        //dd(Carbon::now()->format('H'));

        if(Carbon::now()->dayOfWeek != 5 && Carbon::now()->dayOfWeek != 6)
        $available_day = true;

        if(Carbon::now()->format('H') < 12)
        {
            $available_checkin = true;
        }

        if(Carbon::now()->format('H') >= 12)
        {
            $available_checkout = true;
        }

        $user= User::findorFail($id);
        
        $record = Record::where('user_id',$id)->orderBy('id','DESC')->first();
        $record_checkin = Record::where('user_id',$id)->where('type',1)->orderBy('id','DESC')->first();
        return view('admin.users.show')->with('user', $user)->with('record', $record)->with('record_checkin', $record_checkin)
        ->with('available_day', $available_day)->with('available_checkin', $available_checkin)->with('available_checkout', $available_checkout);
    }

    public function checkin()
    {
        $record = new Record();
        $record->user_id = auth()->user()->id;
        $record->type = 1;
        $record->save();

        return redirect(route('users.show',auth()->user()->id));
    }

    public function checkout()
    {
        $record = new Record();
        $record->user_id = auth()->user()->id;
        $record->type = 2;
        $record->save();

        return redirect(route('users.show',auth()->user()->id));
    }

    public function records()
    {
        $month = Carbon::now()->format('m');
        $records = Record::where('user_id',auth()->user()->id)->whereMonth('created_at',$month)->orderBy('id','ASC')->get();
        return view('admin.users.records')->with('records', $records);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all()->where("id", $id);
        return view('admin.users.edit')->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findorFail($id);
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191',
            'phone' => 'required|string|max:191',
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
        }

        if ($request->password) {
            $user->password = Hash::make($request['password']);
        }
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        Session::flash('نجاح', 'تم تحديث البيانات');

        return redirect(route('users.show',$user->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorFail($id);

        
        //then Delete User
        $user->email =  Hash::make($user->email);
        $user->password = Hash::make('xyz@zyx');
        $user->status = 5;
        $user->save();
        Session::flash('نجاح', 'تم حذف المستخدم');
        return redirect(route('users.index'));
    }
}
