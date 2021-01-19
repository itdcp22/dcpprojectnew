<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Payments;
use App\Bank;
use App\Supplier;


use Auth;
use Gate;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $arr['payments'] = Payments::where('pay_comp_code', auth()->user()->company)->orderBy('pay_tran_no', 'desc')->get();
        return view('admin.payments.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $arr['bank'] = Bank::where('bank_comp_code', auth()->user()->company)->get();
        $arr['supplier'] = Supplier::where('supp_comp_code', auth()->user()->company)->get();
        return view('admin.payments.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Payments $payments)
    {

        $id = Payments::where('pay_comp_code', auth()->user()->company)
            ->orderByDesc('pay_tran_no')->first()->pay_tran_no ?? date('Y') . 00000;
        $year = date('Y');
        $id_year = substr($id, 0, 4);
        $seq = $year <> $id_year ? 0 : +substr($id, -5);
        // $new_id = sprintf("%0+4u%0+6u", $year, $seq + 1);
        //$account->th_tran_no = $new_id;    


        $lastAccountForCurrentYear = Payments::where('pay_comp_code', auth()->user()->company)
            ->where('pay_tran_no', 'like', date('Y') . '%') // filter for current year numbers
            ->orderByDesc('pay_tran_no', 'desc') // the biggist one first
            ->first();

        $payments->pay_tran_no = $lastAccountForCurrentYear
            ? ($lastAccountForCurrentYear->pay_tran_no + 1) // just increase value to 1
            : (date('Y') . $digitRepresentingASerie . '00001');

        // $new_id = $payments->th_tran_no;




        $payments->pay_supp_acc_name = $request->pay_supp_acc_name;
        $payments->pay_supp_acc_no = $request->pay_supp_acc_no;
        $payments->pay_supp_bank_name = $request->pay_supp_bank_name;
        $payments->pay_supp_swift_code = $request->pay_supp_swift_code;
        $payments->pay_supp_iban = $request->pay_supp_iban;
        $payments->pay_supp_amount = $request->pay_supp_amount;
        $payments->pay_supp_currency = $request->pay_supp_currency;

        $payments->pay_supp_ref_no = $request->pay_supp_ref_no;
        $payments->remarks = $request->remarks;

        $payments->bank_name = $request->bank_name;
        $payments->bank_acc_no = $request->bank_acc_no;

        $payments->pay_created_uid = Auth::user()->id;
        $payments->pay_created_name = Auth::user()->name;
        $payments->pay_comp_code = Auth::user()->company;



        $payments->save();
        return redirect('admin/payments')->with('success', 'Transaction created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Payments $payment)

    {
        //dd($payments);
        return view('admin.payments.show', compact('payment'));
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
