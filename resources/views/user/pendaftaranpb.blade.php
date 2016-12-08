@extends('layout/afterlogin')

@section('judul','Pendaftaran PB')


@section('konten')

    <div class="row">
        <!-- CONTENT -->
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        <strong>Form Pasang Baru</strong>
                    </div>

                </div>


                <div class="panel-body">


                    <form class="form-horizontal form-groups-bordered" method="POST" action='<?php echo url() ;?>/pendaftaranPB' ?>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label" >Nomor agenda</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="field-1" name="no_agenda" maxlength="18" placeholder="Nomor Agenda" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">ID Pelanggan</label>

                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="field-1" name="id_pel" placeholder="ID Pelanggan" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">Nama</label>

                            <div class="col-sm-5">
                                <input type="text" pattern="[^0-9]+" class="form-control" id="field-1" name="nama" placeholder="Nama" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">Alamat</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="field-1" name="alamat"  placeholder="Alamat" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">Nomor Telepon</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="field-1" name="nomor"  placeholder="Nomor Telepon" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">Rayon</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="field-1" name="rayon"  placeholder="Rayon" value="<?php echo $rayon[0]->nama_rayon;?>" readonly>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">Jenis Pemasangan</label>

                            <div class="col-sm-5">
                                <select name="jenis" class="form-control" required>
                                    <option value="">--Pilih Salah Satu--</option>
                                    <option value="1">Pasang Baru</option>
                                    <option value="3">Daya Kolektif</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">Daya dan Tarif</label>

                            <div class="col-sm-5">
                                <select name="daya_baru" class="form-control" required>
                                    <option value="">--Pilih Salah Satu--</option>
                                    <?php foreach($power as $daftardaya){ ?>
                                    <option value="<?php echo $daftardaya['id_power']?>">{{$daftardaya['tarif']}} - <?php echo $daftardaya['daya'] ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <a href="javascript:history.back()"><button type="button" class="btn btn-default">Close</button></a>
                            <input type="submit" class="btn btn-gold" id="field-1">
                        </div>
                    </form>

                </div>

@endsection