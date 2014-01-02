<?php

class MyaccountingController extends BaseController {

	public function getIndex()
	{

	}
	public function getManagepayslip()
	{
		return View::make('myaccounting.managepayslip')
			->withCs(Company::active()->orderBy('companyname','asc')->get());
	}
	public function postManagepayslip()
	{

	}
}