<?php namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
        $transaksiPB=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')->where('jenis','=','1');
        $transaksiPD=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')->where('jenis','=','2');
        $transaksiTotal=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer');
        if (\Auth::user()->userlevel == 51601){
            $jumlahPB=$transaksiPB->where('status_PK','<=','1')->count();
            $transaksiPB=$transaksiPB->get();
            $jumlahPD=$transaksiPD->where('status_PK','<=','1')->count();
            $gettransaksi=$transaksiTotal->get();
        }else if(\Auth::user()->userlevel == 516002) {
            $jumlahPB = $transaksiPB->where('status_PK', '=', '2')->where('status_PJBTL', '<=', '1')->count();
            $transaksiPB = $transaksiPB->get();
            $jumlahPD = $transaksiPD->where('status_PK', '=', '2')->where('status_PJBTL', '<=', '1')->count();
            $gettransaksi = $transaksiTotal->get();
        }else if(\Auth::user()->userlevel == 516001){
            $jumlahPB=$transaksiPB->where('status_PJBTL','=','2')->where('status_pemasangan_app','<=','1')->count();
            $transaksiPB=$transaksiPB->get();
            $jumlahPD=$transaksiPD->where('status_PJBTL','=','2')->where('status_pemasangan_app','<=','1')->count();
            $gettransaksi=$transaksiTotal->get();
        }else if(\Auth::user()->userlevel == 516003){
            $jumlahPB=$transaksiPB->where('status_PJBTL','=','2')->where('status_pemasangan_app','<=','1')->count();
            $transaksiPB=$transaksiPB->get();
            $jumlahPD=$transaksiPD->where('status_PJBTL','=','2')->where('status_pemasangan_app','<=','1')->count();
            $gettransaksi=$transaksiTotal->get();
        }else if(\Auth::user()->userlevel == 516004){
            $jumlahPB=$transaksiPB->where('status_PJBTL','=','2')->where('status_pemasangan_app','<=','1')->count();
            $transaksiPB=$transaksiPB->get();
            $jumlahPD=$transaksiPD->where('status_PJBTL','=','2')->where('status_pemasangan_app','<=','1')->count();
            $gettransaksi=$transaksiTotal->get();
        }else if(\Auth::user()->userlevel == 516005){
            $jumlahPB=$transaksiPB->where('status_pemasangan_app','=','1')->count();
            $transaksiPB=$transaksiPB->get();
            $jumlahPD=$transaksiPD->where('status_pemasangan_app','=','1')->count();
            $gettransaksi=$transaksiTotal->get();
        }
        $jumlah=array(
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD

        );




        $jumlahtotal=$jumlahPB+$jumlahPD;
        $grafik=DB::select('select tanggal_pemasangan_app, AVG(DATEDIFF(tanggal_pemasangan_app, tanggal_bayar_BP)) as hpl from progresses GROUP BY tanggal_pemasangan_app');

        return view('user/dashboard',[
		    'jumlahbelumbayar'=>$jumlahtotal,
            'transaksi'=>$gettransaksi,
            'grafik'=>$grafik,
            'jumlah'=>$jumlah
        ]);

	}

}
