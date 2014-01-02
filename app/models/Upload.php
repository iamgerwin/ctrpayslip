<?php

class Upload extends Eloquent {
	protected $table = 'tblupload';
	protected $primaryKey = 'uploadid';
	public $timestamps = false;
    protected $fillable = ['uploadid','filetype'];

    public static $rules = [
            'filename' => 'required',
            'paytype' => 'in:hourly,daily,monthly',
            'datestarting' => 'required',
            'dateending' => 'required',
            'datecreated' => 'required',
            'createdby' => 'required',
            'companyid' => 'required',
            'isdeleted' => 'in:1,0'
        ];
    public static $errors;

    public function creator()
    {
        return $this->belongsTo('User','createdby');   
    }
    public function company()
    {
        return $this->belongsTo('Company','companyid');
    }

    public function scopeCreatedby($query, $cb)
    {
        return $query->whereCreatedby($cb);
    }
    public function scopeCompanyid($query, $ci)
    {
        return $query->whereCompanyid($ci);
    }
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
