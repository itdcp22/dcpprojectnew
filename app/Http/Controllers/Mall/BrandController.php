<?php

namespace App\Http\Controllers\Mall;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Brand;
use App\Tenant;
use Auth;
use App\User;
use Gate;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['brand'] = Brand::All();
        return view('mall.brand.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $arr['tenant'] = Tenant::where('tm_status', 1)->orderBy('tm_name', 'asc')->get();
        return view('mall.brand.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Brand $brand)
    {
        $brand->bm_name = $request->bm_name;
        $brand->bm_location = $request->bm_location;
        $brand->bm_contact = $request->bm_contact;
        $brand->bm_designation = $request->bm_designation;
        $brand->bm_tel = $request->bm_tel;
        $brand->bm_mobile = $request->bm_mobile;
        $brand->bm_email = $request->bm_email;
        $brand->bm_tm_name = $request->bm_tm_name;
        $brand->bm_tm_id = $request->bm_tm_id;
        $brand->bm_status = 1;

        $brand->bm_fina_email = $request->bm_fina_email;
        $brand->bm_oper_email = $request->bm_oper_email;


        $brand->bm_unit_no = $request->bm_unit_no;
        $brand->bm_size = $request->bm_size;

        $brand->bm_type = $request->bm_type;
        $brand->bm_vat = $request->bm_vat;



        $opendate  = Carbon::createFromFormat('d-m-Y', $request->bm_open_date);
        $brand->bm_open_date = $opendate;

        $brand->bm_eb = $request->bm_eb;
        $brand->bm_water = $request->bm_water;
        $brand->bm_cwater = $request->bm_cwater;
        $brand->bm_sewage = $request->bm_sewage;


        $brand->bm_eb_meter1_no = $request->bm_eb_meter1_no;
        $brand->bm_water_meter_no = $request->bm_water_meter_no;
        $brand->bm_cwater_meter_no = $request->bm_cwater_meter_no;
        $brand->bm_sewage_meter_no = $request->bm_sewage_meter_no;

        $brand->bm_eb_rate = $request->bm_eb_rate;
        $brand->bm_water_rate = $request->bm_water_rate;
        $brand->bm_cwater_rate = $request->bm_cwater_rate;
        $brand->bm_sewage_rate = $request->bm_sewage_rate;

        $brand->bm_eb_ob = $request->bm_eb_ob;
        $brand->bm_water_ob = $request->bm_water_ob;
        $brand->bm_cwater_ob = $request->bm_cwater_ob;
        $brand->bm_sewage_ob = $request->bm_sewage_ob;

        $brand->bm_eb_bill_type = $request->bm_eb_bill_type;
        $brand->bm_water_bill_type = $request->bm_water_bill_type;
        $brand->bm_cwater_bill_type = $request->bm_cwater_bill_type;
        $brand->bm_sewage_bill_type = $request->bm_sewage_bill_type;









        $brand->bm_created_uid = Auth::user()->name;


        $brand->save();
        return redirect('mall/brand')->with('success', 'Transaction created successfully!');
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
    public function edit(Brand $brand)
    {


        $arr['tenant'] = Tenant::where('tm_status', 1)->orderBy('tm_name', 'asc')->get();

        $arr['brand'] = $brand;
        return view('mall.brand.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $brand->bm_name = $request->bm_name;
        //  $brand->bm_tm_name = $request->bm_tm_name;
        $brand->bm_location = $request->bm_location;
        $brand->bm_contact = $request->bm_contact;
        $brand->bm_designation = $request->bm_designation;
        $brand->bm_tel = $request->bm_tel;
        $brand->bm_mobile = $request->bm_mobile;
        $brand->bm_email = $request->bm_email;
        $brand->bm_flex1 = $request->bm_comments;

        $brand->bm_fina_email = $request->bm_fina_email;
        $brand->bm_oper_email = $request->bm_oper_email;


        $brand->bm_unit_no = $request->bm_unit_no;
        $brand->bm_size = $request->bm_size;
        $brand->bm_vat = $request->bm_vat;


        $opendate  = Carbon::createFromFormat('d-m-Y', $request->bm_open_date);
        $brand->bm_open_date = $opendate;

        $brand->bm_eb = $request->bm_eb;
        $brand->bm_water = $request->bm_water;
        $brand->bm_cwater = $request->bm_cwater;
        $brand->bm_sewage = $request->bm_sewage;


        $brand->bm_eb_meter1_no = $request->bm_eb_meter1_no;
        $brand->bm_water_meter_no = $request->bm_water_meter_no;
        $brand->bm_cwater_meter_no = $request->bm_cwater_meter_no;
        $brand->bm_sewage_meter_no = $request->bm_sewage_meter_no;

        $brand->bm_eb_rate = $request->bm_eb_rate;
        $brand->bm_water_rate = $request->bm_water_rate;
        $brand->bm_cwater_rate = $request->bm_cwater_rate;
        $brand->bm_sewage_rate = $request->bm_sewage_rate;

        $brand->bm_eb_ob = $request->bm_eb_ob;
        $brand->bm_water_ob = $request->bm_water_ob;
        $brand->bm_cwater_ob = $request->bm_cwater_ob;
        $brand->bm_sewage_ob = $request->bm_sewage_ob;




        $brand->bm_status = 1;

        $brand->save();
        return redirect()->route('mall.brand.index')->with('info', 'Transaction updated successfully!');
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
