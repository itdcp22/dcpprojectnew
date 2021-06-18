<?php

namespace App\Http\Controllers\Mall;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Brand;
use App\Utility;
use Auth;
use App\User;
use Gate;

class UtilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['utility'] = Utility::where('ui_type', 'Electricity')->get();
        return view('mall.utility.index')->with($arr);
    }

    public function cwater()
    {
        $arr['utility'] = Utility::where('ui_type', 'Chilled_Water')->get();

        return view('mall.utility.cwater')->with($arr);
    }

    public function water()
    {
        $arr['utility'] = Utility::where('ui_type', 'Water')->get();

        return view('mall.utility.water')->with($arr);
    }

    public function sewage()
    {
        $arr['utility'] = Utility::where('ui_type', 'Sewage')->get();

        return view('mall.utility.sewage')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['brand'] = Brand::where('bm_eb', 'Electricity')->get();
        return view('mall.utility.create')->with($arr);
    }

    public function cwater_create()
    {
        $arr['brand'] = Brand::where('bm_cwater', 'Cwater')->get();
        return view('mall.utility.cwater_create')->with($arr);
    }

    public function water_create()
    {
        $arr['brand'] = Brand::where('bm_water', 'Water')->get();
        return view('mall.utility.water_create')->with($arr);
    }

    public function sewage_create()
    {
        $arr['brand'] = Brand::where('bm_sewage', 'Sewage')->get();
        return view('mall.utility.sewage_create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Utility $utility)
    {




        // dd($request->ui_comp_name);
        foreach ($request->ui_comp_name as $key => $name) {

            if ($request->ui_comp_name[$key]) {
                $utility = resolve(Utility::class);

                //  dd($utility);
                $utility->ui_comp_name = trim($name, '"');
                $utility->ui_brand_name = $request->ui_brand_name[$key];
                $utility->ui_rate = $request->ui_rate[$key];
                $utility->ui_rate = $request->ui_rate[$key];
                $utility->ui_omr = $request->ui_omr[$key];
                $utility->ui_cmr = $request->ui_cmr[$key];
                $utility->ui_consumed = $request->ui_consumed[$key];
                $utility->ui_amount = $request->ui_amount[$key];
                $utility->ui_vat = $request->ui_vat[$key];
                $utility->ui_netamount = $request->ui_netamount[$key];



                $id = Utility::orderByDesc('ui_tran_no')->first()->ui_tran_no ?? date('Y') . 00000;
                $year = date('Y');
                $id_year = substr($id, 0, 4);
                $seq = $year <> $id_year ? 0 : +substr($id, -5);
                $new_id = sprintf("%0+4u%0+6u", $year, $seq + 1);
                $utility->ui_tran_no = $new_id;

                $utility->ui_month = $request->ui_month;
                $utility->ui_type = $request->ui_type;


                $utility->save();
            }
        }

        $utility->ui_month = $request->ui_month;

        $utility->ui_created_uid = Auth::user()->id;
        $utility->ui_created_name = Auth::user()->name;


        $utility->save();

        if ($utility->ui_type  == 'Electricity') {

            return redirect('mall/utility')->with('success', 'Transaction created successfully!');
        } elseif ($utility->ui_type  == 'Chilled_Water') {
            return redirect('mall/cwater')->with('success', 'Transaction created successfully!');
        } elseif ($utility->ui_type  == 'Water') {
            return redirect('mall/water')->with('success', 'Transaction created successfully!');
        } elseif ($utility->ui_type  == 'Sewage') {
            return redirect('mall/sewage')->with('success', 'Transaction created successfully!');
        }


        //  return redirect('mall/utility')->with('success', 'Transaction created successfully!');
        // return redirect()->back()->with('success', 'Transaction created successfully!');;
    }


    public function insertSchedule(Request $request, Utility $utility)
    {
        Utility::create([
            'ui_brand_name' => $request->input('ui_brand_name'),
            'ui_comp_name' => $request->input('ui_comp_name'),



        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Utility $utility)
    {
        return view('mall.utility.show', compact('utility'));
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
