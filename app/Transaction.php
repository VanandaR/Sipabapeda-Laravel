<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model {

    protected $primaryKey='no_agenda';
    use SoftDeletes;

    public function customer()
    {
        return $this->belongsTo(Customer::class,'id_customer');
    }
    public function daya_lamafunction()
    {
        return $this->belongsTo(Power::class,'daya_lama');
    }
    public function daya_barufunction()
    {
        return $this->belongsTo(Power::class,'daya_baru');
    }
}
