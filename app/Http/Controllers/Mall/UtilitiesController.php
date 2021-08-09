<?php

namespace App\Http\Controllers\Mall;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Mail;


use Carbon\Carbon;
use App\Brand;
use App\Utility;
use Auth;
use App\User;
use Gate;

//we need to add the below if we create new excel export

use App\Exports\ElectricityExport;
use App\Exports\ElectricityIndexExport;
use Maatwebsite\Excel\Facades\Excel;


use App\Jobs\SendEmailUtilityJob;


class UtilitiesController extends Controller
{

    public function ebcreateexport()
    {
        return Excel::download(new ElectricityExport, 'Electricity.xls');
    }

    public function ebindexexport()
    {
        return Excel::download(new ElectricityIndexExport, 'Electricity.xls');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['utility'] = Utility::where('ui_type', 'Electricity')->get();
        return view('mall.utility.index')->with($arr);
    }

    public function cwater()
    {
        $arr['utility'] = Utility::where('ui_type', 'Chilled_Water')->get();

        return view('mall.utility.cwater')->with($arr);
    }

    public function water()
    {
        $arr['utility'] = Utility::where('ui_type', 'Water')->get();

        return view('mall.utility.water')->with($arr);
    }

    public function rent()
    {
        $arr['utility'] = Utility::where('ui_type', 'Rent')->get();

        return view('mall.utility.rent')->with($arr);
    }

    public function consolidate()
    {
        $arr['utility'] = Utility::All();

        return view('mall.utility.consolidate')->with($arr);
    }

    public function ui_unpaid()
    {
        $arr['utility'] = Utility::where('ui_payment_status', '0')->get();

        return view('mall.utility.unpaid')->with($arr);
    }

    public function ui_unpaid_cust()
    {
        $arr['utility'] = Utility::where('ui_comp_id', auth()->user()->company)->where('ui_payment_status', '0')->whereNotIn('ui_type', ['Rent'])->get();

        return view('mall.utility.utilitycust')->with($arr);
    }

    public function ui_paid()
    {
        $arr['utility'] = Utility::where('ui_payment_status', '1')->get();

        return view('mall.utility.paid')->with($arr);
    }

    public function ui_paid_cust()
    {
        $arr['utility'] = Utility::where('ui_comp_id', auth()->user()->company)->where('ui_payment_status', '1')->whereNotIn('ui_type', ['Rent'])->get();

        return view('mall.utility.utilitycust')->with($arr);
    }


    public function utilitycust()
    {

        $arr['utility'] = Utility::where('ui_comp_id', auth()->user()->company)->where('ui_online', 1)->whereNotIn('ui_type', ['Rent'])->get();

        return view('mall.utility.utilitycust')->with($arr);
    }

    public function summary()
    {

        $arr['utility'] = Utility::where('ui_payment_status', 0)
            ->groupBy('ui_brand_id', 'ui_brand_name')
            ->selectRaw('ui_brand_id,ui_brand_name, sum(ui_netamount) as total')->get();

        $arr['utility1'] = Utility::where('ui_payment_status', 0)
            ->selectRaw('sum(ui_netamount) as gtotal')->get();

        return view('mall.utility.summary')->with($arr);
    }

    public function summary_ui_comp()
    {

        $arr['utility'] = Utility::where('ui_payment_status', 0)
            ->groupBy('ui_comp_id', 'ui_comp_name')
            ->selectRaw('ui_comp_id,ui_comp_name, sum(ui_netamount) as total')->orderBy('total', 'desc')->get();

        $arr['utility1'] = Utility::where('ui_payment_status', 0)
            ->selectRaw('sum(ui_netamount) as gtotal')->get();

        return view('mall.utility.summary_ui_comp')->with($arr);
    }

    public function summary_ui_type()
    {

        $arr['utility'] = Utility::where('ui_payment_status', 0)
            ->groupBy('ui_type')
            ->selectRaw('ui_type, sum(ui_netamount) as total')->get();

        $arr['utility1'] = Utility::where('ui_payment_status', 0)
            ->selectRaw('sum(ui_netamount) as gtotal')->get();

        return view('mall.utility.summary_ui_type')->with($arr);
    }

    public function bills_unconfirmed()
    {

        $arr['utility'] = Utility::where('ui_lock', '0')->get();

        return view('mall.utility.bills_unconf')->with($arr);
    }

