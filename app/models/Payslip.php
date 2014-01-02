<?php

class Payslip extends Eloquent {
	protected $table = 'tblpayslip';
	protected $primaryKey = 'payslipid';
	public $timestamps = false;

	public function scopeUploadid($query, $ui)
    {
        return $query->whereUploadid($ui);
    }
    public function batch()
    {
        return $this->belongsTo('Upload','uploadid');
    }
}
