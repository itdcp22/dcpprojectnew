<?php

namespace App\Http\Controllers\Mall;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Carbon\Carbon;
use App\Workpermit;
use App\Tenant;
use App\Brand;
use Auth;
use App\User;
use Gate;

use App\Mail\NewBill;


class WorkpermitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if ((Auth::user()->user_type) == 'tenant') {


            $arr['workpermit'] = Workpermit::where('wp_created_uid', auth()->user()->id)
                ->where('wp_status', 'Pending')
                ->Orwhere('wp_status', 'Not_Approved')
                ->orderBy('id', 'desc')->get();
            return view('mall.workpermit.index')->with($arr);
        } else {
            $arr['workpermit'] = Workpermit::where('wp_status', 'Pending')
                ->Orwhere('wp_status', 'Not_Approved')
                ->orderBy('id', 'desc')->get();
            return view('mall.workpermitapp.index')->with($arr);
        }
    }

    public function approved()
    {

        if ((Auth::user()->user_type) == 'tenant') {


            $arr['workpermit'] = Workpermit::where('wp_created_uid', auth()->user()->id)
                ->where('wp_status', 'Approved')
                ->orderBy('id', 'desc')->get();
            return view('mall.workpermit.approved')->with($arr);
        } else {
            $arr['workpermit'] = Workpermit::where('wp_status', 'Approved')
                ->orderBy('id', 'desc')->get();
            return view('mall.workpermitapp.index')->with($arr);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Tenant $tenant, Brand $brand, User $user)
    {

        $comp_id = Auth::user()->company;
        $tenant = Tenant::where('id', '=', $comp_id)->first();
        $brand = Brand::where('bm_tm_id', '=', $tenant->id)->orderBy('bm_name', 'asc')->get();

        return view('mall.workpermit.create')->with(['tenant' => $tenant, 'brand' => $brand, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Workpermit $workpermit)
    {

        $request->validate([

            'wp_applicant' => ['required'],
            'wp_category' => ['required'],

        ]);

        $filename = '';

        if ($request->hasFile('th_attach')) {
            $file = $request->file('th_attach');
            $ext = $file->getClientOriginalExtension();
            $filename = date('YmdHis') . rand(1, 99999) . '.' . $ext;
            $file->storeAs('public/categories', $filename);
        }


        $workpermit->wp_flex1 = $filename;

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
        $workpermit->wp_comp_code = Auth::user()->company;
        $workpermit->wp_brand_name = $request->wp_brand_name;
        $workpermit->wp_manager = $request->wp_manager;
        $workpermit->wp_manager_contact = $request->wp_manager_contact;



        $categirystring = implode(",", $request->get('wp_category'));

        $workpermit->wp_category = $categirystring;

        $workpermit->wp_description = $request->wp_description;



        $workpermit->wp_cont_comp = $request->wp_cont_comp;
        $workpermit->wp_cont_person = $request->wp_cont_person;
        $workpermit->wp_cont_mobile = $request->wp_cont_mobile;
        $workpermit->wp_no_workers = $request->wp_no_workers;
        $workpermit->wp_status = "Pending";
        $workpermit->wp_created_uid = Auth::user()->id;
        $workpermit->wp_created_name = Auth::user()->name;


        $fromdate  = Carbon::createFromFormat('d-m-Y', $request->wp_from_date);
        $workpermit->wp_from_date = $fromdate;

        $todate  = Carbon::createFromFormat('d-m-Y', $request->wp_to_date);
        $workpermit->wp_to_date = $todate;

        $workpermit->wp_from_time = $request->wp_from_time;
        $workpermit->wp_to_time = $request->wp_to_time;

        $workpermit->save();

        //return $workpermit;
        Mail::send(new NewBill($workpermit));

        return redirect('mall/workpermit')->with('success', 'Transaction created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Workpermit $workpermit)
    {
        return view('mall.workpermit.show', compact('workpermit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Workpermit $workpermit)
    {

        $arr['workpermit'] = $workpermit;
        return view('mall.workpermit.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workpermit $workpermit)
    {
        $workpermit->wp_applicant = $request->wp_applicant;
        $workpermit->wp_designation = $request->wp_designation;
        $workpermit->wp_mobile = $request->wp_mobile;
        $workpermit->wp_email = $request->wp_email;




        //$categirystring = implode(",", $request->get('wp_category'));
        //$workpermit->wp_category = $categirystring;

        $workpermit->wp_description = $request->wp_description;


        $workpermit->wp_cont_comp = $request->wp_cont_comp;
        $workpermit->wp_cont_person = $request->wp_cont_person;
        $workpermit->wp_cont_mobile = $request->wp_cont_mobile;
        $workpermit->wp_no_workers = $request->wp_no_workers;




        $fromdate  = Carbon::createFromFormat('d-m-Y', $request->wp_from_date);
        $workpermit->wp_from_date = $fromdate;

        $todate  = Carbon::createFromFormat('d-m-Y', $request->wp_to_date);
        $workpermit->wp_to_date = $todate;

        $workpermit->wp_from_time = $request->wp_from_time;
        $workpermit->wp_to_time = $request->wp_to_time;



        $workpermit->save();
        return redirect('mall/workpermit')->with('info', 'Transaction updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //dd($request->category_id);
        $workpermit = Workpermit::findOrFail($request->category_id);
        $workpermit->delete();

        return redirect()->route('mall.workpermit.index')->with('success', 'Transaction deleted successfully!');
    }
}
