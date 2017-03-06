@extends('layout/afterlogin')

@section('judul','Update Pendaftaran')


@section('konten')
    <div class="panel panel-primary" data-collapsed="0">

        <div class="panel-heading">
            <div class="panel-title">
                <strong>Detail Pelanggan</strong>
            </div>

        </div>

        <div class="panel-body">


            <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo url() ;?>/updatePB/<?php echo $transaksi[0]->no_agenda ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="<?php echo $transaksi[0]->progressfunction->id;?>">
                <input type="hidden" name="id_customer" value="<?php echo $transaksi[0]->customerfunction->id_customer;?>">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nomor Agenda</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="field-1" name="no_agenda" value="<?php echo $transaksi[0]->no_agenda;?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nama</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="field-1" name="nama" value="<?php echo $transaksi[0]->customerfunction->nama;?> " readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Alamat</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="field-1" name="alamat" value="<?php echo $transaksi[0]->customerfunction->alamat;?>" placeholder="Alamat" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Nomor Telepon</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="field-1" name="nomor" value="<?php echo $transaksi[0]->customerfunction->nomorhandphone;?>"  placeholder="Nomor Telepon" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Rayon</label>

                    <div class="col-sm-5">
                        <select name="rayon" class="form-control" readonly>
                            <option value="">--Pilih Salah Satu--</option>
                            <?php foreach($rayon as $daftarrayon){ ?>
                            <option <?php if($transaksi[0]->customerfunction->rayon == $daftarrayon['id_rayon']){echo("selected");}?> value="<?php echo $daftarrayon['id_rayon']?>"><?php echo $daftarrayon['nama_rayon']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Jenis Pemasangan</label>

                    <div class="col-sm-5">
                        <select name="jenis" class="form-control" readonly>
                            <option value="">--Pilih Salah Satu--</option>
                            <option <?php if($transaksi[0]->jenis == '1'){echo("selected");}?> value="1">Pasang Baru</option>
                            <option <?php if($transaksi[0]->jenis == '2'){echo("selected");}?> value="2">Perubahan Daya</option>
                            <option <?php if($transaksi[0]->jenis == '3'){echo("selected");}?> value="3">Daya Kolektif</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Daya dan Tarif</label>

                    <div class="col-sm-5">
                        <select name="daya_baru" class="form-control" readonly>
                            <option value="">--Pilih Salah Satu--</option>
                            <?php foreach($power as $daftardaya){ ?>
                            <option <?php if($transaksi[0]->daya_baru == $daftardaya['id_power']){echo("selected");}?> value="<?php echo $daftardaya['id_power']?>">{{$daftardaya['tarif']}} - <?php echo $daftardaya['daya'] ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <a href="javascript:history.back()"><button type="button" class="btn btn-default">Back</button></a>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection