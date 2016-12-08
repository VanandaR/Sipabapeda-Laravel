@extends('layout/afterlogin')

@section('judul','Update Pendaftaran')


@section('konten')
    <div class="panel panel-primary" data-collapsed="0">

        <div class="panel-heading">
            <div class="panel-title">
                <strong>Upload Kajian Kelayakan</strong>
            </div>

        </div>

        <div class="panel-body">
            <form id="rootwizard" method="post" action="" class="form-horizontal form-wizard">

                <div class="steps-progress">
                    <div class="progress-indicator"></div>
                </div>



                <ul>

                    <li class="completed">
                        <a href="#tab1" data-toggle="tab"><span>1</span>Pelanggan Mendaftar</a>
                    </li>

                    <?php if ($transaksi[0]->status_kajian_kelayakan > 1) {
                        echo '<li class="completed">';
                    } elseif ($transaksi[0]->status_kajian_kelayakan <= 1) {
                        echo '<li class="active">';
                    } else {
                        echo "<li>";
                    } ?>
                    <a href="#tab2" data-toggle="tab"><span>2</span>Rayon
                        <?php if ($transaksi[0]->status_kajian_kelayakan > 1) {
                            echo 'Telah';
                        } elseif ($transaksi[0]->status_kajian_kelayakan <= 1) {
                            echo 'Belum';
                        } ?>
                        Mengupload Kajian Kelayakan</a>
                    </li>


                    <?php if ($transaksi[0]->status_bayar_BP > 1) {
                        echo '<li class="completed">';
                    } elseif ($transaksi[0]->status_bayar_BP == 1) {
                        echo '<li class="active">';
                    } else {
                        echo "<li>";
                    } ?>
                    <a href="#tab3" data-toggle="tab"><span>3</span>Pelanggan
                        <?php if ($transaksi[0]->status_bayar_BP > 1) {
                            echo 'Telah';
                        } elseif ($transaksi[0]->status_bayar_BP <= 1) {
                            echo 'Belum';
                        } ?>
                        Membayar BP</a>
                    </li>

                    <?php if ($transaksi[0]->status_PK > 1) {
                        echo '<li class="completed">';
                    } elseif ($transaksi[0]->status_PK == 1) {
                        echo '<li class="active">';
                    } else {
                        echo "<li>";
                    } ?>
                    <a href="#tab4" data-toggle="tab"><span>4</span>Rayon
                        <?php if ($transaksi[0]->status_bayar_BP > 1) {
                            echo 'Telah';
                        } elseif ($transaksi[0]->status_bayar_BP <= 1) {
                            echo 'Belum';
                        } ?>
                        Mengupload PK</a>
                    </li>


                </ul>

                <div class="tab-content">

                    <div class="tab-pane" id="tab1">1</div>
                    <div class="tab-pane" id="tab2">2</div>
                    <div class="tab-pane" id="tab3">3</div>
                    <div class="tab-pane" id="tab4">4</div>

                </div>
            </form>
            <hr>
            <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo url() ;?>/updatePB/<?php echo $transaksi[0]->no_agenda ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="<?php echo $transaksi[0]->id;?>">
                <input type="hidden" name="id_customer" value="<?php echo $transaksi[0]->id_customer;?>">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nomor Agenda</label>1

                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="field-1" name="no_agenda" value="<?php echo $transaksi[0]->no_agenda;?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nama</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="field-1" name="nama" value="<?php echo $transaksi[0]->nama;?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Alamat</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="field-1" name="alamat" value="<?php echo $transaksi[0]->alamat;?>" placeholder="Alamat" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Nomor Telepon</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="field-1" name="nomor" value="<?php echo $transaksi[0]->nomorhandphone;?>"  placeholder="Nomor Telepon" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Rayon</label>

                    <div class="col-sm-5">
                        <select name="rayon" class="form-control" required>
                            <option value="">--Pilih Salah Satu--</option>
                            <?php foreach($rayon as $daftarrayon){ ?>
                            <option <?php if($transaksi[0]->rayon == $daftarrayon['id_rayon']){echo("selected");}?> value="<?php echo $daftarrayon['id_rayon']?>"><?php echo $daftarrayon['rayon']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Jenis Pemasangan</label>

                    <div class="col-sm-5">
                        <select name="jenis" class="form-control" required>
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
                        <select name="daya_baru" class="form-control" required>
                            <option value="">--Pilih Salah Satu--</option>
                            <?php foreach($power as $daftardaya){ ?>
                            <option <?php if($transaksi[0]->daya_baru == $daftardaya['id_power']){echo("selected");}?> value="<?php echo $daftardaya['id_power']?>">{{$daftardaya['tarif']}} - <?php echo $daftardaya['daya'] ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class=" btn btn-success  ">Update<i class="entypo-pencil"></i></button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection