<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {



        view()->composer('home', function ($view) {
            $view->with('unpaid', \App\Account::where('th_comp_code', auth()->user()->company)->where('th_pay_status', 0)->sum('th_bill_amt'));
        });

        view()->composer('home', function ($view) {
            $view->with('userunpaid', \App\Account::where('th_comp_code', auth()->user()->company)
                ->where('th_emp_id', auth()->user()->id)
                ->where('th_pay_status', 0)->sum('th_bill_amt'));
        });







        view()->composer(['home', 'cash'], function ($view) {
            $view->with('paid_ob', \App\Account::where('th_comp_code', auth()->user()->company)->whereMonth('th_pay_date', '<', date('m'))->where('th_pay_status', 1)->sum('th_bill_amt'));
        });

        view()->composer(['home', 'cash'], function ($view) {
            $view->with('paid_cm', \App\Account::where('th_comp_code', auth()->user()->company)->whereMonth('th_pay_date', date('m'))->where('th_pay_status', 1)->sum('th_bill_amt'));
        });

        view()->composer(['home', 'cash'], function ($view) {
            $view->with('paid', \App\Account::where('th_comp_code', auth()->user()->company)->where('th_pay_status', 1)->sum('th_bill_amt'));
        });

        view()->composer('home', function ($view) {
            $view->with('userpaid', \App\Account::where('th_comp_code', auth()->user()->company)
                ->where('th_emp_id', auth()->user()->id)
                ->where('th_pay_status', 1)
                ->sum('th_bill_amt'));
        });

        view()->composer(['home', 'cash'], function ($view) {
            $view->with('topup_ob', \App\Cashtopup::where('comp_code', auth()->user()->company)->whereMonth('topup_dt', '<', date('m'))->sum('topup_amt'));
        });

        view()->composer(['home', 'cash'], function ($view) {
            $view->with('topup_cm', \App\Cashtopup::where('comp_code', auth()->user()->company)->whereMonth('topup_dt', date('m'))->sum('topup_amt'));
        });

        view()->composer(['home', 'cash'], function ($view) {
            $view->with('topup', \App\Cashtopup::where('comp_code', auth()->user()->company)->sum('topup_amt'));
        });



        view()->composer('home', function ($view) {
            $view->with('advance', \App\Advance::where('ca_comp_code', auth()->user()->company)
                ->where('ca_emp_id', auth()->user()->id)
                ->where('ca_status', 0)
                ->where('ca_pay_status', 0)
                ->sum('ca_adv_amt'));
        });

        view()->composer('home', function ($view) {
            $view->with('advance_notsettled', \App\Advance::where('ca_comp_code', auth()->user()->company)
                ->where('ca_emp_id', auth()->user()->id)
                ->where('ca_status', 0)
                ->where('ca_pay_status', 1)
                ->sum('ca_adv_amt'));
        });


        view()->composer('home', function ($view) {
            $view->with('advanceall', \App\Advance::where('ca_comp_code', auth()->user()->company)
                ->where('ca_status', 0)
                ->where('ca_pay_status', 0)
                ->sum('ca_adv_amt'));
        });

        view()->composer(['home', 'cash'], function ($view) {
            $view->with('advancepaid_ob', \App\Advance::where('ca_comp_code', auth()->user()->company)
                ->whereMonth('ca_pay_tran_date', '<', date('m'))
                ->where('ca_status', 0)
                ->where('ca_pay_status', 1)
                ->sum('ca_adv_amt'));
        });

        view()->composer(['home', 'cash'], function ($view) {
            $view->with('advancepaid_cm', \App\Advance::where('ca_comp_code', auth()->user()->company)
                ->whereMonth('ca_pay_tran_date', date('m'))
                ->where('ca_status', 0)
                ->where('ca_pay_status', 1)
                ->sum('ca_adv_amt'));
        });

        view()->composer(['home', 'cash'], function ($view) {
            $view->with('advancepaid', \App\Advance::where('ca_comp_code', auth()->user()->company)
                ->where('ca_status', 0)
                ->where('ca_pay_status', 1)
                ->sum('ca_adv_amt'));
        });






        view()->composer('home', function ($view) {
            $view->with('users', \App\User::where('company', auth()->user()->company)->count('ID'));
        });

        view()->composer('home', function ($view) {
            $view->with('accusers', \App\User::where('company', auth()->user()->company)->where('user_type', 'admin')->count('ID'));
        });



        view()->composer('home', function ($view) {
            $view->with('categories', \App\Category::count('ID'));
        });

        view()->composer('homeicc', function ($view) {
            $view->with('booking_count', \App\Booking::count('ID'));
        });

        view()->composer('homeicc', function ($view) {
            $view->with('booking_cancel', \App\Booking::where('tb_flex1', '1')->count('ID'));
        });

        view()->composer('homeicc', function ($view) {
            $view->with('booking_manal_count', \App\Booking::where('tb_reference', 'manal')->whereNull('tb_flex1')->count('ID'));
        });

        view()->composer('homeicc', function ($view) {
            $view->with('booking_gelan_count', \App\Booking::where('tb_reference', 'gelan')->whereNull('tb_flex1')->count('ID'));
        });

        view()->composer('homeicc', function ($view) {
            $view->with('booking_icc_count', \App\Booking::where('tb_reference', 'ICC')->whereNull('tb_flex1')->count('ID'));
        });

        view()->composer('homeicc', function ($view) {
            $view->with('booking_foh_count', \App\Booking::where('tb_reference', 'FOH')->whereNull('tb_flex1')->count('ID'));
        });

        view()->composer('homeicc', function ($view) {
            $view->with('booking_icc_amount', \App\Booking::where('tb_reference', 'ICC')->whereNull('tb_flex1')->sum('tb_total'));
        });

        view()->composer('homeicc', function ($view) {
            $view->with('booking_manal_amount', \App\Booking::where('tb_reference', 'manal')->whereNull('tb_flex1')->sum('tb_total'));
        });

        view()->composer('homeicc', function ($view) {
            $view->with('booking_gelan_amount', \App\Booking::where('tb_reference', 'gelan')->whereNull('tb_flex1')->sum('tb_total'));
        });

        view()->composer('homeicc', function ($view) {
            $view->with('booking_foh_amount', \App\Booking::where('tb_reference', 'foh')->whereNull('tb_flex1')->sum('tb_total'));
        });

        view()->composer('homeicc', function ($view) {
            $view->with('booking_student_count', \App\Booking::whereNull('tb_flex1')->sum('tb_student_qty'));
        });

        view()->composer('homeicc', function ($view) {
            $view->with('booking_teacher_count', \App\Booking::whereNull('tb_flex1')->sum('tb_adult'));
        });

        view()->composer('homeicc', function ($view) {
            $view->with('booking_total_amount', \App\Booking::whereNull('tb_flex1')->sum('tb_total'));
        });

        view()->composer('homeicc', function ($view) {
            $view->with('booking_school_count', \App\Booking::where('tb_type', 'School Trip')->whereNull('tb_flex1')->count('ID'));
        });

        view()->composer('homeicc', function ($view) {
            $view->with('booking_corporate_count', \App\Booking::where('tb_type', 'Corporate Booking')->whereNull('tb_flex1')->count('ID'));
        });

        view()->composer('homeicc', function ($view) {
            $view->with('booking_events_count', \App\Booking::where('tb_type', 'Events')->count('ID'));
        });

        view()->composer('homeicc', function ($view) {
            $view->with('booking_pending_approval', \App\Booking::where('tb_status', '0')->whereNull('tb_flex1')->count('ID'));
        });


        view()->composer('*', function ($view) {
            $view->with('pendingwp', \App\Workpermit::where('wp_created_uid', optional(auth()->user())->id)
                ->where('wp_status', 'Pending')
                ->count('ID'));
        });

        view()->composer('*', function ($view) {
            $view->with('approvedwp', \App\Workpermit::where('wp_created_uid', optional(auth()->user())->id)
                ->where('wp_status', 'Approved')
                ->count('ID'));
        });

        view()->composer('*', function ($view) {
            $view->with('rejectedwp', \App\Workpermit::where('wp_created_uid', optional(auth()->user())->id)
                ->where('wp_status', 'Not_Approved')
                ->count('ID'));
        });


        view()->composer('*', function ($view) {
            $view->with('pendingwpmall', \App\Workpermit::where('wp_status', 'Pending')->Orwhere('wp_status', 'Not_Approved')->count('ID'));
        });

        view()->composer('*', function ($view) {
            $view->with('approvedwpmall', \App\Workpermit::where('wp_status', 'Approved')->count('ID'));
        });

        view()->composer('*', function ($view) {
            $view->with('rejectedwpmall', \App\Workpermit::where('wp_status', 'Not_Approved')->count('ID'));
        });

        view()->composer('*', function ($view) {
            $view->with('teneantcount', \App\Tenant::count('ID'));
        });

        view()->composer('*', function ($view) {
            $view->with('brandcount', \App\Brand::count('ID'));
        });

        view()->composer('*', function ($view) {
            $view->with('pendingusers', \App\User::where('user_type', 'tenant')->whereNull('email_verified_at')->count('ID'));
        });
    }
}
