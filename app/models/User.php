<?php

class User extends Eloquent {
	protected $table = 'tbluser';
	protected $primaryKey = 'userid';
	protected $hidden = ['password'];
    protected $guarded = ['userid','username'];
	public $timestamps = false;

    public function usertype()
    {
        return $this->belongsTo('Usertype','usertypeid');
    }
    public function company()
    {
        return $this->belongsTo('Company','companyid');
    }
    public function announce()
    {
        return $this->hasMany('Annouce','createdby');
    }
	public function scopeActive($query)
    {
    	return $query->where('isdeleted','=',0);
    }
    public function scopeCompanyid($query, $ci)
    {
        return $query->whereCompanyid($ci);
    }
}
