<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Cashtopup;
use Auth;
use Gate;

//we need to add the below if we create new excel export
use App\Exports\CashtopupExport;
use Maatwebsite\Excel\Facades\Excel;

class CashtopupController extends Controller
{

    public function cashtopupexport()
    {
        return Excel::download(new CashtopupExport, 'Cashtopup.xls');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('isAdmin')) {
            abort(404, "Sorry you are not allowed");
        }


        $arr['cashtopups'] = Cashtopup::where('comp_code', auth()->user()->company)->get();
        return view('admin.cashtopups.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cashtopups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Cashtopup $cashtopup)
    {

        $date  = Carbon::createFromFormat('d-m-Y', $request->topup_dt);
        $cashtopup->topup_dt = $date;

        //$cashtopup->topup_dt = $request->topup_dt;
        $cashtopup->cheque_no = $request->cheque_no;
        $cashtopup->topup_amt = $request->topup_amt;
        $cashtopup->bank_name = $request->bank_name;
        $cashtopup->remarks = $request->remarks;


        $cashtopup->emp_id = Auth::user()->id;
        $cashtopup->emp_name = Auth::user()->name;
        $cashtopup->dept_code = Auth::user()->dept;
        $cashtopup->comp_code = Auth::user()->company;

        $cashtopup->save();
        return redirect('admin/cashtopups')->with('success', 'Transaction created successfully!');
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
