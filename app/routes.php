<?php
/*
|--------------------------------------------------------------------------
|
| Application Routes
|--------------------------------------------------------------------------
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
use Carbon\Carbon;
use PHPoffice\PHPExcel\Classes;
Route::get('testi', function()
{

});
Route::get('apikey', function()
{
 return Str::random(32);
});
Route::post('test', function()
{
	$file = Input::file('csvFile');  
	$handle = fopen($file, 'r');
	
	while (($drs = fgetcsv($handle,1000,","))!== false)
	{
		// if (preg_match('/([0-9][0-9][0-9][0-9][0-9][0-9])-.+/', $drs[1]))
		if (preg_match('/^\d{6}-.+/', $drs[1]))
		{
			echo ($drs[1]).'<br />';
		}
		if (preg_match('/\w{2}-\d{4}-\d{6}/', $drs[1]))
		{
			echo ($drs[1]).'<br />';
		}
			
	} 
});

	Route::get('/', function()
	{
		if(Session::get('userid') != null)
			return Redirect::to('/dashboard');
		else
			return View::make('logins.index')->with('msg',Session::get('message'));
	});

Route::get('logout', function()
{
	Session::flush();
	return Redirect::to('/')->with('message', 'Successfully Logged Out');
});

Route::group(['before'=>'csrf'],function()
{
	Route::controller('login','LoginController');
});

Route::group(array('before' => 'auth'), function()
{
	Route::group(['prefix' => 'api'] ,function ()
	{
		Route::resource('payslip','PayslipController');
		Route::resource('announce','AnnounceController');
		Route::resource('company','CompanyController');
		Route::resource('user','UserController');
		Route::resource('upload','UploadController');
	});


	Route::controller('dashboard','DashboardController');
	Route::controller('myProfile','MyprofileController');
	Route::controller('myUsers','MyusersController');
	Route::controller('myAccounting','MyaccountingController');
	Route::controller('myAnnounce','MyannounceController');
});

