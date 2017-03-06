<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Rayon;
use App\Transaction;
use Illuminate\Http\Request;

class RayonController extends Controller {

	public function index()
	{
		$rayon =Rayon::all();
        $jumlahPB=Transaction::pasangBaru()->level(Auth::user()->userlevel)->count();
        $jumlahPD=Transaction::perubahanDaya()->level(Auth::user()->userlevel)->count();
        $jumlahTotal=Transaction::all()->count();
        $jumlah=array(
            'jumlahTotal'=>$jumlahTotal,
            'jumlahPB'=>$jumlahPB,
            'jumlahPD'=>$jumlahPD

        );
        return view('user.daftarrayon',[
            'rayon'=>$rayon,
            'jumlah'=>$jumlah
        ]);
	}

	public function create()
	{
		//
	}

	public function store()
	{
		//
	}

	public function show($id)
	{
		//
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