    public function bills_confirmed()
    {

        $arr['utility'] = Utility::where('ui_lock', '0')->get();

        return view('mall.utility.bills_unconf')->with($arr);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['utility'] = Utility::where('ui_type', 'Electricity')->max('ui_to_date');
        $arr['brand'] = Brand::where('bm_eb', 'Electricity')->whereNotIn('bm_type', ['Kiosk'])->orderBy('bm_name', 'asc')->get();

        return view('mall.utility.create')->with($arr);
    }

    public function cwater_create()
    {

        $arr['utility'] = Utility::where('ui_type', 'Chilled_Water')->max('ui_to_date');
        $arr['brand'] = Brand::where('bm_cwater', 'Cwater')->whereNotIn('bm_type', ['Kiosk'])->orderBy('bm_name', 'asc')->get();
        return view('mall.utility.cwater_create')->with($arr);
    }

    public function water_create()
    {
        $arr['utility'] = Utility::where('ui_type', 'Water')->max('ui_to_date');
        $arr['brand'] = Brand::where('bm_water', 'Water')->whereNotIn('bm_type', ['Kiosk'])->orderBy('bm_name', 'asc')->get();
        return view('mall.utility.water_create')->with($arr);
    }

    public function sewage_create()
    {
        $arr['brand'] = Brand::where('bm_sewage', 'Sewage')->get();
        return view('mall.utility.sewage_create')->with($arr);
    }

    public function rent_create()
    {
        $arr['utility'] = Utility::where('ui_type', 'Rent')->max('ui_to_date');
        $arr['brand'] = Brand::where('bm_rent', 'Rent')->get();
        return view('mall.utility.rent_create')->with($arr);
    }

    public function utility_email_home()
    {

        return view('mall.utility.emailtrigger');
    }

