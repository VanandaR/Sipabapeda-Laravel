<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Transaction extends Model {

    protected $primaryKey='no_agenda';
    use SoftDeletes;
    protected $guarded=[];

    public function customerfunction()
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
    public function revisifunction(){
        return $this->hasMany(Revision::class);
    }
    public function progressfunction()
    {
        return $this->hasOne(Progress::class,'no_agenda');
    }
    public function scopePasangBaru($query){
        return $query->whereIn('jenis',[1,3]);
    }
    public function scopePerubahanDaya($query){
        return $query->where('jenis',2);
    }
    public function scopeDataInduk($query,$level){
        $rayon=substr($level,4);
        return  $query->whereHas('customerfunction', function($q) use ($rayon) {
            $q->where('rayon', $rayon);
        })
            ->whereExists(function ($q){
                $q->select(DB::raw('*'))
                    ->from('progresses')
                    ->where('status_pemasangan_app','=','2')
                    ->where('status_updating_dij','<=','1')
                    ->whereRaw('progresses.no_agenda = transactions.no_agenda');
            });
    }
    public function scopeBisaPerubahanDaya($query,$level){
        $rayon=substr($level,4);
        return  $query->whereHas('customerfunction', function($q) use ($rayon) {
            $q->where('rayon', $rayon);
        })
            ->whereExists(function ($q){
                $q->select(DB::raw('*'))
                    ->from('progresses')
                    ->where('status_updating_dij','=','2')
                    ->whereRaw('progresses.no_agenda = transactions.no_agenda');
            });
    }
    public function scopeLevel($query,$level){
        $tesrayon=substr($level,4,1);
        $rayon=substr($level,4);

        if($tesrayon=='0'){
            if ($rayon=='01'){
                return $query->whereExists(function ($q){
                    $q->select(DB::raw('*'))
                        ->from('progresses')
                        ->where('status_PJBTL','=','2')
                        ->where('status_konstruksi','=','1')
                        ->whereRaw('progresses.no_agenda = transactions.no_agenda');
                });
            }
            else if ($rayon=='02'){
                return $query->whereExists(function ($q){
                    $q->select(DB::raw('*'))
                        ->from('progresses')
                        ->where('status_PK','=','2')
                        ->where('status_PJBTL','<=','1')
                        ->whereRaw('progresses.no_agenda = transactions.no_agenda');
                });
            }
            else if ($rayon=='03'){
                return $query->whereExists(function ($q){
                    $q->select(DB::raw('*'))
                        ->from('progresses')
                        ->where('status_konstruksi','=','3')
                        ->where('status_pemasangan_app','<=','0')
                        ->whereRaw('progresses.no_agenda = transactions.no_agenda');
                });
            }
            else if ($rayon=='04'){
                return $query->whereExists(function ($q){
                    $q->select(DB::raw('*'))
                        ->from('progresses')
                        ->where('status_pemasangan_app','=','2')
                        ->where('status_mutasi_PDL','<=','1')
                        ->whereRaw('progresses.no_agenda = transactions.no_agenda');
                });
            }
            else if ($rayon=='05'){
                return $query->whereExists(function ($q){
                    $q->select(DB::raw('*'))
                        ->from('progresses')
                        ->where('status_pemasangan_app','=','1')
                        ->where('status_mutasi_PDL','<=','1')
                        ->whereRaw('progresses.no_agenda = transactions.no_agenda');
                });
            }
        }else{
            return  $query->whereHas('customerfunction', function($q) use ($rayon) {
                $q->where('rayon', $rayon);
            })
                ->whereExists(function ($q){
                    $q->select(DB::raw('*'))
                        ->from('progresses')
                        ->where('progresses.status_PJBTL','<=','1')
                        ->whereRaw('progresses.no_agenda = transactions.no_agenda');
                });

        }
    }
}
