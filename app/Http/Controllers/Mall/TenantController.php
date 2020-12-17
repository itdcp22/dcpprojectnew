<?php

namespace App\Http\Controllers\Mall;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Tenant;
use Auth;
use App\User;
use Gate;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['tenant'] = Tenant::All();
        return view('mall.tenant.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mall.tenant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Tenant $tenant)
    {
        $tenant->tm_name = $request->tm_name;
        $tenant->tm_contact = $request->tm_contact;
        $tenant->tm_tel = $request->tm_tel;
        $tenant->tm_mobile = $request->tm_mobile;
        $tenant->tm_address = $request->tm_address;
        $tenant->tm_email = $request->tm_email;
        $tenant->tm_comments = $request->tm_comments;
        $tenant->tm_created_uid = Auth::user()->name;
        $tenant->tm_status = '1';

        $tenant->save();
        return redirect('mall/tenant')->with('success', 'Transaction created successfully!');
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
