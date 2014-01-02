<?php

class Helpers
{
	public static function setPassword($middlename,$birthdate)
	{

	}
	public static function resetPassword($id)
	{

	}
	public static function generatePassword()
	{
		
	}
	public static function uploadUser()
	{

	}
	public static function uploadClient()
	{

	}
	public static function returnValidError($valid) {
		$re = '<div class="alert alert-danger">';
		$msgs = $valid->messages();
			foreach ($msgs->all() as $msg) {
				
				$re .='<li>'.$msg.'</li>';
			}
				$re .='</div>';
		return $re;	
	}
	public static function returnPayslipView($data) {
		$da = '<table>';

			$da .= "$data->employeeno";
			
			$da .= "$data->employename";
			
			$da .= "$data->rate";
			
			$da .= "$data->days";
			
			$da .= "$data->basic";
			
			$da .= "$data->daysabsent";
			
			$da .= "$data->amountabsent";
			
			$da .= "$data->regularpay";
			
			$da .= "$data->minslate";
			
			$da .= "$data->amountlate";
			
			$da .= "$data->minsundertime";
			
			$da .= "$data->amountundertime";
			
			$da .= "$data->nettartdysalaryadj";
			
			$da .= "$data->netoftardiness";
			
			$da .= "$data->hoursnightdiffot";
			
			$da .= "$data->amountnightdiffot";
			
			$da .= "$data->hoursregot";
			
			$da .= "$data->amountregot";
			
			$da .= "$data->hourswdoot";
			
			$da .= "$data->amountwdoot";
			
			$da .= "$data->hourswdootx";
			
			$da .= "$data->amountwdootx";
			
			$da .= "$data->hourswdootprem";
			
			$da .= "$data->amountwdootprem";
			
			$da .= "$data->hoursspecialholiday";
			
			$da .= "$data->amountspecialholiday";
			
			$da .= "$data->hoursspecialholidayx";
			
			$da .= "$data->amountspecialholidayx";
			
			$da .= "$data->hourslegalholiday";
			
			$da .= "$data->amountlegalholiday";
			
			$da .= "$data->hourslegalholidayx";
			
			$da .= "$data->amountlegalholidayx";
			

		$da .= '</table>';
		return $da;
	}

}
