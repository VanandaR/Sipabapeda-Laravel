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

class MonitoringController extends Controller {

    public function kajiankelayakan($id){
        $jumlahPB=Transaction::pasangBaru()->level(Auth::user()->userlevel)->count();
        $jumlahPD=Transaction::perubahanDaya()->level(Auth::user()->userlevel)->count();
        $transaksiperid=Transaction::level(Auth::user()->userlevel)->where('no_agenda',$id)->get();
        $revisi=Revision::where('no_agenda',$id)->get();

        $jumlah=array(
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD

        );
        return view('user.uploadkajiankelayakan',[
            'revisi'=>$revisi,
            'transaksi'=>$transaksiperid,
            'jumlah'=>$jumlah
        ]);

    }
    public function perintahkerja($id){
        $jumlahPB=Transaction::pasangBaru()->level(Auth::user()->userlevel)->count();
        $jumlahPD=Transaction::perubahanDaya()->level(Auth::user()->userlevel)->count();

        $revisi=Revision::where('no_agenda',$id)->get();
        $transaksiperid=Transaction::level(Auth::user()->userlevel)->where('no_agenda',$id)->get();
        $jumlah=array(
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD

        );
        return view('user.uploadperintahkerja',[
            'revisi'=>$revisi,
            'transaksi'=>$transaksiperid,
            'jumlah'=>$jumlah
        ]);
    }
    public function pemasanganapp($id){
        $jumlahPB=Transaction::pasangBaru()->level(Auth::user()->userlevel)->count();
        $jumlahPD=Transaction::perubahanDaya()->level(Auth::user()->userlevel)->count();

        $revisi=Revision::where('no_agenda',$id)->get();
        $transaksiperid=Transaction::level(Auth::user()->userlevel)->where('no_agenda',$id)->get();
        $jumlah=array(
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD

        );
        return view('user.uploadpemasanganapp',[
            'revisi'=>$revisi,
            'transaksi'=>$transaksiperid,
            'jumlah'=>$jumlah
        ]);
    }
    public function bayarbp($id){
        $jumlahPB=Transaction::pasangBaru()->level(Auth::user()->userlevel)->count();
        $jumlahPD=Transaction::perubahanDaya()->level(Auth::user()->userlevel)->count();

        $transaksiperid=Transaction::level(Auth::user()->userlevel)->where('no_agenda',$id)->get();
        $jumlah=array(
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD

        );
        return view('user.uploadbayarbp',[
            'transaksi'=>$transaksiperid,
            'jumlah'=>$jumlah
        ]);
    }
    public function pjbtl($id){
        $jumlahPB=Transaction::pasangBaru()->level(Auth::user()->userlevel)->count();
        $jumlahPD=Transaction::perubahanDaya()->level(Auth::user()->userlevel)->count();

        $revisi=Revision::where('no_agenda',$id)->get();
        $transaksiperid=Transaction::level(Auth::user()->userlevel)->where('no_agenda',$id)->get();
        $jumlah=array(
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD

        );
        return view('user.uploadpjbtl',[
            'revisi'=>$revisi,
            'transaksi'=>$transaksiperid,
            'jumlah'=>$jumlah
        ]);
    }


