<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Revision;
use Carbon\Carbon;
use Auth;
use DB;
use App\Rayon;
use App\Progress;
use App\Transaction;
use App\Customer;
use App\Power;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class HomeController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{

        $jumlahPB=Transaction::pasangBaru()->level(Auth::user()->userlevel)->count();
        $jumlahPD=Transaction::perubahanDaya()->level(Auth::user()->userlevel)->count();
        $transaksiTotal=Transaction::level(Auth::user()->userlevel)->get();
        $customer=Customer::all();
        $jumlahTotal=Transaction::all()->count();


        $jumlah=array(
            'jumlahTotal'=>$jumlahTotal,
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD
    
        );





        $grafik=DB::select('select tanggal_pemasangan_app, AVG(DATEDIFF(tanggal_pemasangan_app, tanggal_bayar_BP)) as hpl from progresses GROUP BY tanggal_pemasangan_app');

        return view('user/dashboard',[
            'customer'=>$customer,
            'transaksi'=>$transaksiTotal,
            'grafik'=>$grafik,
            'jumlah'=>$jumlah
        ]);

	}

}
