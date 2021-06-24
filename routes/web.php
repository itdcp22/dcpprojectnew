<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|




Route::resource('/admin/accounts', 'AccountsController');

*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/table', function () {
    return view('table');
});




Auth::routes([
    'verify' => true,
    'register' => true,
]);

Route::get('email-test', function () {

    $details['email'] = 'bhhussain@gmail.com';

    dispatch(new App\Jobs\SendEmailJob($details));

    dd('done');
});

Route::get('changepassword', 'ChangePasswordController@index');
Route::post('changepassword', 'ChangePasswordController@store')->name('change.password');

Route::resource('contacts', 'ContactController')->middleware('auth');
Route::apiResource('contacts', 'ContactController')->middleware('auth');

Route::get('users/{user}',  ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::PUT('users/{user}/update',  ['as' => 'users.update', 'uses' => 'UserController@update']);

//Route::resource('/users', 'UserController', ['as' => 'users'])->middleware('auth');




Route::get('/users', 'UserController@index')->name('users')->middleware('auth');
Route::get('tenantusers', 'UserController@index1')->name('tenantusers')->middleware('auth');

//Route::resource('/tenantusers', 'UserController', ['as' => 'user'])->middleware('auth');


//Route::get('users/edit/{id}', 'UsersController@show');
//Route::put('users/edit', 'UsersController@update');
//Route::put('editusers/{id}', 'UsersController@update');


Route::get('changeStatus', 'UserController@changeStatus');

Route::get('/admin', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/foh', 'HomeController@icc')->name('homeicc')->middleware('auth');
Route::get('/coh', 'HomeController@coh')->name('cash')->middleware('auth');
Route::get('/mallwp', 'HomeController@mallwp')->name('mallwp')->middleware('auth');
Route::get('/kpihome', 'HomeController@kpihome')->name('kpihome')->middleware('auth');
//Route::get('/admin1', 'HomestaffController@index')->name('homestaff');

//Route::resource('/admin', 'HomeController', ['as'=>'admin']);
Route::get('/about', 'TestController@about')->name('about');




Route::get('/product', 'TestController@product')->name('product');
Route::get('/testhome', 'HomeController@test')->name('testhome');
Route::get('/dashboard', 'TestController@dashboard')->name('dashboard');

Route::resource('/admin/categories', 'Admin\CategoriesController', ['as' => 'admin'])->middleware('auth');
Route::resource('/admin/cashtopups', 'Admin\CashtopupController', ['as' => 'admin'])->middleware('auth');
Route::resource('/admin/advances', 'Admin\AdvanceController', ['as' => 'admin'])->middleware('auth');
Route::resource('/admin/advanceall', 'Admin\AdvanceallController', ['as' => 'admin'])->middleware('auth');
Route::resource('/admin/advancesettlement', 'Admin\AdvancesettlementController', ['as' => 'admin'])->middleware('auth');
Route::resource('/admin/advancehistory', 'Admin\AdvancehistoryController', ['as' => 'admin'])->middleware('auth');
//Route::resource('/admin/alladvancesnew', 'Admin\AdvanceallnewController', ['as'=>'admin']);
Route::resource('/admin/news', 'Admin\NewsController', ['as' => 'admin'])->middleware('auth');
Route::resource('/admin/accounts', 'Admin\AccountsController', ['as' => 'admin'])->middleware('auth');
Route::resource('/admin/unpaidbills', 'Admin\UnpaidController', ['as' => 'admin'])->middleware('auth');
Route::resource('/admin/paidbills', 'Admin\PaidController', ['as' => 'admin'])->middleware('auth');
Route::resource('/admin/allpaidbills', 'Admin\AllpaidController', ['as' => 'admin'])->middleware('auth');
Route::resource('/admin/expense', 'Admin\ExpenseController', ['as' => 'admin'])->middleware('auth');

Route::get('admin/accounts/delete/{id}', [AccountsController::class, 'delete'])->name('delete');

Route::get('/advance/advpending', 'Admin\AdvancehistoryController@advpending')->name('advpending');

//Payment System
Route::resource('/admin/suppliers', 'Admin\SupplierController', ['as' => 'admin'])->middleware('auth');
Route::resource('/admin/payments', 'Admin\PaymentController', ['as' => 'admin'])->middleware('auth');
Route::post('supplierdetails', 'Admin\PaymentController@changeCompanyName');

//Cheque
Route::resource('/admin/cheque', 'Admin\ChequeController', ['as' => 'admin'])->middleware('auth');

//Beneficary
Route::resource('/admin/beneficiary', 'Admin\BeneficiaryController', ['as' => 'admin'])->middleware('auth');

Route::get('/admin/accounts/{account}/print', 'Admin\AccountsController@print')->name('admin.accounts.print');

//Booking
Route::resource('/foh/booking', 'Foh\BookingController', ['as' => 'foh'])->middleware('auth');
Route::resource('/foh/bookinghistory', 'Foh\BookinghistoryController', ['as' => 'foh'])->middleware('auth');
Route::resource('/foh/addon', 'Foh\AddonController', ['as' => 'foh'])->middleware('auth');
Route::resource('/foh/pending', 'Foh\PendingController', ['as' => 'foh'])->middleware('auth');
Route::resource('/foh/cancel', 'Foh\CancelController', ['as' => 'foh'])->middleware('auth');
Route::resource('/foh/cancelled', 'Foh\CancelledController', ['as' => 'foh'])->middleware('auth');

//HRMS
Route::resource('/hrms/employee', 'Hrms\EmployeeController', ['as' => 'hrms'])->middleware('auth');
Route::resource('/hrms/survey', 'Hrms\SurveyController', ['as' => 'hrms'])->middleware('auth');
Route::resource('/hrms/locker', 'Hrms\LockerController', ['as' => 'hrms'])->middleware('auth');


//KPI
Route::resource('/kpi/info', 'Kpi\InfoController', ['as' => 'kpi'])->middleware('auth');
Route::resource('/kpi/objective', 'Kpi\ObjectController', ['as' => 'kpi'])->middleware('auth');
Route::resource('/kpi/initiative', 'Kpi\InitiativeController', ['as' => 'kpi'])->middleware('auth');

Route::post('supplierdetails', 'Kpi\InitiativeController@changeCompanyName');

//Route::get('dropdownlist', 'DataController@getCountries');
//Route::get('dropdownlist/getstates/{id}', 'DataController@getStates');



//Mall - Work Permit
Route::resource('/mall/workpermit', 'Mall\WorkpermitController', ['as' => 'mall'])->middleware('auth');
Route::resource('/mall/workpermitapp', 'Mall\WorkpermitappController', ['as' => 'mall'])->middleware('auth');
Route::resource('/mall/tenant', 'Mall\TenantController', ['as' => 'mall'])->middleware('auth');
Route::resource('/mall/brand', 'Mall\BrandController', ['as' => 'mall'])->middleware('auth');
Route::get('/mall/approved', 'Mall\WorkpermitController@approved')->name('workpermit.approved')->middleware('auth');
Route::get('/mall/manual', 'Mall\WorkpermitController@manual')->name('manual');

//Circular
Route::resource('/mall/circular', 'Mall\CircularController', ['as' => 'mall'])->middleware('auth');
Route::get('/mall/circtent', 'Mall\CircularController@circtent')->name('circtent');

//Utilities
Route::resource('/mall/utility', 'Mall\UtilitiesController', ['as' => 'mall'])->middleware('auth');
Route::get('/mall/cwater', 'Mall\UtilitiesController@cwater')->name('cwater');
Route::get('/mall/water', 'Mall\UtilitiesController@water')->name('water');
Route::get('/mall/consolidate', 'Mall\UtilitiesController@consolidate')->name('consolidate');

Route::get('/mall/ui_unpaid', 'Mall\UtilitiesController@ui_unpaid')->name('ui_unpaid');
Route::get('/mall/ui_paid', 'Mall\UtilitiesController@ui_paid')->name('ui_paid');

Route::get('/mall/ui_unpaid_cust', 'Mall\UtilitiesController@ui_unpaid_cust')->name('ui_unpaid_cust');
Route::get('/mall/ui_paid_cust', 'Mall\UtilitiesController@ui_paid_cust')->name('ui_paid_cust');


Route::get('/mall/summary', 'Mall\UtilitiesController@summary')->name('summary');
Route::get('/mall/summary_ui_type', 'Mall\UtilitiesController@summary_ui_type')->name('summary_ui_type');

Route::get('/mall/utilitycust', 'Mall\UtilitiesController@utilitycust')->name('utilitycust');

Route::get('/mall/cwater_create', 'Mall\UtilitiesController@cwater_create')->name('cwater_create');
Route::get('/mall/water_create', 'Mall\UtilitiesController@water_create')->name('water_create');
Route::get('/mall/sewage_create', 'Mall\UtilitiesController@sewage_create')->name('sewage_create');




Route::get('/mall/utility/{utility}/watershow', 'Mall\UtilitiesController@watershow')->name('mall.utility.watershow');

//Route::get('/mall/utility/insertSchedule', 'Mall\UtilitiesController@insertSchedule')->name('insertSchedule');

//Purchase Request
Route::resource('/purchase/purchaserequest', 'Purchase\PurreqController', ['as' => 'purchase'])->middleware('auth');
Route::resource('/procurement/purchaserequest', 'Procurement\PurchaserequestController', ['as' => 'procurement'])->middleware('auth');
Route::post("/procurement/purchaserequest", "Procurement\PurchaserequestController@addMorePost")->name('addmorePost');

Route::get("addmore", "ProductAddMoreController@addMore");
//Route::post("addmore", "ProductAddMoreController@addMorePost")->name('addmorePost');





//Export Route
Route::get('/showdata', 'CsvController@showdata');
Route::get('/export', 'Admin\AccountsController@export')->name('admin.accounts.export');
Route::get('/paidbillexport', 'Admin\AccountsController@paidbillexport')->name('admin.accounts.paidbillexport');
Route::get('/cashtopupexport', 'Admin\CashtopupController@cashtopupexport')->name('admin.cashtopups.cashtopupexport');
Route::get('/bookingexport', 'Foh\BookinghistoryController@bookingexport')->name('foh.booking.bookingexport');
Route::get('/lockerexport', 'Hrms\LockerController@lockerexport')->name('hrms.locker.lockerexport');


View::Composer(
    ['*'],
    function ($view) {
        $user = Auth::user();
        $view->with('user', $user);
    }
);

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::resource('calendar', 'CalendarController');




//Route::get('/admin/accounts/{account}/print/{item}', 'Admin\AccountsController@print')->name('admin.accounts.print');

//Route::get('/admin/accounts/{account}/print', 'Admin\AccountsController@print')->name('admin.accounts.print');




















/*
Route::get('/print', 'AccountsController@print')->name('print');
*/