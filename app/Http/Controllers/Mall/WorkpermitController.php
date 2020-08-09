<?php

namespace App\Http\Controllers\Mall;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Workpermit;
use App\Tenant;
use App\Brand;
use Auth;
use App\User;
use Gate;


class WorkpermitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['workpermit'] = Workpermit::All();
        return view('mall.workpermit.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Tenant $tenant, Brand $brand)
    {

        $comp_id = Auth::user()->company;
        $tenant = Tenant::where('id', '=', $comp_id)->first();
        $brand = Brand::where('bm_tm_id', '=', $tenant->id)->get();

        return view('mall.workpermit.create')->with(['tenant' => $tenant, 'brand' => $brand]);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Workpermit $workpermit)
    {

        $id = Workpermit::orderByDesc('wp_request_id')->first()->wp_request_id ?? date('Y') . 00000;
        $year = date('Y');
        $id_year = substr($id, 0, 4);
        $seq = $year <> $id_year ? 0 : +substr($id, -5);
        $new_id = sprintf("%0+4u%0+6u", $year, $seq + 1);

        $workpermit->wp_request_id = $new_id;

        $workpermit->wp_applicant = $request->wp_applicant;
        $workpermit->wp_designation = $request->wp_designation;
        $workpermit->wp_mobile = $request->wp_mobile;
        $workpermit->wp_email = $request->wp_email;

        $workpermit->wp_comp_name = $request->wp_comp_name;
        $workpermit->wp_brand_name = $request->wp_brand_name;
        $workpermit->wp_manager = $request->wp_manager;
        $workpermit->wp_manager_contact = $request->wp_manager_contact;



        $categirystring = implode(",", $request->get('wp_category'));

        $workpermit->wp_category = $categirystring;



        $workpermit->wp_cont_comp = $request->wp_cont_comp;
        $workpermit->wp_cont_person = $request->wp_cont_person;
        $workpermit->wp_cont_mobile = $request->wp_cont_mobile;
        $workpermit->wp_no_workers = $request->wp_no_workers;
        $workpermit->wp_status = 0;
        $workpermit->wp_created_uid = Auth::user()->name;


        $fromdate  = Carbon::createFromFormat('d-m-Y', $request->wp_from_date);
        $workpermit->wp_from_date = $fromdate;

        $todate  = Carbon::createFromFormat('d-m-Y', $request->wp_to_date);
        $workpermit->wp_to_date = $todate;

        $workpermit->wp_from_time = $request->wp_from_time;
        $workpermit->wp_to_time = $request->wp_to_time;



        $workpermit->save();
        return redirect('mall/workpermit')->with('success', 'Transaction created successfully!');
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
