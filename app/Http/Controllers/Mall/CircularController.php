<?php

namespace App\Http\Controllers\Mall;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Circular;
use Auth;
use App\User;
use Gate;
use DateTime;

class CircularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['circular'] = Circular::All();
        return view('mall.circular.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mall.circular.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Circular $circular)
    {
        $circular->ci_subject = $request->ci_subject;
        $circular->ci_circular_no = $request->ci_circular_no;
        $circular->ci_user_name = Auth::user()->name;


        $filename = '';

        if ($request->hasFile('th_attach')) {
            $file = $request->file('th_attach');
            $ext = $file->getClientOriginalExtension();
            $filename = date('YmdHis') . rand(1, 99999) . '.' . $ext;
            $file->storeAs('public/categories', $filename);
        }

        $circular->ci_document = $filename;


        $circular->save();
        return redirect('mall/circular')->with('success', 'Transaction created successfully!');
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
