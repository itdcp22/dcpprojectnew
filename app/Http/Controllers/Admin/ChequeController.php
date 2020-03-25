<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Cheque;
use App\Admin_Beneficiary;
Use Auth;


use App\User;

class ChequeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['cheque'] = Cheque::where('comp_code', auth()->user()->company)
        ->orderBy('ID','desc')->get();
        return view('admin.cheque.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $arr['admin_beneficiary'] = Admin_Beneficiary::all();        
        


        return view('admin.cheque.create')->with($arr);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Cheque $cheque)
    {
        $cheque->comp_code = Auth::user()->company;
        $cheque->user_id = Auth::user()->id;
        $cheque->user_name= Auth::user()->name;

        $cheque->name = $request->name;  
        $cheque->bank_name = $request->bank_name;  

        $date  = Carbon::createFromFormat('d-m-Y', $request->chq_date);        
        $cheque->chq_date = $date;   


        //$cheque->chq_date = $request->chq_date;  
        $cheque->chq_amount = $request->chq_amount;  
        $cheque->chq_number = $request->chq_number; 
        $cheque->narration = $request->narration; 
        $cheque->reference = $request->reference;  
        $cheque->status = '0'; 

        $today = Carbon::now();
        $cheque->account_year = $today->year;

        $todaymnt = Carbon::now();
        $cheque->account_month = $todaymnt->month;

        $cheque->save();       

        return redirect()->route('admin.cheque.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
