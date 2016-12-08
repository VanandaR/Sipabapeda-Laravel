<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
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
        $transaksiPB=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')
            ->join('rayons','customers.rayon','=','rayons.id_rayon')->where('jenis','=','1');
        $transaksiPD=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')
            ->join('rayons','customers.rayon','=','rayons.id_rayon')->where('jenis','=','2');
        if (\Auth::user()->userlevel == 51601){
            $jumlahPB=$transaksiPB->where('status_PK','<=','1')->count();

            $jumlahPD=$transaksiPD->where('status_PK','<=','1')->count();
            $gettransaksiPD=$transaksiPD->get();
        }else if(\Auth::user()->userlevel == 516002){
            $jumlahPB=$transaksiPB->where('status_PK','=','2')->where('status_PJBTL','<=','1')->count();
            $gettransaksiPD=$transaksiPD->get();
            $jumlahPD=$transaksiPD->where('status_PK','=','2')->where('status_PJBTL','<=','1')->count();
        }else if(\Auth::user()->userlevel == 516001){
            $jumlahPB=$transaksiPB->where('status_PJBTL','=','2')->where('status_konstruksi','<=','1')->count();
            $gettransaksiPD=$transaksiPD->get();
            $jumlahPD=$transaksiPD->where('status_PJBTL','=','2')->where('status_konstruksi','<=','1')->count();
        }else if(\Auth::user()->userlevel == 516003){
            $jumlahPB=$transaksiPB->where('status_konstruksi','=','3')->where('status_pemasangan_app','<=','1')->count();
            $gettransaksiPD=$transaksiPD->get();
            $jumlahPD=$transaksiPD->where('status_konstruksi','=','3')->where('status_pemasangan_app','<=','1')->count();
        }else if(\Auth::user()->userlevel == 516004){
            $jumlahPB=$transaksiPB->where('status_PJBTL','=','2')->where('status_pemasangan_app','<=','1')->count();
            $gettransaksiPD=$transaksiPD->get();
            $jumlahPD=$transaksiPD->where('status_PJBTL','=','2')->where('status_pemasangan_app','<=','1')->count();
        }else if(\Auth::user()->userlevel == 516005){
            $jumlahPB=$transaksiPB->where('status_pemasangan_app','=','1')->count();
            $gettransaksiPD=$transaksiPD->get();
            $jumlahPD=$transaksiPD->where('status_pemasangan_app','=','1')->count();
        }

        $jumlah=array(
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD
        );


        return view('user.monitoringpd',[
            'transaksi'=>$gettransaksiPD,
            'jumlah'=>$jumlah
        ]);
    }

	public function create()
	{
        $rayons=Rayon::all();
        $powers=Power::all();
        $transaksi=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer');

        $jumlahPB=$transaksi->where('jenis','=','1')->where('status_pemasangan_app','=','0')->count();
        $transaksiPBBelumApp=$transaksi->get();
        $jumlahPD=$transaksi->where('jenis','=','2')->count();
        $jumlah=array(
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD

        );


        return view('user.pendaftaranpd',[
            'transaksi'=>$transaksiPBBelumApp,
            'jumlah'=>$jumlah
        ]);
	}

	public function createform($id){
        $rayons=Rayon::all();
        $powers=Power::all();
        $transaksiPB=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')
            ->join('rayons','customers.rayon','=','rayons.id_rayon')->where('jenis','=','1');
        $transaksiPD=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')
            ->join('rayons','customers.rayon','=','rayons.id_rayon')->where('jenis','=','2');
        $jumlahPB=$transaksiPB->where('status_PK','<=','1')->count();
        $jumlahPD=$transaksiPD->where('status_PK','<=','1')->count();
        $jumlah=array(
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD

        );
        $transaksiperid=$transaksiPD->where('progresses.no_agenda','=',$id)->get();

        return view('user.pendaftaranpdform',[
            'rayon'=>$rayons,
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