    public function downloadberkas(){
        $jumlahPB=Transaction::pasangBaru()->level(Auth::user()->userlevel)->count();
        $jumlahPD=Transaction::perubahanDaya()->level(Auth::user()->userlevel)->count();
//        if (\Auth::user()->userlevel == 51601){
//            $jumlahPB=$transaksiPB->where('status_PK','<=','1')->count();
//            $jumlahPD=$transaksiPD->where('status_PK','<=','1')->count();
//        }else if(\Auth::user()->userlevel == 516002){
//            $jumlahPB=$transaksiPB->where('status_PK','=','2')->where('status_PJBTL','<=','1')->count();
//            $jumlahPD=$transaksiPD->where('status_PK','=','2')->where('status_PJBTL','<=','1')->count();
//        }else if(\Auth::user()->userlevel == 516001){
//            $jumlahPB=$transaksiPB->where('status_PJBTL','=','2')->where('status_konstruksi','<=','1')->count();
//            $jumlahPD=$transaksiPD->where('status_PJBTL','=','2')->where('status_konstruksi','<=','1')->count();
//        }else if(\Auth::user()->userlevel == 516003){
//            $jumlahPB=$transaksiPB->where('status_konstruksi','=','3')->where('status_pemasangan_app','<=','1')->count();
//            $jumlahPD=$transaksiPD->where('status_konstruksi','=','3')->where('status_pemasangan_app','<=','1')->count();
//        }else if(\Auth::user()->userlevel == 516004){
//            $jumlahPB=$transaksiPB->where('status_PJBTL','=','2')->where('status_pemasangan_app','<=','1')->count();
//            $jumlahPD=$transaksiPD->where('status_PJBTL','=','2')->where('status_pemasangan_app','<=','1')->count();
//        }else if(\Auth::user()->userlevel == 516005){
//            $jumlahPB=$transaksiPB->where('status_pemasangan_app','=','2')->where('status_mutasi_PDL','<=','1')->count();
//            $jumlahPD=$transaksiPD->where('status_pemasangan_app','=','2')->where('status_mutasi_PDL','<=','1')->count();
//        }

        $transaksiTotal=Transaction::all();
        $jumlahTotal=$transaksiTotal->count();
        $customer=Customer::all();
        $jumlah=array(
            'jumlahTotal'=>$jumlahTotal,
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD,

        );

        return view('user.downloadberkas',[
            'customer'=>$customer,
            'transaksi'=>$transaksiTotal,
            'jumlah'=>$jumlah
        ]);
    }
    public function rencana(){

        $jumlahPB=Transaction::pasangBaru()->level(Auth::user()->userlevel)->count();
        $jumlahPD=Transaction::perubahanDaya()->level(Auth::user()->userlevel)->count();
        $jumlahTotal=Transaction::all()->count();
        $customer=Customer::all();
        $gettransaksi=Transaction::level(Auth::user()->userlevel)->get();
        $jumlah=array(
            'jumlahTotal'=>$jumlahTotal,
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD

        );
        return view('user.uploadperencanaan',[
            'customer'=>$customer,
            'transaksi'=>$gettransaksi,
            'jumlah'=>$jumlah
        ]);
    }


    public function daftarpelanggan(){
        $customer = Customer::all();
        $jumlahPB=Transaction::pasangBaru()->level(Auth::user()->userlevel)->count();
        $jumlahPD=Transaction::perubahanDaya()->level(Auth::user()->userlevel)->count();
        $transaksiTotal=Transaction::distinct()->orderBy('updated_at','desc')->groupBy('id_customer')->get();
        $jumlahTotal=$transaksiTotal->count();

        $jumlah=array(
            'jumlahTotal'=>$jumlahTotal,
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD,
        );
        return view('user.daftarpelanggan',[
            'transaksi'=>$transaksiTotal,
            'jumlah'=>$jumlah,
            'customer'=>$customer
        ]);
    }
    public function detailpelanggan($id){
        $rayons=Rayon::all();
        $powers=Power::all();
        $jumlahPB=Transaction::pasangBaru()->level(Auth::user()->userlevel)->count();
        $transaksiperid=Transaction::where('no_agenda',$id)->get();
        $jumlahPD=Transaction::perubahanDaya()->level(Auth::user()->userlevel)->count();
        $jumlah=array(
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD

        );
        return view('user.detailpelanggan',[
            'rayon'=>$rayons,
            'power'=>$powers,
            'transaksi'=>$transaksiperid,
            'jumlah'=>$jumlah
        ]);
    }


    public function kajiankelayakanstore(Request $request){
        $file = array('rab' => Input::file('filerab'),'survei' => Input::file('filesurvei'),'analisis' => Input::file('fileanalisis'));

        // setting up rules
        $rules = array('rab' => 'required', 'survei'=>'required','analisis'=>'required');
        $validator = Validator::make($file, $rules);

        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('monitoringPB');
        }

