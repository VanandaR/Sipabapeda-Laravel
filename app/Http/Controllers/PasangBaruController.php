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

class PasangBaruController extends Controller {

	public function index()
	{

	}



    public function show(){
        $customer = Customer::all();
        $gettransaksiPB=Transaction::pasangBaru()->level(Auth::user()->userlevel)->get();
        $jumlahPB=$gettransaksiPB->count();
        $jumlahPD=Transaction::perubahanDaya()->level(Auth::user()->userlevel)->count();
        $jumlah=array(
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD
        );


        return view('user.monitoringpb',[
            'transaksi'=>$gettransaksiPB,
            'jumlah'=>$jumlah,
            'customer'=>$customer
        ]);

    }

	public function create()
	{
        $powers=Power::all();
        //fungsi $transaksi untuk menampilkan jumlah transaksi yang terjadi
        $gettransaksiPB=Transaction::pasangBaru()->level(Auth::user()->userlevel)->get();
        $jumlahPB=$gettransaksiPB->count();
        $jumlahPD=Transaction::perubahanDaya()->level(Auth::user()->userlevel)->count();
        $jumlah=array(
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD

        );
        $rayon=DB::table('rayons')->where('id_rayon','=', substr(Auth::user()->userlevel, 4))->get();
	    return view('user.pendaftaranpb',[
	        'rayon'=>$rayon,
            'power'=>$powers,
            'jumlah'=>$jumlah
        ]);
	}
	public function store(Request $request)
	{
		Customer::create([
		    'id_customer'=>$request->id_pel,
		    'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'rayon'=>$request->rayon,
            'nomorhandphone'=>$request->nomor
        ]);

        Progress::create([
            'no_agenda'=>$request->no_agenda
        ]);
        Transaction::create([
            'no_agenda'=>$request->no_agenda,
            'id_customer'=>$request->id_pel,
            'daya_baru'=>$request->daya_baru,
            'jenis'=>$request->jenis,
            'tanggal'=>Carbon::now()->toDateTimeString()
        ]);

        return Redirect::to('monitoringPB');
	}

    public function edit($id){
        $rayons=Rayon::all();
        $powers=Power::all();
        $gettransaksiPB=Transaction::pasangBaru()->level(Auth::user()->userlevel);
        $jumlahPB=$gettransaksiPB->count();
        $transaksiperid=$gettransaksiPB->where('no_agenda',$id)->get();
        $jumlahPD=Transaction::perubahanDaya()->level(Auth::user()->userlevel)->count();
        $jumlah=array(
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD

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
        return Redirect::to('monitoringPB');
    }

	public function destroy($id)
	{
        $progress=Progress::where('no_agenda',$id)->get();
        $transactions=Transaction::where('no_agenda',$id)->get();
        Transaction::destroy($id);
        Customer::destroy($transactions[0]->id_customer);
        Progress::destroy($progress[0]->id);

        return Redirect::to('monitoringPB');
	}


}
