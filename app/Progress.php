<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Progress extends Model {
    use SoftDeletes;
    protected $table='progresses';
    protected $guarded=[];
    public function transactionfunction()
    {
        return $this->belongsTo(Transaction::class,'no_agenda');
    }
}
