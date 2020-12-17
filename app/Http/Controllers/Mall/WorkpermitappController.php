<?php

namespace App\Http\Controllers\Mall;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Workpermit;
use App\Tenant;
use App\Brand;
use App\User;
use Auth;
use Gate;

class WorkpermitappController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['workpermit'] = Workpermit::All();
        return view('mall.workpermitapp.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit($workpermitapp)
    {
        $workpermit = Workpermit::where('id', $workpermitapp)->firstOrFail();

        return view('mall.workpermitapp.edit')
            ->with(['workpermit' => $workpermit, 'workpermitapp' => $workpermitapp]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $workpermitapp)
    {
        $workpermit = Workpermit::where('id', $workpermitapp)->firstOrFail();


        $workpermit->wp_status = $request->wp_status;
        $workpermit->wp_approved_uid = Auth::user()->id;
        $workpermit->wp_approved_name = Auth::user()->name;

        $apprdate  = Carbon::now();
        $workpermit->wp_approved_date = $apprdate;

        $workpermit->wp_approved_remark = $request->wp_approved_remark;



        $workpermit->save();
        return redirect('mall/workpermit')->with('info', 'Transaction updated successfully!');
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