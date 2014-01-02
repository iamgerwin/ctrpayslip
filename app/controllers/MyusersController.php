<?php

class MyusersController extends BaseController {
	public function getManageclients()
	{
		return View::make('myusers.manageclients')->withCompanies(Company::orderBy('companyname','asc')->get());
	}
	public function getManageusers()
	{
		return View::make('myusers.manageusers');
	}
}