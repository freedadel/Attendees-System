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
    public function arabic()
    {
        App::setlocale('ar');
        Session::put('lang', 'ar');
        return redirect(url(URL::previous()));
    }
    public function english()
    {
        App::setlocale('en');
        Session::put('lang', 'en');
        return redirect(url(URL::previous()));
    }
    public function index()
    {
        return view('public.index');
    }
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
    function profile(){
        if(empty(auth()->user()->id))
        return redirect(route('login'));

        $user = User::findorFail(auth()->user()->id);
        return view('admin.users.show')->with('user',$user);
    }

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

    function userComplete(){
        if(empty(auth()->user()->id))
        return redirect(route('login'));

        $user = User::findorFail(auth()->user()->id);
        if(session()->get('lang')=='en'){
        $countries = Country::where('id','!=',0)->orderBy('name_en','ASC')->get();
        }else{
        $countries = Country::where('id','!=',0)->orderBy('name_ar','ASC')->get();
        }
        $identities = Identity::where('status',1)->get();
        return view('auth.complete')->with('user',$user)->with('countries',$countries)->with('identities',$identities);   
    }

    public function userUpdate(Request $request)
    {
        if(empty(auth()->user()->id))
        return redirect(route('login'));

        $user = User::findorFail(auth()->user()->id);
        $this->validate($request, [
            'name_en' => 'required|string|max:191',
            'inside' => 'required',
            'country' => 'required_if:inside,2',
            'bdate1' => 'required',
            'bdate2' => 'required',
            'bdate3' => 'required',
            'gender' => 'required',
            'identity_id' => 'required',
            'identity_no' => 'required',
            'phone_call' => 'required',
            'phone_whats' => 'required',
        ]);
        
        $user->name_en = $request->name_en;
        $user->inside = $request->inside;
        if($request->inside == 1){
            $user->country_id = 194;
        }else{
            $user->country_id = $request->country;
        }
        
        $user->bdate = $request->bdate3."-".$request->bdate2."-".$request->bdate1;
        $user->day = $request->bdate1;
        $user->month = $request->bdate2;
        $user->year = $request->bdate3;
        $user->gender = $request->gender;
        $user->identity_id = $request->identity_id;
        $user->identity_no = $request->identity_no;
        $user->phone_call = $request->phone_call;
        $user->c_code = $request->code1;
        $user->phone_whats = $request->phone_whats;
        $user->twitter = $request->twitter;
        $user->linkedin = $request->linkedin;
        $user->facebook = $request->facebook;
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
        $user->save();

        $trans = new Trans();
        $trans->t_type = "تحديث البيانات الشخصية";
        $trans->user_id = $user->id;
        $trans->save();

        Session::flash('نجاح', 'تمت اضافة البيانات بنجاح');

        return redirect(route('userEducation'));
        
        
    }
    function userEducation(){
        if(empty(auth()->user()->id))
        return redirect(route('login'));

        $user = User::findorFail(auth()->user()->id);

        if(session()->get('lang')=='en'){
            $universities = University::where('status','1')->pluck('name_en');
            $faculties = Faculity::where('status','1')->pluck('name_en');
        }else{
            $universities = University::where('status','1')->pluck('name_ar');
            $faculties = Faculity::where('status','1')->pluck('name_ar');
        }
        $degrees = Degree::where('status','1')->get();
        
        return view('auth.education')->with('user',$user)->with('degrees',$degrees)
        ->with('universities',$universities)->with('faculties',$faculties);
    }

    function userWorkData(){
        if(empty(auth()->user()->id))
        return redirect(route('login'));

        $user = User::findorFail(auth()->user()->id);
        $work = Work::where('user_id',auth()->user()->id)->orderBy('id','DESC')->first();
        $states = State::where('status','1')->get();
        
        if(session()->get('lang')=='en'){
            $inistitutes = Inistitute::where('status','1')->pluck('name_en');
            $job_titles = Jobtitle::where('status','1')->pluck('name_en');
        }else{
            $inistitutes = Inistitute::where('status','1')->pluck('name_ar');
            $job_titles = Jobtitle::where('status','1')->pluck('name_ar');
        }
        return view('auth.work')->with('user',$user)->with('job_titles',$job_titles)
        ->with('states',$states)->with('work',$work)->with('inistitutes',$inistitutes);
    }

    public function userEdu(Request $request)
    {
        if(empty(auth()->user()->id))
        return redirect(route('login'));

        $user = User::findorFail(auth()->user()->id);
        
        $count = $request->count;
        for($i = 1;$i <= $count;$i++){
            $this->validate($request, [
                'university'.$i => 'required',
                'faculity'.$i => 'required',
                'degree'.$i => 'required',
            ]);
            $university = University::where("name_ar",$request->input("university".$i))->orWhere("name_en",$request->input("university".$i))->first();
            $faculity = Faculity::where("name_ar",$request->input("faculity".$i))->orWhere("name_en",$request->input("faculity".$i))->first();
            if(empty($university)){
                $university = new University();
                if(session()->get('lang')=='en'){
                    $university->name_en = $request->input("university".$i);
                }else{
                    $university->name_ar = $request->input("university".$i);
                }
                $university->inside = 1;
                $university->status = 1;
                $university->save();
            }

            if(empty($faculity)){
                $faculity = new Faculity();
                if(session()->get('lang')=='en'){
                    $faculity->name_en = $request->input("faculity".$i);
                }else{
                    $faculity->name_ar = $request->input("faculity".$i);
                }
                $faculity->status = 1;
                $faculity->save();
            }


            $edu = new Certificate();
            $edu->university_id = $university->id;
            $edu->faculty_id = $faculity->id;
            $edu->degree_id = $request->input("degree".$i);
            $edu->status = 1;
            $edu->user_id = auth()->user()->id;

            if ($request->hasFile('img'.$i)) {
                $filenameWithExt = $request->file('img'.$i)->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('img'.$i)->getClientOriginalExtension();
                $fileNametoStore = $filename . '_' . time() . '.' . $extension;
                $path = $request->file('img'.$i)->move(public_path('img/certificates'), $fileNametoStore);
            }
            if ($request->hasFile('img'.$i)) {
                $edu->certificate = $fileNametoStore;
            }
        $edu->save();
        }
        $trans = new Trans();
        $trans->t_type = "تحديث البيانات الشخصية";
        $trans->user_id = $user->id;
        $trans->save();

        Session::flash('نجاح', 'تمت اضافة البيانات بنجاح');

        return redirect(route('userWorkData'));
        
    }

    public function userWork(Request $request)
    {
        if(empty(auth()->user()->id))
        return redirect(route('login'));

            $user = User::findorFail(auth()->user()->id);
            if($request->work == 1)
            {
                $this->validate($request, [
                    'sector_id' => 'required',
                    'institute' => 'required',
                    'year' => 'required',
                    'img' => 'required',
                ]);
                $institute = Inistitute::where("name_ar",$request->institute)->orWhere("name_en",$request->institute)->first();
                if(empty($institute)){
                    $institute = new Inistitute();
                    if(session()->get('lang')=='en'){
                        $institute->name_en = $request->institute;
                    }else{
                        $institute->name_ar = $request->institute;
                    }
                    $institute->status = 1;
                    $institute->save();
                }

                $job_title = Jobtitle::where("name_ar",$request->job_title)->orWhere("name_en",$request->job_title)->first();
                if(empty($job_title)){
                    $job_title = new Jobtitle();
                    if(session()->get('lang')=='en'){
                        $job_title->name_en = $request->job_title;
                    }else{
                        $job_title->name_ar = $request->job_title;
                    }
                    $job_title->status = 1;
                    $job_title->save();
                }
    
                $work = new Work();
                $work->institute_id = $institute->id;
                $work->country_id = $user->country_id;
                $work->sector_id = $request->sector_id;
                $request->state?$work->state_id = $request->state:$work->state_id==19;
                $work->job_title_id = $job_title->id;
                $work->years = $request->years;
                $work->status = 1;
                $work->user_id = auth()->user()->id;
    
                if ($request->hasFile('img')) {
                    $filenameWithExt = $request->file('img')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('img')->getClientOriginalExtension();
                    $fileNametoStore = $filename . '_' . time() . '.' . $extension;
                    $path = $request->file('img')->move(public_path('img/work'), $fileNametoStore);
                }
                if ($request->hasFile('img')) {
                    $work->img = $fileNametoStore;
                }
            $work->save();
            }
            
        $user->iswork = $request->work;
        $user->save();

        $trans = new Trans();
        $trans->t_type = "تحديث بيانات العمل";
        $trans->user_id = $user->id;
        $trans->save();

        Session::flash('نجاح', 'تمت اضافة البيانات بنجاح');

        return redirect(route('profile'));
    }
}
