<?php

class MyprofileController extends BaseController {

	public function getPayslip()
	{
		$payslip = Payslip::where('employeeno',Session::get('employeeid') )->lists('uploadid');
		
		$list = Upload::whereIn('uploadid',$payslip)->orderBy('datestarting','desc')->active()->get();

		return View::make('myprofile.payslip')->with('list',$list);
	}
	public function getConfig()
	{
		$data = User::where('userid',Session::get('userid'))->first();
		return View::make('myprofile.config')->with('data',$data);
	}
	public function postUpdatepassword()
	{
		$input = Input::all();
		$v = User::where('userid',Session::get('userid'))->where('password',md5(Input::get('oldPassword')))->count();
		if($v <> 1) {
			return'<div class="alert alert-danger"><li>Incorrect OldPassword</li></div>';
		}

		$rules=['newPassword' => 'required|min:6',
				'oldPassword'=> 'required',
				'checkPassword' => 'required|same:newPassword'];
		$valid = Validator::make($input,$rules);
		if($valid->fails())
		{
			return Helpers::returnValidError($valid);
		}
		
		User::where('userid',Session::get('userid'))->update(['password' => md5(Input::get('newPassword'))]);
		return "<span class='alert alert-success' >Successful Changed Password</span>";
	}
	public function postUpdateprofile()
	{
		$input = Input::all();
		
		$rules = [
					'username' => 'required|unique:tbluser,username,'.Session::get('userid').',userid',
					'firstname' => 'required',
					'middlename' => 'required',
					'lastname' => 'required',
					'email' => 'email',
					'mobilenumber' => 'numeric',
					'landline' => 'numeric',
					'birthdate' => 'required|date_format:Y-m-d'
		];
		$valid = Validator::make($input, $rules);
		if($valid->fails())
		{
			return Helpers::returnValidError($valid);
		}
		User::where('userid',Session::get('userid'))->update([
				'username' => $input['username'],
				'firstname' => $input['firstname'],
				'middlename' => $input['middlename'],
				'lastname' => $input['lastname'],
				'email' => $input['email'],
				'mobile' => $input['mobilenumber'],
				'landline' => $input['landline'],
				'birthdate' => $input['birthdate']
			]);
		return "<span class='alert alert-success' >Successful Updating Profile</span>";
	}
}