<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\Moneymove;
use App\Models\Trans;
use App\Models\Item;
use URL;
use Response;
use Excel;
use App\Imports\CustomersImport;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    

    public function back()
    {
        $urls = array();
        if(session()->has('links')){
            $urls[] = session('links');
        }
        
        
        $currentUrl = $_SERVER['REQUEST_URI'];
        array_unshift($urls, $currentUrl);
        session()->flash('urls', $urls);
        $links = session('urls'); 

        return redirect($links[2]);
    }
    public function index()
    {
        return redirect(route('users.show',auth()->user()->id));
    }

    public function printItemsDonations()
    {
        Session::put('link', 'index');
        $items = Item::where('status',1)->get();
        if(empty(session()->get('dateFromItem'))){
            $dateFrom = \Carbon\Carbon::now()->subDays(30)->format('Y-m-d');
            $dateTo = \Carbon\Carbon::now()->format('Y-m-d');
        }else{
            $dateFrom = session()->get('dateFromItem');
            $dateTo = session()->get('dateToItem');
        }
        return view('admin.reports.itemsDonation')->with('items',$items)->with('dateFrom',$dateFrom)->with('dateTo',$dateTo);
    }

    public function printItemsDistributes()
    {
        Session::put('link', 'index');
        
        $items = Item::where('status',1)->get();
        if(empty(session()->get('dateFromItem'))){
            $dateFrom = \Carbon\Carbon::now()->subDays(30)->format('Y-m-d');
            $dateTo = \Carbon\Carbon::now()->format('Y-m-d');
        }else{
            $dateFrom = session()->get('dateFromItem');
            $dateTo = session()->get('dateToItem');
        }
        $orders = Order::where('ddate','>=',$dateFrom)->where('ddate','<=',$dateTo)->get();
        return view('admin.reports.itemsDistribute')->with('items',$items)->with('orders',$orders)->with('dateFrom',$dateFrom)->with('dateTo',$dateTo);
    }

    public function soon()
    {
        return view('admin.soon');
    }

    public function moneymoves(){
        Session::put('link', 'moneymoves');
        $moneymoves = Moneymove::orderBy('id','desc')->get();
        return view('admin.moneymoves.index')->with('moneymoves',$moneymoves);
    }

    public function transs(){
        Session::put('link', 'transs');
        $transs = Trans::orderBy('id','desc')->get();
        return view('admin.transs.index')->with('transs',$transs);
    }

    public function settings(){
        Session::put('link', 'settings');
        return view('admin.settings');
    }
    public function email(){
        Session::put('link', 'email');
        $users = User::where('status',1)->get();
        return view('admin.email')->with('users',$users);
    }

    public function downloadExcel()
    {
        $file = public_path()."\\excel\sample.csv";
        $header = array('Content-Type: application/vnd.ms-excel',);
        return Response::download($file,"sample.csv",$header);
      
        return redirect(route('customers.index'));
    }

    public function uploadExcel(Request $request){
        //$path1 = $request->excelFile->store('temp'); 
        //$path=storage_path('app').'/'.$path1;  
        $data = Excel::import(new CustomersImport,$request->excelFile);

        //Excel::import(new CustomersImport,$request->file);
        return redirect(route('customers.index'));
    }

    public function setItemDate(Request $request)
    {
        session()->put('dateFromItem',$request->from);
        session()->put('dateToItem',$request->to);
        return redirect(url(URL::previous()));
    }

    public function setDonationsDate(Request $request)
    {
        session()->put('dateFromDonations',$request->from);
        session()->put('dateToDonations',$request->to);
        return redirect(url(URL::previous()));
    }

    public function setBillDate(Request $request)
    {
        session()->put('dateFromBill',$request->from);
        session()->put('dateToBill',$request->to);
        return redirect(url(URL::previous()));
    }

    public function setStockDate(Request $request)
    {
        session()->put('dateFromStock',$request->from);
        session()->put('dateToStock',$request->to);
        return redirect(url(URL::previous()));
    }
}
