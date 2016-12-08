<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model {

    protected $primaryKey='id_customer';
    use SoftDeletes;

    public function rayonfunction()
    {
        return $this->belongsTo(Rayon::class,'rayon');
    }
}
