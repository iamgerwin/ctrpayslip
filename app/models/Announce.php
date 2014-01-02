<?php

class Announce extends Eloquent {
	protected $table = 'tblannouncement';
	protected $primaryKey = 'announcementid';
	protected $guarded = ['announcementid','title'];
    public $timestamps = false;

    public static $rules = [
                'title' => 'required',
                'content' => 'required',
                'datecreated' => 'required',
                'lastupdated' => 'required',
                'dateexpiring' => 'required',
                'companyaddressed' => 'required',
                'isposted' => 'in:1,0',
                'isdeleted' => 'in:1,0',
                'createdby' => 'required'
            ];
    public static $errors;
    public function owner()
    {
        return $this->belongsTo('User','createdby');
    }
	public function scopeActive($query)
    {
        return $query->where('isdeleted', '=', 0);
    }
    public function scopePublish($query)
    {
    	return $query->where('isposted','=',1);
    }
    public function scopeExpiry($query)
    {
    	$now = date("Y-m-d");
    	return $query->where('dateexpiring','>',$now)->orWhere('dateexpiring','0000-00-00');
    }
    public function scopeCreatedBy($query, $cb)
    {
        return $query->whereCreatedby($cb);
    }

    public static function isValid($data)
    {
        $validation = Validator::make($data, static::$rules );
        if($validation->passes())
        {
            return true;
        }

        static::$errors = $validation->messages();
        return false;
    }
}