        else {
            // checking file is valid.
            if (Input::file('filerab')->isValid() && Input::file('filerab')->isValid() && Input::file('filerab')->isValid()) {
                $destinationPath = 'files'; // upload path
                $fileRab = Input::file('filerab')->getClientOriginalName();
                $fileSurvei = Input::file('filesurvei')->getClientOriginalName();
                $fileAnalisis = Input::file('fileanalisis')->getClientOriginalName();
                Input::file('filerab')->move($destinationPath, $fileRab);
                Input::file('filesurvei')->move($destinationPath, $fileSurvei);
                Input::file('fileanalisis')->move($destinationPath, $fileAnalisis);// uploading file to given path
                // sending back with message

                Progress::find($request->id)->update([
                    'file_rab'=>$fileRab,
                    'file_survei'=>$fileSurvei,
                    'file_analisis'=>$fileAnalisis,
                    'status_kajian_kelayakan'=>2,
                    'status_bayar_BP'=>1
                ]);
                Progress::find($request->id)->update([
                    'file_rab'=>$fileRab,
                    'file_survei'=>$fileSurvei,
                    'file_analisis'=>$fileAnalisis,
                    'status_kajian_kelayakan'=>2,
                    'status_bayar_BP'=>1
                ]);
                return Redirect::to('monitoringPB');
            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('monitoringPB');
            }
        }
    }
    public function perintahkerjastore(Request $request){
        $file = array('fileperintahkerja' => Input::file('fileperintahkerja'));
        // setting up rules
        $rules = array('fileperintahkerja' => 'required',);
        $validator = Validator::make($file, $rules);

        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('monitoringPB');
        }
        else {
            // checking file is valid.
            if (Input::file('fileperintahkerja')->isValid()) {
                $destinationPath = 'files'; // upload path
                $fileName = Input::file('fileperintahkerja')->getClientOriginalName(); // renameing image
                Input::file('fileperintahkerja')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                Progress::find($request->id)->update([
                    'file_PK'=>$fileName,
                    'status_PK'=>2,
                    'status_PJBTL'=>1
                ]);

                return Redirect::to('monitoringPB');
            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('monitoringPB');
            }
        }
    }
    public function bayarbpstore(Request $request){
        Progress::find($request->id)->update([
            'tanggal_bayar_BP'=>$request->tanggal_bayar_BP,
            'status_bayar_BP'=>2,
            'status_PK'=>1
        ]);
        return Redirect::to('monitoringPB');

    }
    public function pjbtlstore(Request $request){
        $file = array('filepjbtl' => Input::file('filepjbtl'));
        // setting up rules
        $rules = array('filepjbtl' => 'required',);
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('monitoringPB');
        }
        else {
            // checking file is valid.
            if (Input::file('filepjbtl')->isValid()) {
                $destinationPath = 'files'; // upload path
                $fileName = Input::file('filepjbtl')->getClientOriginalName(); // renameing image
                Input::file('filepjbtl')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                Progress::find($request->id)->update([
                    'file_PJBTL'=>$fileName,
                    'status_PJBTL'=>2,
                    'status_konstruksi'=>1
                ]);


                return Redirect::to('monitoringPB');
            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('monitoringPB');
            }
        }
    }
    public function rencanastore(Request $request){

        if($request->konstruksi==3){
            Progress::find($request->id)->update([
                'status_konstruksi'=>3,
                'status_pembangunan_jtm'=>1
            ]);
        }else{
            Progress::find($request->id)->update([
                'status_konstruksi'=>2,
                'status_pemasangan_app'=>1
            ]);
        }
        return Redirect::to('uploadrencana');
    }
    public function konstruksistore(Request $request){
        if($request->pembangunanjtm==2){
            Progress::find($request->id)->update([
                'status_pembangunan_jtm'=>2,
                'status_commisioning_test'=>1
            ]);
        }

        if($request->comissioningtest==2){
            Progress::find($request->id)->update([
                'status_commisioning_test'=>2,
                'status_cek_SLO'=>1
            ]);
        }

        if($request->pengecekanslo==2){
            Progress::find($request->id)->update([
                'status_cek_SLO'=>2,
                'status_pemasangan_app'=>1
            ]);
        }
        return Redirect::to('monitoringPB');
    }
    public function pemasanganappstore(Request $request){
        $file = array('filepemasanganapp' => Input::file('filepemasanganapp'));
        // setting up rules
        $rules = array('filepemasanganapp' => 'required',);
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('monitoringPB');
        }
        else {
            // checking file is valid.
            if (Input::file('filepemasanganapp')->isValid()) {
                $destinationPath = 'files'; // upload path
                $fileName = Input::file('filepemasanganapp')->getClientOriginalName(); // renameing image
                Input::file('filepemasanganapp')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                Progress::find($request->id)->update([
                    'file_pemasangan_app'=>$fileName,
                    'status_pemasangan_app'=>2,
                    'status_mutasi_PDL'=>1
                ]);

                return Redirect::to('monitoringPB');
            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('monitoringPB');
            }
        }
    }

}
