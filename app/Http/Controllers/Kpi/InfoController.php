<?php

namespace App\Http\Controllers\Kpi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Info;
use Auth;
use App\User;
use Gate;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $arr['info'] = Info::All();
        return view('kpi.info.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kpi.info.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Info $info)
    {

        $info->kpi_created_uid = Auth::user()->id;
        $info->kpi_created_name = Auth::user()->name;
        $info->info_dept = Auth::user()->dept;
        $info->info_comp_code = Auth::user()->company;

        $info->info_obj_des = $request->info_obj_des;
        $info->kpi_code = $request->kpi_code;
        $info->kpi_title = $request->kpi_title;
        $info->kpi_defi = $request->kpi_defi;
        $info->kpi_goal = $request->kpi_goal;
        $info->kpi_goal = $request->kpi_goal;
        $info->kpi_data_desc = $request->kpi_data_desc;

        $info->kpi_exist = $request->kpi_exist;
        $info->kpi_level = $request->kpi_level;
        $info->kpi_tarperc = $request->kpi_tarperc;
        $info->kpi_tar_fig = $request->kpi_tar_fig;

        $info->kpi_per_gf = $request->kpi_per_gf;
        $info->kpi_per_yf = $request->kpi_per_yf;
        $info->kpi_per_rf = $request->kpi_per_rf;
        $info->kpi_per_gt = $request->kpi_per_gt;
        $info->kpi_per_yt = $request->kpi_per_yt;
        $info->kpi_per_rt = $request->kpi_per_rt;

        $kpi_gf = $request->kpi_tarperc * $request->kpi_per_gf;
        $kpi_yf = $request->kpi_tarperc * $request->kpi_per_yf;
        $kpi_rf = $request->kpi_tarperc * $request->kpi_per_rf;
        $kpi_val_gf = $kpi_gf / 100;
        $kpi_val_yf = $kpi_yf / 100;
        $kpi_val_rf = $kpi_rf / 100;
        $info->kpi_val_gf = $kpi_val_gf;
        $info->kpi_val_yf = $kpi_val_yf;
        $info->kpi_val_rf = $kpi_val_rf;

        $kpi_gt = $request->kpi_tarperc * $request->kpi_per_gt;
        $kpi_yt = $request->kpi_tarperc * $request->kpi_per_yt;
        $kpi_rt = $request->kpi_tarperc * $request->kpi_per_rt;
        $kpi_val_gt = $kpi_gt / 100;
        $kpi_val_yt = $kpi_yt / 100;
        $kpi_val_rt = $kpi_rt / 100;
        $info->kpi_val_gt = $kpi_val_gt;
        $info->kpi_val_yt = $kpi_val_yt;
        $info->kpi_val_rt = $kpi_val_rt;

        if ($info->kpi_level == "Increase") {
            $info->kpi_range_gf = $request->kpi_exist + ($request->kpi_exist * $kpi_val_gf) / 100;
            $info->kpi_range_yf = $request->kpi_exist + ($request->kpi_exist * $kpi_val_yf) / 100;
            $info->kpi_range_rf = $request->kpi_exist + ($request->kpi_exist * $kpi_val_rf) / 100;

            $info->kpi_range_gt = $request->kpi_exist + ($request->kpi_exist * $kpi_val_gt) / 100;
            $info->kpi_range_yt = $request->kpi_exist + ($request->kpi_exist * $kpi_val_yt) / 100;
            $info->kpi_range_rt = $request->kpi_exist + ($request->kpi_exist * $kpi_val_rt) / 100;
        } elseif ($info->kpi_level == "Decrease") {
            $info->kpi_range_gt = $request->kpi_exist - ($request->kpi_exist * $kpi_val_gf) / 100;
            $info->kpi_range_yt = $request->kpi_exist - ($request->kpi_exist * $kpi_val_yf) / 100;
            $info->kpi_range_rt = $request->kpi_exist - ($request->kpi_exist * $kpi_val_rf) / 100;

            $info->kpi_range_gf = $request->kpi_exist - ($request->kpi_exist * $kpi_val_gt) / 100;
            $info->kpi_range_yf = $request->kpi_exist - ($request->kpi_exist * $kpi_val_yt) / 100;
            $info->kpi_range_rf = $request->kpi_exist - ($request->kpi_exist * $kpi_val_rt) / 100;
        }


        $info->kpi_owner = $request->kpi_owner;
        $info->kpi_comments = $request->kpi_comments;



        $info->save();
        return redirect('kpi/info')->with('success', 'Transaction created successfully!');
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
    public function edit(Info $info)
    {
        $arr['info'] = $info;
        return view('kpi.info.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Info $info)
    {

        $actual = $request->actual;
        $data = $request->kpi_data_desc;
        $month = $request->month;
        $quater = $request->quater;



        if ($actual > $info->kpi_range_gf && $actual < $info->kpi_range_gt) {

            if ($data == "Monthly") {

                if ($month == 121) {
                    $info->kpi_jan21 = $actual;
                    $info->kpi_jan21_result = "Green";
                } elseif ($month == 221) {
                    $info->kpi_feb21 = $actual;
                    $info->kpi_feb21_result = "Green";
                } elseif ($month == 321) {
                    $info->kpi_mar21 = $actual;
                    $info->kpi_mar21_result = "Green";
                } elseif ($month == 421) {
                    $info->kpi_apr21 = $actual;
                    $info->kpi_apr21_result = "Green";
                } elseif ($month == 521) {
                    $info->kpi_may21 = $actual;
                    $info->kpi_may21_result = "Green";
                } elseif ($month == 621) {
                    $info->kpi_jun21 = $actual;
                    $info->kpi_jun21_result = "Green";
                } elseif ($month == 721) {
                    $info->kpi_jul21 = $actual;
                    $info->kpi_jul21_result = "Green";
                } elseif ($month == 821) {
                    $info->kpi_aug21 = $actual;
                    $info->kpi_aug21_result = "Green";
                } elseif ($month == 921) {
                    $info->kpi_sep21 = $actual;
                    $info->kpi_sep21_result = "Green";
                } elseif ($month == 1021) {
                    $info->kpi_oct21 = $actual;
                    $info->kpi_oct21_result = "Green";
                } elseif ($month == 1121) {
                    $info->kpi_nov21 = $actual;
                    $info->kpi_nov21_result = "Green";
                } elseif ($month == 1221) {
                    $info->kpi_dec21 = $actual;
                    $info->kpi_dec21_result = "Green";
                }
            } elseif ($data == "Quaterly") {
                if ($quater == "q121") {
                    $info->kpi_q121 = $actual;
                    $info->kpi_q121_result = "Green";
                } elseif ($quater == "q121") {
                    $info->kpi_q221 = $actual;
                    $info->kpi_q221_result = "Green";
                } elseif ($quater == "q221") {
                    $info->kpi_q321 = $actual;
                    $info->kpi_q321_result = "Green";
                } elseif ($quater == "q221") {
                    $info->kpi_q421 = $actual;
                    $info->kpi_q421_result = "Green";
                }
            }
        } elseif ($actual > $info->kpi_range_yf && $actual < $info->kpi_range_yt) {
            $info->kpi_jan21_result = "Yellow";
        } elseif ($actual > $info->kpi_range_rf && $actual < $info->kpi_range_rt) {
            $info->kpi_jan21_result = "Red";
        } else {
            $info->kpi_jan21_result = "Out of Range";
        }

        $info->save();
        return redirect('kpi/info')->with('info', 'Transaction updated successfully!');
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
