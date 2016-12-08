@extends('layout/afterlogin')

@section('judul','Dashboard')


@section('konten')

        <table class="table table-bordered">
        <tbody>
        <tr>
            <td width="100%">
                <strong>Tingkat Permintaan Daya</strong>
                <br />

                <div id="container" style="height: 250px"></div>
            </td>

        </tr>
        </tbody>
    </table>

    <div class="row">

        <div class="col-sm-4">
            <div class="tile-stats tile-gray">
                <div class="icon"><i class="entypo-suitcase"></i></div>
                <div class="num">{{$jumlahbelumbayar}}</div>

                <h3>Berkas Pendaftar Menunggu
                    <?php

                    if (Auth::user()->level == 1 ) {
                        echo "Survey";
                    } elseif (Auth::user()->level == 3) {
                        echo "PK";
                    }elseif (Auth::user()->level == 4) {
                        echo "Pemasangan";
                    }
                    ?>
                </h3>
                <p>Daftar ini adalah pendaftar yang sudah disurvey untuk pemasangan daya baru.</p>
                <br>
                <br>
                <br>
                <br>
            </div>

        </div>

        <div class="col-sm-8">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">Daftar Pendaftar yang menunggu diproses.</div>

                    <div class="panel-options">
                        <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                        <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                        <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                    </div>
                </div>

                <table class="table table-bordered table-responsive">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Rayon</th>
                        <th>Jenis</th>
                        <th>Status Terakhir</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php for($i=0;$i<$jumlahbelumbayar;$i++){?>
                    <tr>
                        <td><?php echo ($i+1);?></td>
                        <td><?php echo $transaksi[$i]->nama;?></td>
                        <td><?php echo $transaksi[$i]->rayon;?></td>
                        <td>
                            <?php
                            if(is_null($transaksi[$i]->daya_lama)){
                                echo "<div class='label label-danger'>Pasang Baru</div>";
                            }else {
                                echo "<div class='label label-info'>Perubahan Daya</div>";
                            }
                            ?>
                        </td>
                        <td class="text-center">
                            <?php
                            if($transaksi[$i]->status_bayar_BP == 1){
                                echo "<div class='label label-success'>Menunggu BP</div>";
                            }else if($transaksi[$i]->status_PK == 1){
                                echo "<div class='label label-success'>Menunggu PK</div>";
                            }else if($transaksi[$i]->status_PJBTL == 1){
                                echo "<div class='label label-success'>Menunggu PJBTL</div>";
                            }else if($transaksi[$i]->status_pembangunan_jtm == 1){
                                echo "<div class='label label-success'>Menunggu Pembangunan JTM</div>";
                            }else if($transaksi[$i]->status_commisioning_test == 1){
                                echo "<div class='label label-success'>Menunggu Comissioning Test</div>";
                            }else if($transaksi[$i]->status_cek_SLO == 1){
                                echo "<div class='label label-success'>Menunggu Pengecekan SLO</div>";
                            }else if($transaksi[$i]->status_mutasi_PDL == 1){
                                echo "<div class='label label-success'>Menunggu Mutasi PDL</div>";
                            }else if($transaksi[$i]->status_updating_dij == 1){
                                echo "<div class='label label-success'>Menunggu Updating DIJ</div>";}
                            ?>
                        </td>

                    </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>
            <a href=""><button type="button" class="btn btn-info">Lihat Semua</button></a>

        </div>

    </div>
</div>
@endsection