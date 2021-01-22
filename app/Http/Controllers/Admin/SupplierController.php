<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Supplier;
use Auth;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $arr['supplier'] = Supplier::where('supp_comp_code', auth()->user()->company)
            ->orderBy('ID', 'desc')->get();
        return view('admin.suppliers.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Supplier $supplier)
    {
        $supplier->supp_comp_name = $request->supp_comp_name;

        $supplier->supp_account_name = $request->supp_account_name;
        $supplier->supp_acc_no = $request->supp_acc_no;
        $supplier->supp_bank_name = $request->supp_bank_name;
        $supplier->supp_swift = $request->supp_swift;
        $supplier->supp_iban = $request->supp_iban;
        $supplier->supp_contact = $request->supp_contact;
        $supplier->supp_status = 1;

        $supplier->supp_created_uid = Auth::user()->id;
        $supplier->supp_created_name = Auth::user()->name;
        $supplier->supp_comp_code = Auth::user()->company;

        $supplier->save();

        return redirect()->route('admin.suppliers.index');
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
    public function edit(Supplier $supplier)
    {
        $arr['supplier'] = $supplier;
        return view('admin.suppliers.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $supplier->supp_bank_name = $request->supp_bank_name;

        $supplier->supp_comp_name = $request->supp_comp_name;
        $supplier->supp_account_name = $request->supp_account_name;
        $supplier->supp_acc_no = $request->supp_acc_no;
        $supplier->supp_bank_name = $request->supp_bank_name;
        $supplier->supp_swift = $request->supp_swift;
        $supplier->supp_iban = $request->supp_iban;



        $supplier->save();
        return redirect()->route('admin.suppliers.index');
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
