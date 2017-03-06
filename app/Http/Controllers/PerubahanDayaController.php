<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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

class PerubahanDayaController extends Controller {

	public function index()
	{
		//
	}
    public function show(){
        $customer = Customer::all();


        $jumlahPB=Transaction::pasangBaru()->level(Auth::user()->userlevel)->count();
        $jumlahPD=Transaction::perubahanDaya()->level(Auth::user()->userlevel)->count();
        $gettransaksiPD=Transaction::perubahanDaya()->level(Auth::user()->userlevel)->get();
        $jumlah=array(
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD
        );
        return view('user.monitoringpd',[
            'transaksi'=>$gettransaksiPD,
            'jumlah'=>$jumlah,
            'customer'=>$customer
        ]);
    }

	public function create()
	{
        $jumlahPB=Transaction::pasangBaru()->level(Auth::user()->userlevel)->count();
        $jumlahPD=Transaction::perubahanDaya()->level(Auth::user()->userlevel)->count();
        $transaksi=Transaction::pasangBaru()->bisaPerubahanDaya(Auth::user()->userlevel)->get();
        $customer=Customer::all();
        $jumlah=array(
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD
        );


        return view('user.pendaftaranpd',[
            'transaksi'=>$transaksi,
            'jumlah'=>$jumlah,
            'customer'=>$customer
        ]);
	}

	public function createform($id){
        $powers=Power::all();
        $jumlahPB=Transaction::pasangBaru()->level(Auth::user()->userlevel)->count();
        $jumlahPD=Transaction::perubahanDaya()->level(Auth::user()->userlevel)->count();
        $jumlah=array(
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD

        );
        $transaksiperid=Transaction::bisaPerubahanDaya(Auth::user()->userlevel)->where('no_agenda',$id)->get();
        $customer=Customer::all();
        return view('user.pendaftaranpdform',[
            'customer'=>$customer,
            'power'=>$powers,
            'transaksi'=>$transaksiperid,
            'jumlah'=>$jumlah
        ]);
     }

	public function store(Request $request)
	{
        progress::create([
            'no_agenda'=>$request->no_agenda
        ]);


        transaction::create([
            'no_agenda'=>$request->no_agenda,
            'id_customer'=>$request->id_pel,
            'daya_lama'=>$request->daya_lama,
            'daya_baru'=>$request->daya_baru,
            'jenis'=>$request->jenis,
            'tanggal'=>Carbon::now()->toDateTimeString()
        ]);
        $progress=Progress::where('no_agenda',$request->noagendapb)->get();

        Transaction::destroy($request->noagendapb);
        Progress::destroy($progress[0]->id);
        return Redirect::to('home');
	}


	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}

}