    public function utility_email_trigger(Utility $utility)
    {

        Utility::where('ui_online', 0)->update(array('ui_online' => 1));

        $emails = User::select('email')->get();

        //dd($emails);

        foreach ($emails as $email) {
            $details['email'] = $email;
            dispatch(new SendEmailUtilityJob($details));
        }


        return redirect('mall/utility_email_home')->with('success', 'Email sent successfully!');
    }






    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Utility $utility, Brand $brand)
    {

        $request->validate([
            'ui_from_date' => 'required',
            'ui_to_date' => 'required',
        ]);



        // dd($request->ui_comp_name);
        foreach ($request->ui_comp_name as $key => $name) {

            if ($request->ui_comp_name[$key]) {
                $utility = resolve(Utility::class);

                //  dd($utility);
                $utility->ui_comp_name = trim($name, '"');
                $utility->ui_comp_id = $request->ui_comp_id[$key];
                $utility->ui_brand_id = $request->ui_brand_id[$key];
                $utility->ui_brand_name = $request->ui_brand_name[$key];
                $utility->ui_rate = $request->ui_rate[$key];
                $utility->ui_vat_no = $request->ui_vat_no[$key];
                $utility->ui_unit_no = $request->ui_unit_no[$key];
                $utility->ui_flex1 = $request->ui_flex1[$key]; //Area
                $utility->ui_omr = $request->ui_omr[$key];
                $utility->ui_cmr = $request->ui_cmr[$key];
                $utility->ui_consumed = $request->ui_consumed[$key];
                $utility->ui_amount = $request->ui_amount[$key];

                if (!empty($request->ui_rent_per_day)) {

                    $utility->ui_rent_per_day = $request->ui_rent_per_day[$key];
                }



                $utility->ui_month = $request->ui_month;
                $utility->ui_type = $request->ui_type;
                $utility->ui_remarks = $request->ui_remarks;
                $utility->ui_online = 0;
                $utility->ui_payment_status = 0;

                if ($utility->ui_type  == 'Water') {
                    $utility->ui_sewage = $request->ui_sewage[$key];
                    //  dd($utility);
                }

                $utility->ui_vat = $request->ui_vat[$key];
                $utility->ui_netamount = $request->ui_netamount[$key];

                $id = Utility::orderByDesc('ui_inv_no')->first()->ui_inv_no ?? date('Y') . 00000;
                $year = date('Y');
                $id_year = substr($id, 0, 4);
                $seq = $year <> $id_year ? 0 : +substr($id, -5);
                $new_id = sprintf("%0+4u%0+6u", $year, $seq + 1);
                $utility->ui_inv_no = $new_id;

                $todayDate = Carbon::now()->format('ymdHi');
                $utility->ui_tran_no = $todayDate;


                $fromdate  = Carbon::createFromFormat('m-d-Y', $request->ui_from_date);
                $utility->ui_from_date = $fromdate;

                $todate  = Carbon::createFromFormat('m-d-Y', $request->ui_to_date);
                $utility->ui_to_date = $todate;


                //$diff_in_days = $todate->diffInDays($fromdate);
                $utility->ui_rent_days = $request->ui_rent_days;




                $today = Carbon::now();
                $utility->ui_year = $today->year;

                $todaymnt = Carbon::now();
                $utility->ui_month = $todaymnt->month;

                $utility->ui_created_uid = Auth::user()->id;
                $utility->ui_created_name = Auth::user()->name;

                //$brand->bm_eb_ob = $request->ui_cmr[$key];


                $utility->save();

                if ($utility->ui_type  == 'Electricity') {

                    Brand::where('id', $utility->ui_brand_id)->update(array('bm_eb_ob' => $utility->ui_cmr + 1));
                } elseif ($utility->ui_type  == 'Chilled_Water') {
                    Brand::where('id', $utility->ui_brand_id)->update(array('bm_cwater_ob' => $utility->ui_cmr + 1));
                } elseif ($utility->ui_type  == 'Water') {

                    Brand::where('id', $utility->ui_brand_id)->update(array('bm_water_ob' => $utility->ui_cmr + 1));
                } elseif ($utility->ui_type  == 'Sewage') {
                    Brand::where('id', $utility->ui_brand_id)->update(array('bm_eb_ob' => $utility->ui_cmr + 1));
                }
            }
        }





        // $utility->ui_month = $request->ui_month;




        //  $utility->save();

        if ($utility->ui_type  == 'Electricity') {

            return redirect('mall/utility')->with('success', 'Transaction created successfully!');
        } elseif ($utility->ui_type  == 'Chilled_Water') {
            return redirect('mall/cwater')->with('success', 'Transaction created successfully!');
        } elseif ($utility->ui_type  == 'Water') {
            return redirect('mall/water')->with('success', 'Transaction created successfully!');
        } elseif ($utility->ui_type  == 'Sewage') {
            return redirect('mall/sewage')->with('success', 'Transaction created successfully!');
        } elseif ($utility->ui_type  == 'Rent') {
            return redirect('mall/rent')->with('success', 'Transaction created successfully!');
        }


        //  return redirect('mall/utility')->with('success', 'Transaction created successfully!');
        // return redirect()->back()->with('success', 'Transaction created successfully!');;
    }


    public function insertSchedule(Request $request, Utility $utility)
    {
        Utility::create([
            'ui_brand_name' => $request->input('ui_brand_name'),
            'ui_comp_name' => $request->input('ui_comp_name'),



        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Utility $utility, Brand $brand)
    {
        $arr['brand'] = Brand::All();
        return view('mall.utility.show', compact('utility'))->with($arr);
    }

    public function watershow(Utility $utility)
    {
        return view('mall.utility.watershow', compact('utility'));
    }

    public function cwatershow(Utility $utility)
    {
        return view('mall.utility.cwatershow', compact('utility'));
    }

    public function rentshow(Utility $utility)
    {
        return view('mall.utility.rent_show', compact('utility'));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Utility $utility)
    {
        $arr['utility'] = $utility;
        return view('mall.utility.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Utility $utility)
    {
        $utility->ui_vat_no = $request->ui_vat_no;
        $utility->ui_remarks = $request->ui_remarks;
        $utility->ui_payment_status = $request->ui_payment_status;
        $utility->ui_payment_mode = $request->ui_payment_mode;
        $utility->ui_cheque_no = $request->ui_cheque_no;
        $utility->ui_bank_name = $request->ui_bank_name;


        if (!empty($request->ui_payment_date)) {

            $pdate = Carbon::createFromFormat('d-m-Y', $request->ui_payment_date);
            $utility->ui_payment_date = $pdate;
        }

        $utility->save();
        return redirect('mall/utility')->with('info', 'Transaction updated successfully!');
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
