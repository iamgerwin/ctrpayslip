<?php

class Company extends Eloquent {
	protected $table = 'tblcompany';
	protected $primaryKey = 'companyid';
	public $timestamps = false;
	protected $guarded = [];

	public static $rules = [
			'companyname' => 'required',
			'shortname' => '',
			'address' => '',
			'contactno' => '',
			'datecreated' => '',
			'isdeleted' => 'in::1,0'
		];
	public static $errors;

	public function scopeActive($query)
    {
    	return $query->where('isdeleted','=',0);
    }

    public static function isValid($data)
    {
    	$validation = Validator::make($data, static::$rules);
    	if($validation->passes()) return true;

    	static::$errors = $validation->messages();
    	return false;
    }
}
