<?php

namespace App\Http\Controllers\Kpi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Info;
use App\Objective;

use Auth;
use App\User;
use Gate;
use DB;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $arr['info'] = Info::where('kpi_created_uid', auth()->user()->id)->get();
        return view('kpi.info.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $lastRecord = Info::latest()->where('kpi_created_uid', Auth::user()->id)->first();

        //dd($lastRecord->kpi_code);


        $arr['objective'] = Objective::where('obj_created_uid', auth()->user()->id)->get();
        return view('kpi.info.create', compact('lastRecord'))->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Info $info)
    {


        //$last = DB::table('infos')->latest()->first();
        $last2 = DB::table('infos')->where('kpi_created_uid', Auth::user()->id)->orderBy('id', 'DESC')->first();

        //dd($last2);

        if (Auth::user()->company == "34") {
            if (Auth::user()->dept == "Operation") {
                $kpi_head = "KPI/OA/OP/";
                $kpinofull = $kpi_head . $request->kpi_code;
                $info->kpi_code = $kpinofull;
            } else if (Auth::user()->dept == "Finance") {
                $kpi_head = "KPI/OA/FI/";
                $kpinofull = $kpi_head . $request->kpi_code;
                $info->kpi_code = $kpinofull;
            } else if (Auth::user()->dept == "Marketing") {
                $kpi_head = "KPI/OA/MA/";
                $kpinofull = $kpi_head . $request->kpi_code;
                $info->kpi_code = $kpinofull;
            } else if (Auth::user()->dept == "Procurment") {
                $kpi_head = "KPI/OA/PR/";
                $kpinofull = $kpi_head . $request->kpi_code;
                $info->kpi_code = $kpinofull;
            } else if (Auth::user()->dept == "FOH") {
                $kpi_head = "KPI/OA/FOH/";
                $kpinofull = $kpi_head . $request->kpi_code;
                $info->kpi_code = $kpinofull;
            } else if (Auth::user()->dept == "BOH") {
                $kpi_head = "KPI/OA/BOH/";
                $kpinofull = $kpi_head . $request->kpi_code;
                $info->kpi_code = $kpinofull;
            } else if (Auth::user()->dept == "Leasing") {
                $kpi_head = "KPI/OA/LE/";
                $kpinofull = $kpi_head . $request->kpi_code;
                $info->kpi_code = $kpinofull;
            } else if (Auth::user()->dept == "HR") {
                $kpi_head = "KPI/OA/HR/";
                $kpinofull = $kpi_head . $request->kpi_code;
                $info->kpi_code = $kpinofull;
            }
        } else if (Auth::user()->company == "92") {
            if (Auth::user()->dept == "Operation") {
                $kpi_head = "KPI/MOM/OP/";
                $kpinofull = $kpi_head . $request->kpi_code;
                $info->kpi_code = $kpinofull;
            } else if (Auth::user()->dept == "Finance") {
                $kpi_head = "KPI/MOM/FI/";
                $kpinofull = $kpi_head . $request->kpi_code;
                $info->kpi_code = $kpinofull;
            } else if (Auth::user()->dept == "Marketing") {
                $kpi_head = "KPI/MOM/MA/";
                $kpinofull = $kpi_head . $request->kpi_code;
                $info->kpi_code = $kpinofull;
            } else if (Auth::user()->dept == "Procurment") {
                $kpi_head = "KPI/MOM/PR/";
                $kpinofull = $kpi_head . $request->kpi_code;
                $info->kpi_code = $kpinofull;
            } else if (Auth::user()->dept == "FOH") {
                $kpi_head = "KPI/MOM/FOH/";
                $kpinofull = $kpi_head . $request->kpi_code;
                $info->kpi_code = $kpinofull;
            } else if (Auth::user()->dept == "BOH") {
                $kpi_head = "KPI/MOM/BOH/";
                $kpinofull = $kpi_head . $request->kpi_code;
                $info->kpi_code = $kpinofull;
            } else if (Auth::user()->dept == "Leasing") {
                $kpi_head = "KPI/MOM/LE/";
                $kpinofull = $kpi_head . $request->kpi_code;
                $info->kpi_code = $kpinofull;
            } else if (Auth::user()->dept == "HR") {
                $kpi_head = "KPI/MOM/HR/";
                $kpinofull = $kpi_head . $request->kpi_code;
                $info->kpi_code = $kpinofull;
            }
        } else if (Auth::user()->company == "99") {
            if (Auth::user()->dept == "Operation") {
                $kpi_head = "KPI/SCD/OP/";
                $kpinofull = $kpi_head . $request->kpi_code;
                $info->kpi_code = $kpinofull;
            } else if (Auth::user()->dept == "Finance") {
                $kpi_head = "KPI/SCD/FI/";
                $kpinofull = $kpi_head . $request->kpi_code;
                $info->kpi_code = $kpinofull;
            } else if (Auth::user()->dept == "Marketing") {
                $kpi_head = "KPI/SCD/MA/";
                $kpinofull = $kpi_head . $request->kpi_code;
                $info->kpi_code = $kpinofull;
            } else if (Auth::user()->dept == "Procurment") {
                $kpi_head = "KPI/SCD/PR/";
                $kpinofull = $kpi_head . $request->kpi_code;
                $info->kpi_code = $kpinofull;
            } else if (Auth::user()->dept == "FOH") {
                $kpi_head = "KPI/SCD/FOH/";
                $kpinofull = $kpi_head . $request->kpi_code;
                $info->kpi_code = $kpinofull;
            } else if (Auth::user()->dept == "BOH") {
                $kpi_head = "KPI/SCD/BOH/";
                $kpinofull = $kpi_head . $request->kpi_code;
                $info->kpi_code = $kpinofull;
            } else if (Auth::user()->dept == "Leasing") {
                $kpi_head = "KPI/SCD/LE/";
                $kpinofull = $kpi_head . $request->kpi_code;
                $info->kpi_code = $kpinofull;
            } else if (Auth::user()->dept == "HR") {
                $kpi_head = "KPI/SCD/HR/";
                $kpinofull = $kpi_head . $request->kpi_code;
                $info->kpi_code = $kpinofull;
            }
        }

        $info->kpi_created_uid = Auth::user()->id;
        $info->kpi_created_name = Auth::user()->name;
        $info->info_dept = Auth::user()->dept;
        $info->info_comp_code = Auth::user()->company;

        $info->info_obj_des = $request->obj_desc;
        $info->info_obj_id = $request->id;

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
        $quarter = $request->quarter;



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
            } elseif ($data == "Quarterly") {
                if ($quarter == "q121") {
                    $info->kpi_q121 = $actual;
                    $info->kpi_q121_result = "Green";
                } elseif ($quarter == "q221") {
                    $info->kpi_q221 = $actual;
                    $info->kpi_q221_result = "Green";
                } elseif ($quarter == "q321") {
                    $info->kpi_q321 = $actual;
                    $info->kpi_q321_result = "Green";
                } elseif ($quarter == "q421") {
                    $info->kpi_q421 = $actual;
                    $info->kpi_q421_result = "Green";
                }
            }
        } elseif ($actual > $info->kpi_range_yf && $actual < $info->kpi_range_yt) {


            if ($data == "Monthly") {

                if ($month == 121) {
                    $info->kpi_jan21 = $actual;
                    $info->kpi_jan21_result = "Yellow";
                } elseif ($month == 221) {
                    $info->kpi_feb21 = $actual;
                    $info->kpi_feb21_result = "Yellow";
                } elseif ($month == 321) {
                    $info->kpi_mar21 = $actual;
                    $info->kpi_mar21_result = "Yellow";
                } elseif ($month == 421) {
                    $info->kpi_apr21 = $actual;
                    $info->kpi_apr21_result = "Yellow";
                } elseif ($month == 521) {
                    $info->kpi_may21 = $actual;
                    $info->kpi_may21_result = "Yellow";
                } elseif ($month == 621) {
                    $info->kpi_jun21 = $actual;
                    $info->kpi_jun21_result = "Yellow";
                } elseif ($month == 721) {
                    $info->kpi_jul21 = $actual;
                    $info->kpi_jul21_result = "Yellow";
                } elseif ($month == 821) {
                    $info->kpi_aug21 = $actual;
                    $info->kpi_aug21_result = "Yellow";
                } elseif ($month == 921) {
                    $info->kpi_sep21 = $actual;
                    $info->kpi_sep21_result = "Yellow";
                } elseif ($month == 1021) {
                    $info->kpi_oct21 = $actual;
                    $info->kpi_oct21_result = "Yellow";
                } elseif ($month == 1121) {
                    $info->kpi_nov21 = $actual;
                    $info->kpi_nov21_result = "Yellow";
                } elseif ($month == 1221) {
                    $info->kpi_dec21 = $actual;
                    $info->kpi_dec21_result = "Yellow";
                }
            } elseif ($data == "Quarterly") {
                if ($quarter == "q121") {
                    $info->kpi_q121 = $actual;
                    $info->kpi_q121_result = "Yellow";
                } elseif ($quarter == "q221") {
                    $info->kpi_q221 = $actual;
                    $info->kpi_q221_result = "Yellow";
                } elseif ($quarter == "q321") {
                    $info->kpi_q321 = $actual;
                    $info->kpi_q321_result = "Yellow";
                } elseif ($quarter == "q421") {
                    $info->kpi_q421 = $actual;
                    $info->kpi_q421_result = "Yellow";
                }
            }
        } elseif ($actual > $info->kpi_range_rf && $actual < $info->kpi_range_rt) {


            if ($data == "Monthly") {

                if ($month == 121) {
                    $info->kpi_jan21 = $actual;
                    $info->kpi_jan21_result = "Red";
                } elseif ($month == 221) {
                    $info->kpi_feb21 = $actual;
                    $info->kpi_feb21_result = "Red";
                } elseif ($month == 321) {
                    $info->kpi_mar21 = $actual;
                    $info->kpi_mar21_result = "Red";
                } elseif ($month == 421) {
                    $info->kpi_apr21 = $actual;
                    $info->kpi_apr21_result = "Red";
                } elseif ($month == 521) {
                    $info->kpi_may21 = $actual;
                    $info->kpi_may21_result = "Red";
                } elseif ($month == 621) {
                    $info->kpi_jun21 = $actual;
                    $info->kpi_jun21_result = "Red";
                } elseif ($month == 721) {
                    $info->kpi_jul21 = $actual;
                    $info->kpi_jul21_result = "Red";
                } elseif ($month == 821) {
                    $info->kpi_aug21 = $actual;
                    $info->kpi_aug21_result = "Red";
                } elseif ($month == 921) {
                    $info->kpi_sep21 = $actual;
                    $info->kpi_sep21_result = "Red";
                } elseif ($month == 1021) {
                    $info->kpi_oct21 = $actual;
                    $info->kpi_oct21_result = "Red";
                } elseif ($month == 1121) {
                    $info->kpi_nov21 = $actual;
                    $info->kpi_nov21_result = "Red";
                } elseif ($month == 1221) {
                    $info->kpi_dec21 = $actual;
                    $info->kpi_dec21_result = "Red";
                }
            } elseif ($data == "Quarterly") {
                if ($quarter == "q121") {
                    $info->kpi_q121 = $actual;
                    $info->kpi_q121_result = "Red";
                } elseif ($quarter == "q221") {
                    $info->kpi_q221 = $actual;
                    $info->kpi_q221_result = "Red";
                } elseif ($quarter == "q321") {
                    $info->kpi_q321 = $actual;
                    $info->kpi_q321_result = "Red";
                } elseif ($quarter == "q421") {
                    $info->kpi_q421 = $actual;
                    $info->kpi_q421_result = "Red";
                }
            }
        } elseif ($actual > $info->kpi_range_gt) {
            if ($request->kpi_level == "Increase") {
                $info->kpi_jan21_result = "Green - Excelent";
            } else {
                $info->kpi_jan21_result = "Red - Poor";
            }
        } elseif ($actual < $info->kpi_range_rf) {
            if ($request->kpi_level == "Decerease") {
                $info->kpi_jan21_result = "Green - Excelent";
            } else {
                $info->kpi_jan21_result = "Red - Poor";
            }
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
