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

class MonitoringController extends Controller {
    public function kajiankelayakan($id){
        $transaksiPB=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')->where('jenis','=','1');

        $jumlahPBBelumPK=$transaksiPB->where('status_PK','<=','1')->count();

        $transaksiPD=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')->where('jenis','=','2');
        $jumlahPDBelumPK=$transaksiPD->where('status_PK','<=','1')->count();
        $transaksiTotal=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')
            ->join('rayons','customers.rayon','=','rayons.id_rayon');
        $transaksiperid=$transaksiTotal->where('progresses.no_agenda','=',$id)->get();
        $jumlah=array(
            'jumlahPB'=>$jumlahPBBelumPK,
            'jumlahPD'=>$jumlahPDBelumPK

        );
        $revisi=$transaksiPB->join('revisions','revisions.no_agenda','=','transactions.no_agenda')->where('progresses.no_agenda','=',$id)->get();
        return view('user.uploadkajiankelayakan',[
            'revisi'=>$revisi,
            'transaksi'=>$transaksiperid,
            'jumlah'=>$jumlah
        ]);
    }
    public function perintahkerja($id){
        $transaksiPB=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')->where('jenis','=','1');
        $jumlahPBBelumPK=$transaksiPB->where('status_PK','=','0')->count();
    $transaksiPD=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')->where('jenis','=','2');
        $jumlahPDBelumPK=$transaksiPD->where('status_pemasangan_app','=','0')->count();
        $jumlah=array(
            'jumlahPB'=>$jumlahPBBelumPK,
            'jumlahPD'=>$jumlahPDBelumPK

        );
        $transaksiTotal=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')
            ->join('rayons','customers.rayon','=','rayons.id_rayon');
        $transaksiperid=$transaksiTotal->where('progresses.no_agenda','=',$id)->get();
        $revisi=$transaksiPB->join('revisions','revisions.no_agenda','=','transactions.no_agenda')->where('progresses.no_agenda','=',$id)->get();
        return view('user.uploadperintahkerja',[
            'revisi'=>$revisi,
            'transaksi'=>$transaksiperid,
            'jumlah'=>$jumlah
        ]);
    }
    public function pemasanganapp($id){
        $transaksiPB=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')->where('jenis','=','1');

        $jumlahPB=$transaksiPB->where('status_pemasangan_app','=','1')->count();
        $transaksiPD=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')->where('jenis','=','2');
        $jumlahPD=$transaksiPD->where('status_pemasangan_app','=','1')->count();
        $jumlah=array(
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD

        );
        $transaksiTotal=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')
            ->join('rayons','customers.rayon','=','rayons.id_rayon');
        $transaksiperid=$transaksiTotal->where('progresses.no_agenda','=',$id)->get();
        $revisi=$transaksiPB->join('revisions','revisions.no_agenda','=','transactions.no_agenda')->where('progresses.no_agenda','=',$id)->get();
        return view('user.uploadpemasanganapp',[
            'revisi'=>$revisi,
            'transaksi'=>$transaksiperid,
            'jumlah'=>$jumlah
        ]);
    }
    public function bayarbp($id){
        $transaksiPB=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')->where('jenis','=','1');
        $jumlahPBBelumPK=$transaksiPB->where('status_PK','=','0')->count();
        $transaksiPD=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')->where('jenis','=','2');
        $jumlahPDBelumPK=$transaksiPD->where('status_pemasangan_app','=','0')->count();
        $jumlah=array(
            'jumlahPB'=>$jumlahPBBelumPK,
            'jumlahPD'=>$jumlahPDBelumPK

        );
        $transaksiTotal=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')
            ->join('rayons','customers.rayon','=','rayons.id_rayon');
        $transaksiperid=$transaksiTotal->where('progresses.no_agenda','=',$id)->get();


        return view('user.uploadbayarbp',[
            'transaksi'=>$transaksiperid,
            'jumlah'=>$jumlah
        ]);
    }
    public function pjbtl($id){
        $transaksiPB=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')->where('jenis','=','1');
        $jumlahPBBelumPJBTL=$transaksiPB->where('status_PJBTl','<=','1')->count();
        $transaksiPD=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')->where('jenis','=','2');
        $jumlahPDBelumPJBTL=$transaksiPD->where('status_PJBTL','<=','1')->count();
        $jumlah=array(
            'jumlahPB'=>$jumlahPBBelumPJBTL,
            'jumlahPD'=>$jumlahPDBelumPJBTL

        );
        $transaksiTotal=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')
            ->join('rayons','customers.rayon','=','rayons.id_rayon');
        $transaksiperid=$transaksiTotal->where('progresses.no_agenda','=',$id)->get();
        $revisi=$transaksiPB->join('revisions','revisions.no_agenda','=','transactions.no_agenda')->where('progresses.no_agenda','=',$id)->get();
        return view('user.uploadpjbtl',[
            'revisi'=>$revisi,
            'transaksi'=>$transaksiperid,
            'jumlah'=>$jumlah
        ]);
    }
    public function downloadberkas(){
        $transaksiPB=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')
            ->where('jenis','=','1');
        $transaksiPD=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')->where('jenis','=','2');
        if (\Auth::user()->userlevel == 51601){
            $jumlahPB=$transaksiPB->where('status_PK','<=','1')->count();
            $jumlahPD=$transaksiPD->where('status_PK','<=','1')->count();
        }else if(\Auth::user()->userlevel == 516002){
            $jumlahPB=$transaksiPB->where('status_PK','=','2')->where('status_PJBTL','<=','1')->count();
            $jumlahPD=$transaksiPD->where('status_PK','=','2')->where('status_PJBTL','<=','1')->count();
        }else if(\Auth::user()->userlevel == 516001){
            $jumlahPB=$transaksiPB->where('status_PJBTL','=','2')->where('status_konstruksi','<=','1')->count();
            $jumlahPD=$transaksiPD->where('status_PJBTL','=','2')->where('status_konstruksi','<=','1')->count();
        }else if(\Auth::user()->userlevel == 516003){
            $jumlahPB=$transaksiPB->where('status_konstruksi','=','3')->where('status_pemasangan_app','<=','1')->count();
            $jumlahPD=$transaksiPD->where('status_konstruksi','=','3')->where('status_pemasangan_app','<=','1')->count();
        }else if(\Auth::user()->userlevel == 516004){
            $jumlahPB=$transaksiPB->where('status_PJBTL','=','2')->where('status_pemasangan_app','<=','1')->count();
            $jumlahPD=$transaksiPD->where('status_PJBTL','=','2')->where('status_pemasangan_app','<=','1')->count();
        }else if(\Auth::user()->userlevel == 516005){
            $jumlahPB=$transaksiPB->where('status_pemasangan_app','=','2')->where('status_mutasi_PDL','<=','1')->count();
            $jumlahPD=$transaksiPD->where('status_pemasangan_app','=','2')->where('status_mutasi_PDL','<=','1')->count();
        }

        $transaksiTotal=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')
            ->join('rayons','customers.rayon','=','rayons.id_rayon');
        $getTransaksi=$transaksiTotal->get();
        $jumlahTotal=$transaksiTotal->count();
        $jumlah=array(
            'jumlahTotal'=>$jumlahTotal,
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD,

        );

        return view('user.downloadberkas',[
            'transaksi'=>$getTransaksi,
            'jumlah'=>$jumlah
        ]);
    }
    public function rencana(){
        $transaksiPB=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')->where('jenis','=','1');
        $transaksiPD=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')->where('jenis','=','2');

        $jumlahPB=$transaksiPB->where('status_Konstruksi','=','1')->count();
        $jumlahPD=$transaksiPD->where('status_Konstruksi','=','1')->count();
        $transaksiTotal=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')
            ->join('rayons','customers.rayon','=','rayons.nama_rayon');
        $gettransaksi = $transaksiTotal->where('status_Konstruksi','=','1')->get();
        $jumlah=array(
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD
        );
        return view('user.uploadperencanaan',[
            'transaksi'=>$gettransaksi,
            'jumlah'=>$jumlah
        ]);
    }


