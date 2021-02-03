<?php

namespace App\Http\Controllers\Kpi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Initiative;
use App\Info;
use App\Objective;

use App\Country;
use App\State;
use Auth;
use App\User;
use Gate;
use DB;

class InitiativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['initiative'] = Initiative::where('ini_created_uid', auth()->user()->id)->get();
        return view('kpi.initiative.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lastRecord = Initiative::latest()->where('ini_created_uid', Auth::user()->id)->first();

        $arr['info'] = Info::where('kpi_created_uid', auth()->user()->id)->get();
        return view('kpi.initiative.create', compact('lastRecord'))->with($arr);
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Initiative $initiative)
    {

        if (Auth::user()->company == "34") {
            if (Auth::user()->dept == "Operation") {
                $kpi_head = "INI/OA/OP/";
                $kpinofull = $kpi_head . $request->ini_code;
                $initiative->ini_code = $kpinofull;
            } else if (Auth::user()->dept == "Finance") {
                $kpi_head = "INI/OA/FI/";
                $kpinofull = $kpi_head . $request->ini_code;
                $initiative->ini_code = $kpinofull;
            } else if (Auth::user()->dept == "Marketing") {
                $kpi_head = "INI/OA/MA/";
                $kpinofull = $kpi_head . $request->ini_code;
                $initiative->ini_code = $kpinofull;
            } else if (Auth::user()->dept == "Procurment") {
                $kpi_head = "INI/OA/PR/";
                $kpinofull = $kpi_head . $request->ini_code;
                $initiative->ini_code = $kpinofull;
            } else if (Auth::user()->dept == "FOH") {
                $kpi_head = "INI/OA/FOH/";
                $kpinofull = $kpi_head . $request->ini_code;
                $initiative->ini_code = $kpinofull;
            } else if (Auth::user()->dept == "BOH") {
                $kpi_head = "INI/OA/BOH/";
                $kpinofull = $kpi_head . $request->ini_code;
                $initiative->ini_code = $kpinofull;
            } else if (Auth::user()->dept == "Leasing") {
                $kpi_head = "INI/OA/LE/";
                $kpinofull = $kpi_head . $request->ini_code;
                $initiative->ini_code = $kpinofull;
            } else if (Auth::user()->dept == "HR") {
                $kpi_head = "INI/OA/HR/";
                $kpinofull = $kpi_head . $request->ini_code;
                $initiative->ini_code = $kpinofull;
            }
        } else if (Auth::user()->company == "92") {
            if (Auth::user()->dept == "Operation") {
                $kpi_head = "INI/MOM/OP/";
                $kpinofull = $kpi_head . $request->ini_code;
                $initiative->ini_code = $kpinofull;
            } else if (Auth::user()->dept == "Finance") {
                $kpi_head = "INI/MOM/FI/";
                $kpinofull = $kpi_head . $request->ini_code;
                $initiative->ini_code = $kpinofull;
            } else if (Auth::user()->dept == "Marketing") {
                $kpi_head = "INI/MOM/MA/";
                $kpinofull = $kpi_head . $request->ini_code;
                $initiative->ini_code = $kpinofull;
            } else if (Auth::user()->dept == "Procurment") {
                $kpi_head = "INI/MOM/PR/";
                $kpinofull = $kpi_head . $request->ini_code;
                $initiative->ini_code = $kpinofull;
            } else if (Auth::user()->dept == "FOH") {
                $kpi_head = "INI/MOM/FOH/";
                $kpinofull = $kpi_head . $request->ini_code;
                $initiative->ini_code = $kpinofull;
            } else if (Auth::user()->dept == "BOH") {
                $kpi_head = "INI/MOM/BOH/";
                $kpinofull = $kpi_head . $request->ini_code;
                $initiative->ini_code = $kpinofull;
            } else if (Auth::user()->dept == "Leasing") {
                $kpi_head = "INI/MOM/LE/";
                $kpinofull = $kpi_head . $request->ini_code;
                $initiative->ini_code = $kpinofull;
            } else if (Auth::user()->dept == "HR") {
                $kpi_head = "INI/MOM/HR/";
                $kpinofull = $kpi_head . $request->ini_code;
                $initiative->ini_code = $kpinofull;
            }
        }



        $initiative->ini_created_uid = Auth::user()->id;
        $initiative->ini_created_name = Auth::user()->name;
        $initiative->ini_dept = Auth::user()->dept;
        $initiative->ini_comp_code = Auth::user()->company;

        $initiative->ini_obj_id = $request->ini_obj_id;
        $initiative->ini_obj_desc = $request->info_obj_des;

        $initiative->ini_kpi_id = $request->ini_kpi_id;
        $initiative->ini_kpi_title = $request->ini_kpi_title;

        //  $initiative->ini_code = $request->ini_code;
        $initiative->ini_title = $request->ini_title;
        $initiative->ini_desc = $request->ini_desc;
        $initiative->ini_scope = $request->ini_scope;

        $initiative->ini_msr = $request->ini_msr;
        $initiative->ini_cur_result = $request->ini_cur_result;
        $initiative->ini_owner = $request->ini_owner;
        $initiative->ini_budget = $request->ini_budget;
        $initiative->ini_priority = $request->ini_priority;


        $fromdate  = Carbon::createFromFormat('d-m-Y', $request->ini_start_date);
        $initiative->ini_start_date = $fromdate;

        $todate  = Carbon::createFromFormat('d-m-Y', $request->ini_end_date);
        $initiative->ini_end_date = $todate;



        $initiative->ini_owner = $request->ini_owner;
        $initiative->ini_risk = $request->ini_risk;
        $initiative->ini_maj_acti = $request->ini_maj_acti;
        $initiative->ini_comments = $request->ini_comments;



        $initiative->save();
        return redirect('kpi/initiative')->with('success', 'Transaction created successfully!');
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

    public function changeCompanyName(Request $request)
    {
        return Info::findOrFail($request->id);
    }
}
