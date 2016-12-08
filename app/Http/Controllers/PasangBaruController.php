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

class PasangBaruController extends Controller {

	public function index()
	{

	}



    public function show(){

        $transaksiPB=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')
            ->join('rayons','customers.rayon','=','rayons.id_rayon')->where('jenis','=','1');
        $transaksiPD=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')->where('jenis','=','2');
        if (\Auth::user()->userlevel == 51601){
            $jumlahPB=$transaksiPB->where('status_PK','<=','1')->count();
            $gettransaksiPB=$transaksiPB->get();
            $jumlahPD=$transaksiPD->where('status_PK','<=','1')->count();
        }else if(\Auth::user()->userlevel == 516002){
            $jumlahPB=$transaksiPB->where('status_PK','=','2')->where('status_PJBTL','<=','1')->count();
            $gettransaksiPB=$transaksiPB->get();
            $jumlahPD=$transaksiPD->where('status_PK','=','2')->where('status_PJBTL','<=','1')->count();
        }else if(\Auth::user()->userlevel == 516001){
            $jumlahPB=$transaksiPB->where('status_PJBTL','=','2')->where('status_konstruksi','<=','1')->count();
            $gettransaksiPB=$transaksiPB->get();
            $jumlahPD=$transaksiPD->where('status_PJBTL','=','2')->where('status_konstruksi','<=','1')->count();
        }else if(\Auth::user()->userlevel == 516003){
            $jumlahPB=$transaksiPB->where('status_konstruksi','=','3')->where('status_pemasangan_app','<=','1')->count();
            $gettransaksiPB=$transaksiPB->get();
            $jumlahPD=$transaksiPD->where('status_konstruksi','=','3')->where('status_pemasangan_app','<=','1')->count();
        }else if(\Auth::user()->userlevel == 516004){
            $jumlahPB=$transaksiPB->where('status_PJBTL','=','2')->where('status_pemasangan_app','<=','1')->count();
            $gettransaksiPB=$transaksiPB->get();
            $jumlahPD=$transaksiPD->where('status_PJBTL','=','2')->where('status_pemasangan_app','<=','1')->count();
        }else if(\Auth::user()->userlevel == 516005){
            $jumlahPB=$transaksiPB->where('status_pemasangan_app','=','1')->count();
            $gettransaksiPB=$transaksiPB->get();
            $jumlahPD=$transaksiPD->where('status_pemasangan_app','=','1')->count();
        }

        $jumlah=array(
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD
        );


        return view('user.monitoringpb',[
            'transaksi'=>$gettransaksiPB,
            'jumlah'=>$jumlah
        ]);
    }

	public function create()
	{
        $powers=Power::all();
        //fungsi $transaksi untuk menampilkan jumlah transaksi yang terjadi
        $transaksiPB=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')
            ->join('rayons','customers.rayon','=','rayons.id_rayon')->where('jenis','=','1');
        $transaksiPD=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')->where('jenis','=','2');
        $jumlahPB=$transaksiPB->where('status_PK','<=','1')->count();
        $jumlahPD=$transaksiPD->where('status_PK','<=','1')->count();
        $jumlah=array(
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD

        );
        $userlevel=\Auth::user()->userlevel;
        $rayon=DB::table('rayons')->where('id_rayon','=', substr($userlevel, 4))->get();


	    return view('user.pendaftaranpb',[
	        'rayon'=>$rayon,
            'power'=>$powers,
            'jumlah'=>$jumlah
        ]);
	}
	public function store(Request $request)
	{

		customer::create([
		    'id_customer'=>$request->id_pel,
		    'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'rayon'=>$request->rayon,
            'nomorhandphone'=>$request->nomor
        ]);

        progress::create([
            'no_agenda'=>$request->no_agenda
        ]);
        transaction::create([
            'no_agenda'=>$request->no_agenda,
            'id_customer'=>$request->id_pel,
            'daya_baru'=>$request->daya_baru,
            'jenis'=>$request->jenis,
            'tanggal'=>Carbon::now()->toDateTimeString()
        ]);

        return Redirect::to('home');
	}

    public function edit($id){
        $rayons=Rayon::all();
        $powers=Power::all();
        $transaksiPB=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')
            ->join('rayons','customers.rayon','=','rayons.id_rayon')->where('jenis','=','1');

        $jumlahPBBelumPK=$transaksiPB->where('status_PK','<=','1')->count();
        $transaksiperid=$transaksiPB->where('progresses.no_agenda','=',$id)->get();
        $transaksiPD=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')->where('jenis','=','2');
        $jumlahPDBelumPK=$transaksiPD->where('status_PK','<=','1')->count();
        $jumlah=array(
            'jumlahPB'=>$jumlahPBBelumPK,
            'jumlahPD'=>$jumlahPDBelumPK

        );
        return view('user.updatepb',[
            'rayon'=>$rayons,
            'power'=>$powers,
            'transaksi'=>$transaksiperid,
            'jumlah'=>$jumlah
        ]);
    }
    public function update(Request $request){

        customer::find($request->id_customer)->update([
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'rayon'=>$request->rayon,
            'nomorhandphone'=>$request->nomor
        ]);
        transaction::find($request->no_agenda)->update([
            'daya_baru'=>$request->daya_baru,
            'jenis'=>$request->jenis
        ]);
        return Redirect::to('monitorPB');
    }

	public function destroy($id)
	{

        transaction::destroy($id);
        DB::table('progresses')->where('no_agenda',$id)->delete();
        return Redirect::to('monitoringPB');
	}


}
