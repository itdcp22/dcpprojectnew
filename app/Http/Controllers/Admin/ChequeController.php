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
        

            
        $id = Cheque::where('comp_code', auth()->user()->company)->orderByDesc('tran_number')->first()->tran_number ?? date('Y') . 00000;
        $year = date('Y');
        $id_year = substr($id, 0, 4);
        $seq = $year <> $id_year ? 0 : +substr($id, -5);
        $new_id = sprintf("%0+4u%0+6u", $year, $seq+1);   
       

        

         
        
        foreach ($request->chq_number as $key =>$name) 
        {

            if($request->chq_number[$key]) {
                $cheque = resolve(Cheque::class);     
                $cheque->name = $request->name;  
                $cheque->bank_name = $request->bank_name;          
                $cheque->narration = $request->narration;
                $cheque->tran_number = $new_id;              
                $cheque->chq_number = $request->chq_number[$key] ;
                $cheque->chq_amount = $request->chq_amount[$key] ;                
                $cheque->reference = $request->reference[$key] ; 
                $cheque->status = '0';

                $date  = Carbon::createFromFormat('d-m-Y', $request->chq_date[$key]);        
                $cheque->chq_date = $date;    

                $cheque->comp_code = Auth::user()->company;
                $cheque->user_id = Auth::user()->id;
                $cheque->user_name= Auth::user()->name;

                $today = Carbon::now();
                $cheque->account_year = $today->year;

                $todaymnt = Carbon::now();
                $cheque->account_month = $todaymnt->month;                
                
                $cheque->save();
                
              }

     
        }      

        



        return redirect()->route('admin.cheque.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cheque $cheque)
    {
        return view('admin.cheque.show',compact('cheque'));
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
