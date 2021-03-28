<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\ProductStock;

use Carbon\Carbon;
use App\Purchaserequest;
use Auth;
use App\User;
use Gate;

use App\Tenant;
use App\Brand;


class PurchaserequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['purchaserequest'] = Purchaserequest::All();
        return view('procurement.pr.index')->with($arr);
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
        return view('procurement.pr.create')->with(['tenant' => $tenant, 'brand' => $brand, 'user' => $user]);
    }

    public function addMorePost(Request $request, Tenant $tenant, Brand $brand, User $user)
    {
        $request->validate([
            'addmore.*.name' => 'required',
            'addmore.*.qty' => 'required',
            'addmore.*.price' => 'required',
        ]);

        foreach ($request->addmore as $key => $value) {
            ProductStock::create($value);
        }
        $comp_id = Auth::user()->company;
        $tenant = Tenant::where('id', '=', $comp_id)->first();
        $brand = Brand::where('bm_tm_id', '=', $tenant->id)->orderBy('bm_name', 'asc')->get();

        return back()->with('success', 'Record Created Successfully.')->with(['tenant' => $tenant, 'brand' => $brand, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
