<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserController;

use Illuminate\Http\Request;
use App\Account;
use App\Cashtopup;
use App\Item;
use Auth;
use Gate;
use PDF;

use Carbon\Carbon;
use App\Brand;
use App\Utility;

use App\User;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //Users::where('id', 1)->count();
        return view('home');
    }

    public function coh(Request $request)
    {
        //Users::where('id', 1)->count();
        return view('cash');
    }

    public function icc(Request $request)
    {
        //Users::where('id', 1)->count();
        return view('homeicc');
    }
    public function mallwp(Request $request)
    {
        //Users::where('id', 1)->count();

        $arr['utility'] = Utility::where('ui_payment_status', 0)
            ->groupBy('ui_brand_id', 'ui_brand_name')
            ->selectRaw('ui_brand_id,ui_brand_name, sum(ui_netamount) as total')->orderBy('total', 'desc')->limit(5)->get();

        return view('mallwp')->with($arr);
    }


    public function kpihome(Request $request)
    {
        //Users::where('id', 1)->count();
        return view('homekpi');
    }





    public function about()
    {
        return view('about');
    }

    public function test()
    {
        return view('testhome');
    }

    public function generatePDF()
    {
        $data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download('bill.pdf');
    }
}
