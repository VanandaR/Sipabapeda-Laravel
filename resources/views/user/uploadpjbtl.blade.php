@extends('layout/afterlogin')

@section('judul','Upload PJBTL')


@section('konten')
    <div class="panel panel-primary" data-collapsed="0">

        <div class="panel-heading">
            <div class="panel-title">
                <strong>Upload PJBTL</strong>
            </div>

        </div>

        <div class="panel-body">
            <form id="rootwizard" method="post" action="" class="form-horizontal form-wizard">

                <div class="steps-progress">
                    <div class="progress-indicator"></div>
                </div>



                <ul>


                    <?php if ($transaksi[0]->progressfunction->status_PJBTL > 1) {
                        echo '<li class="completed">';
                    } elseif ($transaksi[0]->progressfunction->status_PJBTL == 1) {
                        echo '<li class="active">';
                    } else {
                        echo "<li>";
                    } ?>
                    <a href="#tab5" data-toggle="tab"><span>5</span>Manager
                        <?php if ($transaksi[0]->status_PJBTL > 1) {
                            echo 'Telah';
                        } elseif ($transaksi[0]->status_PJBTL <= 1) {
                            echo 'Belum';
                        } ?>
                        Mengupload PJBTL</a>
                    </li>


                </ul>

                <div class="tab-content">

                    <div class="tab-pane" id="tab5">5</div>

                </div>
            </form>
            <hr>
            <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo url() ;?>/pjbtl/<?php echo $transaksi[0]->no_agenda ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="<?php echo $transaksi[0]->progressfunction->id;?>">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nomor Agenda</label>1

                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="field-1" name="no_agenda" value="<?php echo $transaksi[0]->no_agenda;?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nama</label>

                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="field-1" name="nama" value="<?php echo $transaksi[0]->customerfunction->nama;?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">File PJBTL</label>

                    <div class="col-sm-5">
                        <input type="file" name="filepjbtl" class="form-control file2 inline btn btn-primary" multiple="1" data-label="<i class='glyphicon glyphicon-circle-arrow-up'></i> &nbsp;Pilih File" required/>
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
                <strong>Histori File Perintah Kerja</strong>
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
                <td><?php echo $transaksi[0]->file_PK;?></td>
                <td><?php echo $transaksi[0]->tanggal_file_PK;?></td>
                <td>
                    <a type="button" class="btn btn-success" href="<?php echo url();?>/files/<?php echo $transaksi[0]->file_PK;?>">
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