    public function daftarpelanggan(){
        $customer = Customer::all();
        return $customer[0]->rayonnya->nama_rayon;
        $transaksiPB=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')->where('jenis','=','1');
        $transaksiPD=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')->where('jenis','=','2');
        if (\Auth::user()->userlevel == 51601){
            $jumlahPB=$transaksiPB->where('status_PK','<=','1')->count();
            $jumlahPD=$transaksiPD->where('status_PK','<=','1')->count();
        }else if(\Auth::user()->userlevel == 516002){
            $jumlahPB=$transaksiPB->where('status_PK','=','2')->where('status_PJBTL','<=','1')->count();
            $jumlahPD=$transaksiPD->where('status_PK','=','2')->where('status_PJBTL','<=','1')->count();
        }else if(\Auth::user()->userlevel == 516001){
            $jumlahPB=$transaksiPB->where('status_PJBTL','=','2')->where('status_konstruksi','<=','1')->count();
            $jumlahPD=$transaksiPD->where('status_PJBTL','=','2')->where('status_konstruksi','<=','1')->count();
        }else if(\Auth::user()->userlevel == 516003){
            $jumlahPB=$transaksiPB->where('status_konstruksi','=','3')->where('status_pemasangan_app','<=','1')->count();
            $jumlahPD=$transaksiPD->where('status_konstruksi','=','3')->where('status_pemasangan_app','<=','1')->count();
        }else if(\Auth::user()->userlevel == 516004){
            $jumlahPB=$transaksiPB->where('status_PJBTL','=','2')->where('status_pemasangan_app','<=','1')->count();
            $jumlahPD=$transaksiPD->where('status_PJBTL','=','2')->where('status_pemasangan_app','<=','1')->count();
        }else if(\Auth::user()->userlevel == 516005){
            $jumlahPB=$transaksiPB->where('status_pemasangan_app','=','2')->where('status_mutasi_PDL','<=','1')->count();
            $jumlahPD=$transaksiPD->where('status_pemasangan_app','=','2')->where('status_mutasi_PDL','<=','1')->count();
        }

        $transaksiTotal=DB::table('progresses')->join('transactions','progresses.no_agenda','=','transactions.no_agenda')
            ->join('customers','transactions.id_customer','=','customers.id_customer')
            ->join('rayons','customers.rayon','=','rayons.id_rayon');
        $getTransaksi=$transaksiTotal->get();
        $jumlahTotal=$transaksiTotal->count();
        $jumlah=array(
            'jumlahTotal'=>$jumlahTotal,
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD,

        );
        return view('user.daftarpelanggan',[
            'transaksi'=>$getTransaksi,
            'jumlah'=>$jumlah
        ]);
    }


    public function kajiankelayakanstore(Request $request){
        $file = array('kajiankelayakan' => Input::file('filekajiankelayakan'));
        // setting up rules
        $rules = array('kajiankelayakan' => 'required',);
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('monitoringPB');
        }
        else {
            // checking file is valid.
            if (Input::file('filekajiankelayakan')->isValid()) {
                $destinationPath = 'files'; // upload path
                $fileName = Input::file('filekajiankelayakan')->getClientOriginalName(); // renameing image
                Input::file('filekajiankelayakan')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message

                DB::table('progresses')->where('id',$request->id)->update([
                    'file_kajian_kelayakan'=>$fileName,
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
                DB::table('progresses')->where('id',$request->id)->update([
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
        DB::table('progresses')->where('id',$request->id)->update([
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
                DB::table('progresses')->where('id',$request->id)->update([
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
            DB::table('progresses')->where('id',$request->id)->update([
                'status_konstruksi'=>3,
                'status_comissioning_test'=>1
            ]);
        }else{
            DB::table('progresses')->where('id',$request->id)->update([
                'status_konstruksi'=>3,
                'status_pemasangan_app'=>1
            ]);
        }
        return Redirect::to('uploadrencana');
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
                DB::table('progresses')->where('id',$request->id)->update([
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
