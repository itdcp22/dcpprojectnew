<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Purchaserequest;
use Auth;
use App\User;
use Gate;

use App\Tenant;
use App\Brand;
use App\Purchaserequestitem;

class PurreqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['purchaserequest'] = Purchaserequest::All();
        return view('purchase.purchaserequest.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create(Tenant $tenant, Brand $brand, User $user, Request $request)
    {


        $comp_id = Auth::user()->company;
        $tenant = Tenant::where('id', '=', $comp_id)->first();
        $brand = Brand::where('bm_tm_id', '=', $tenant->id)->orderBy('bm_name', 'asc')->get();

        //return back()->with('success', 'Record Created Successfully.')->with(['tenant' => $tenant, 'brand' => $brand, 'user' => $user]);

        return view('purchase.purchaserequest.create')->with(['tenant' => $tenant, 'brand' => $brand, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Purchaserequest $purchaserequest, Purchaserequestitem $purchaserequestitem)
    {

        $id = Purchaserequest::where('pr_req_comp_code', auth()->user()->company)
            ->first()->pr_req_no ?? date('Y') . 00000;
        $year = date('Y');
        $id_year = substr($id, 0, 4);
        $seq = $year <> $id_year ? 0 : +substr($id, -5);
        $new_id = sprintf("%0+4u%0+6u", $year, $seq + 1);
        //  $purchaserequest->pr_req_no = $new_id;


        $lastAccountForCurrentYear = Purchaserequest::where('pr_req_comp_code', auth()->user()->company)
            ->where('pr_req_no', 'like', date('Y') . '%') // filter for current year numbers
            ->orderByDesc('pr_req_no', 'desc') // the biggist one first
            ->first();

        $purchaserequest->pr_req_no = $lastAccountForCurrentYear
            ? ($lastAccountForCurrentYear->pr_req_no + 1) // just increase value to 1
            : (date('Y') . $digitRepresentingASerie . '00001');

        $new_id = $purchaserequest->pr_req_no;
        $purchaserequest->pr_req_no = $new_id;


        $purchaserequest->pr_req_uid = Auth::user()->id;
        $purchaserequest->pr_req_name = Auth::user()->name;
        $purchaserequest->pr_req_desi = Auth::user()->dept;
        $purchaserequest->pr_req_dept = Auth::user()->flex2;
        $purchaserequest->pr_req_mobile = Auth::user()->mobile;
        $purchaserequest->pr_req_email = Auth::user()->email;
        $purchaserequest->pr_req_brand_name = Auth::user()->brand_name;

        $date  = Carbon::createFromFormat('d-m-Y', $request->pr_req_del_date);
        $purchaserequest->pr_req_del_date = $date;

        $purchaserequest->pr_req_status = 1;
        $purchaserequest->pr_req_remarks = $request->pr_req_remarks;



        $purchaserequest->pr_req_comp_code = Auth::user()->company;

        if ((Auth::user()->company)  == 92) {

            $purchaserequest->pr_req_comp_name = 'TAMANI GLOBAL DEVELOPMENT & INVESTMENT L.L.C';
        } else if ((Auth::user()->company)  == 34) {

            $purchaserequest->pr_req_comp_name = 'TAMANI TRADING AND ENTERTAINMENT L.L.C';
        } else {

            $purchaserequest->pr_req_comp_name = 'Al Jarwani';
        }





        foreach ($request->pri_qty as $key => $value) {

            if ($request->pri_qty[$key]) {
                $item = resolve(Purchaserequestitem::class);
                $purchaserequestitem->pri_item = $value['pri_item'];
                $purchaserequestitem->pri_qty = $value['pri_qty'];
                $purchaserequestitem->pri_price = $value['pri_price'];
                $purchaserequestitem->pri_amount = $value['pri_qty'] * $value['pri_price'];
                $purchaserequestitem->pri_flex1 = $new_id;
                $purchaserequestitem->save();
                // $account->item()->save($item);
            }
        }





        $purchaserequest->save();



        return redirect('purchase/purchaserequest')->with('success', 'Record Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Purchaserequest $purchaserequest, Purchaserequestitem $purchaserequestitem)
    {



        $purchaserequestitems = Purchaserequestitem::where('pri_flex1', $purchaserequest->pr_req_no)->orderBy('id', 'asc')->Get();
        return view('purchase.purchaserequest.show')->with(['purchaserequest' => $purchaserequest, 'purchaserequestitems' => $purchaserequestitems]);
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
