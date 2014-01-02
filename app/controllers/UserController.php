<?php

class UserController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return User::all();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		return User::create([
			'username' => Input::get('userName'),
			'password' => md5(Input::get('password')),
			'firstname' => Input::get('firstName'),
			'middlename' => Input::get('middleName'),
			'lastname' => Input::get('lastName'),
			'email' => Input::get('email'),
			'landline' => Input::get('landLine'),
			'mobile' => Input::get('mobile'),
			'birthdate' => Input::get('birthDate'),
			'employeeid' => Input::get('employeeId'),
			'usertypeid' => Input::get('userTypeId'),
			'companyid' => Input::get('companyId'),
			'isactive' => Input::get('isActive'),
			'taxcode' => Input::get('taxCode'),
			'createdby' => Session::get('userid'),
			'datecreated' => date("Y-m-d H:i:s")]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('users.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('users.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return User::whereUserid($id)->update([
			'username' => Input::get('userName'),
			'password' => md5(Input::get('password')),
			'firstname' => Input::get('firstName'),
			'middlename' => Input::get('middleName'),
			'lastname' => Input::get('lastName'),
			'email' => Input::get('email'),
			'landline' => Input::get('landLine'),
			'mobile' => Input::get('mobile'),
			'birthdate' => Input::get('birthDate'),
			'employeeid' => Input::get('employeeId'),
			'usertypeid' => Input::get('userTypeId'),
			'companyid' => Input::get('companyId'),
			'isactive' => Input::get('isActive'),
			'taxcode' => Input::get('taxCode')]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
