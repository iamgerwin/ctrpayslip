<?php

class LoginController extends BaseController {

	public function postIndex()
	{
		Session::flush();
		$input = Input::all();

		$data = User::where('username',$input['username'])
			->where('password',md5($input['password']))
			->where('isactive',1)->first();
		Session::put('userid',$data['userid']);
		Session::put('username',$data['username']);
		Session::put('employeeid',$data['employeeid']);
		Session::put('usertypeid',$data['usertypeid']);

		if($data['userid'] != null)
			return Redirect::to('dashboard')->with('status','Success');
		else
			return Redirect::to('/')->with('message','<center><b>FAILED</b></center>');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Session::get('userid') != null)
			return Redirect::to('/dashboard');
		else
        	return View::make('logins.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function create()
	{
		dd('login');
        return View::make('logins.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		dd('login');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('logins.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('logins.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response!
	 */
	public function destroy($id)
	{
		//
	}

	public function missingMethod($parameters)
	{
		return $parameters;
	}

}
