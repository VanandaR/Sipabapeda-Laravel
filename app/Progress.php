<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Progress extends Model {
    use SoftDeletes;
    public function noagendafunction()
    {
        return $this->belongsTo(Transaction
        ::class,'no_agenda');
    }
}
