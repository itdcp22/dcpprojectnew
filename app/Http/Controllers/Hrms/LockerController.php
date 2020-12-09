<?php

namespace App\Http\Controllers\Hrms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Locker;

use Auth;
use App\User;

use Gate;

//we need to add the below if we create new excel export
use App\Exports\LockerExport;
use Maatwebsite\Excel\Facades\Excel;

class LockerController extends Controller
{

    public function lockerexport()
    {
        return Excel::download(new LockerExport, 'Locker.xls');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['locker'] = Locker::All();
        return view('hrms.locker.index')->with($arr);
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
    public function edit(Locker $locker)

    {

        $this->authorize('isAccess');
        $arr['locker'] = $locker;
        return view('hrms.locker.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Locker $locker)
    {
        $locker->name = $request->name;
        $locker->title = $request->title;
        $locker->department = $request->department;
        $locker->lockerno = $request->lockerno;
        $locker->remarks = $request->remarks;

        $date  = Carbon::createFromFormat('d-m-Y', $request->issued_date);
        $locker->issued_date = $date;


        $locker->updated_userid  = Auth::user()->name;


        $locker->save();
        return redirect()->route('hrms.locker.index')->with('info', 'Transaction updated successfully!');
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
