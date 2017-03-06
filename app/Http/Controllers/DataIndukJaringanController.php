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

class DataIndukJaringanController extends Controller {


	public function show()
	{
        $customer = Customer::all();
        $jumlahPB=Transaction::pasangBaru()->level(Auth::user()->userlevel)->count();
        $gettransaksi=Transaction::dataInduk(Auth::user()->userlevel)->get();
        $jumlahDataInduk=$gettransaksi->count();
        $jumlahPD=Transaction::perubahanDaya()->level(Auth::user()->userlevel)->count();

        $jumlah=array(
            'jumlahDataInduk'=>$jumlahDataInduk,
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD
        );


        return view('user.datainduk',[
            'transaksi'=>$gettransaksi,
            'jumlah'=>$jumlah,
            'customer'=>$customer
        ]);
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
    public function mutasipdl($id){
        $jumlahPB=Transaction::pasangBaru()->level(Auth::user()->userlevel)->count();
        $jumlahPD=Transaction::perubahanDaya()->level(Auth::user()->userlevel)->count();

        $revisi=Revision::where('no_agenda',$id)->get();
        $transaksiperid=Transaction::dataInduk(Auth::user()->userlevel)->get();
        $jumlah=array(
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD

        );
        return view('user.uploadmutasipdl',[
            'revisi'=>$revisi,
            'transaksi'=>$transaksiperid,
            'jumlah'=>$jumlah
        ]);
    }
    public function updatedij($id){
        $jumlahPB=Transaction::pasangBaru()->level(Auth::user()->userlevel)->count();
        $jumlahPD=Transaction::perubahanDaya()->level(Auth::user()->userlevel)->count();

        $revisi=Revision::where('no_agenda',$id)->get();
        $transaksiperid=Transaction::dataInduk(Auth::user()->userlevel)->get();
        $jumlah=array(
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD

        );
        return view('user.uploadupdatedij',[
            'revisi'=>$revisi,
            'transaksi'=>$transaksiperid,
            'jumlah'=>$jumlah
        ]);
    }
    public function mutasipdlstore(Request $request){

        $file = array('filemutasipdl' => Input::file('filemutasipdl'));
        // setting up rules
        $rules = array('filemutasipdl' => 'required',);
        $validator = Validator::make($file, $rules);

        if ($validator->fails()) {
            // send back to the page with the input data and errors

            return Redirect::to('datainduk');
        }

        else {
            // checking file is valid.
            if (Input::file('filemutasipdl')->isValid()) {
                $destinationPath = 'files'; // upload path
                $fileName = Input::file('filemutasipdl')->getClientOriginalName(); // renameing image
                Input::file('filemutasipdl')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message

                Progress::find($request->id)->update([
                    'file_mutasi_pdl'=>$fileName,
                    'status_mutasi_pdl'=>2,
                    'status_updating_dij'=>1
                ]);
                return Redirect::to('datainduk');
            }
            else {
                // sending back with error message.

                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('datainduk');
            }
        }
    }
    public function updatedijstore(Request $request){

        $file = array('fileupdatedij' => Input::file('fileupdatedij'));
        // setting up rules
        $rules = array('fileupdatedij' => 'required',);
        $validator = Validator::make($file, $rules);

        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('datainduk');
        }

        else {
            // checking file is valid.
            if (Input::file('fileupdatedij')->isValid()) {

                $destinationPath = 'files'; // upload path
                $fileName = Input::file('fileupdatedij')->getClientOriginalName(); // renameing image
                Input::file('fileupdatedij')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message

                Progress::find($request->id)->update([
                    'file_updating_dij'=>$fileName,
                    'status_updating_dij'=>2
                ]);
                return Redirect::to('datainduk');
            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('datainduk');
            }
        }
    }

}
