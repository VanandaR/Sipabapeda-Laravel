@extends('layout/afterlogin')

@section('judul','Upload Kajian Kelayakan')


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
            <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo url() ;?>/kajiankelayakan/<?php echo $transaksi[0]->no_agenda ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="<?php echo $transaksi[0]->id;?>">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nomor Agenda</label>1

                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="field-1" name="no_agenda" value="<?php echo $transaksi[0]->no_agenda;?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nama</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="field-1" name="nama" value="<?php echo $transaksi[0]->nama;?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">File Kajian Kelayakan</label>

                    <div class="col-sm-5">
                        <input type="file" name="filekajiankelayakan" class="form-control file2 inline btn btn-primary" multiple="1" data-label="<i class='glyphicon glyphicon-circle-arrow-up'></i> &nbsp;Pilih File" required/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-default">Upload</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <div class="panel panel-primary" data-collapsed="0">

        <div class="panel-heading">
            <div class="panel-title">
                <strong>Histori File Pelanggan</strong>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama File</th>
                <th>Diupload pada</th>
                <th>Aksi</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td><?php echo 1 ?></td>
                <td><?php echo $transaksi[0]->file_kajian_kelayakan;?></td>
                <td><?php echo $transaksi[0]->tanggal_kajian_kelayakan;?></td>
                <td>
                    <a type="button" class="btn btn-success" href="<?php echo url();?>/files/<?php echo $transaksi[0]->file_kajian_kelayakan;?>">
                        Download
                        <i class="entypo-download"></i></a>
                </td>
            <?php

            for($i=0;$i<count($revisi);$i++) {
            if($revisi[i]->file_revisi!=null){
            ?>


                <td><?php echo ($i+2) ?></td>
                <td><?php echo $revisi[i]->file_revisi;?></td>
                <td><?php echo $revisi[i]->tgl_revisi;?></td>
                <td>
                    <a type="button" class="btn btn-success" href="<?php echo url();?>/files/<?php echo $revisi[0]->file_revisi;?>">
                        Download
                        <i class="entypo-download"></i></a>
                </td>

            <?php } }?>
            </tr>
            </tbody>
        </table>
    </div>
    <a type="button" class="btn btn-info" href="javascript:history.back()">
        <i class="entypo-left-open-big"></i> Kembali
    </a>
@endsection