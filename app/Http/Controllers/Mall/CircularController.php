<?php

namespace App\Http\Controllers\Mall;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Carbon\Carbon;
use App\Circular;
use Auth;
use App\User;
use Gate;
use DateTime;

use App\Jobs\SendEmailJob;

use App\Mail\Circularmail;
use App\Mail\SendEmailTest;
use App\Mail\SendEmailDemo;


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

    public function circtent()
    {
        $arr['circular'] = Circular::All();
        return view('mall.circular.circtent')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('isMall');

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
        $circular->ci_comments = $request->ci_comments;
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

        $users = User::select('email')->get();

        // dd($users);
        // $details = User::select('email')->get();

        foreach ($users as $user) {

            // dispatch(new SendEmailJob($user, $circular));

            Mail::send(new circularmail($user, $circular));

            //  dispatch(new SendEmailJob($details));
        }




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
    public function edit(Circular $circular)
    {
        $arr['circular'] = $circular;
        return view('mall.circular.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Circular $circular)
    {
        $circular->ci_subject = $request->ci_subject;
        $circular->ci_circular_no = $request->ci_circular_no;
        $circular->ci_comments = $request->ci_comments;
        $circular->save();
        return redirect('mall/circular')->with('info', 'Transaction updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->authorize('isMall');

        $circular = Circular::findOrFail($request->category_id);
        $circular->delete();

        return redirect()->route('mall.circular.index')->with('error', 'Transaction deleted successfully!');
    }
}
