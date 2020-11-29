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

Route::get('users', 'UserController@index')->name('users')->middleware('auth');
Route::get('tenantusers', 'UserController@index1')->name('tenantusers')->middleware('auth');

Route::get('changeStatus', 'UserController@changeStatus');

Route::get('/admin', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/foh', 'HomeController@icc')->name('homeicc')->middleware('auth');
Route::get('/coh', 'HomeController@coh')->name('cash')->middleware('auth');
Route::get('/mallwp', 'HomeController@mallwp')->name('mallwp')->middleware('auth');
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



//Mall - Work Permit
Route::resource('/mall/workpermit', 'Mall\WorkpermitController', ['as' => 'mall'])->middleware('auth');
Route::resource('/mall/workpermitapp', 'Mall\WorkpermitappController', ['as' => 'mall'])->middleware('auth');
Route::resource('/mall/tenant', 'Mall\TenantController', ['as' => 'mall'])->middleware('auth');
Route::resource('/mall/brand', 'Mall\BrandController', ['as' => 'mall'])->middleware('auth');
Route::get('/mall/approved', 'Mall\WorkpermitController@approved')->name('workpermit.approved')->middleware('auth');

//Purchase Request
Route::resource('/mall/purchaserequest', 'Mall\PurchaserequestController', ['as' => 'mall'])->middleware('auth');








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