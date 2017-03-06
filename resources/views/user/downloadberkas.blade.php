@extends('layout/afterlogin')

@section('judul','Download Berkas')


@section('konten')
    <div class="row">
        <!-- CONTENT -->
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        <strong>Data Pemasangan</strong>
                    </div>

                </div>

                <div class="panel-body">
                    <div class="col-md-12">
                        <br>
                        <br>
                        <table class="table table-bordered datatable" id="table-1">
                            <thead>
                            <tr>
                                <th>No Agenda</th>
                                <th>Nama</th>
                                <th>Rayon</th>
                                <th>Jenis</th>
                                <th>Survei</th>
                                <th>RAB</th>
                                <th>Analisis</th>
                                <th>Perintah Kerja</th>
                                <th>PJBTL</th>

                            </tr>
                            </thead>

                            <tbody>
                            <?php for($i=0;$i<$jumlah['jumlahTotal'];$i++){?>
                            <tr>
                                <td><?php echo $transaksi[$i]->no_agenda;?></td>
                                <td><?php echo $transaksi[$i]->customerfunction->nama;?></td>
                                <td><?php echo $customer[$i]->rayonfunction->nama_rayon;?></td>
                                <td>
                                    <?php
                                    if($transaksi[$i]->jenis == 1){
                                        echo "<div class='label label-default'>Pasang Baru</div>";
                                    }elseif($transaksi[$i]->jenis == 2){
                                        echo "<div class='label label-primary'>Perubahan Daya</div>";
                                    } else {
                                        echo "<div class='label label-info'>PB Kolektif</div>";
                                    }
                                    ?>
                                </td>

                                <td align="center">
                                    <?php
                                    if($transaksi[$i]->progressfunction->status_kajian_kelayakan <= 1){
                                    ?>
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        <?php } else{ ?>
                                        <a type="button"  href="<?php echo url();?>/files/<?php echo $transaksi[$i]->progressfunction->file_survei;?>">
                                            <i class="entypo-download"></i></a>

                                        <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                    if($transaksi[$i]->progressfunction->status_kajian_kelayakan <= 1){
                                    ?>
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    <?php } else{ ?>
                                    <a type="button"  href="<?php echo url();?>/files/<?php echo $transaksi[$i]->progressfunction->file_rab;?>">
                                        <i class="entypo-download"></i></a>

                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                    if($transaksi[$i]->progressfunction->status_kajian_kelayakan <= 1){
                                    ?>
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    <?php } else{ ?>
                                    <a type="button"  href="<?php echo url();?>/files/<?php echo $transaksi[$i]->progressfunction->file_analisis;?>">
                                        <i class="entypo-download"></i></a>

                                    <?php } ?>
                                </td>


                                <td align="center">
                                    <?php
                                    if($transaksi[$i]->progressfunction->status_PK <= 1){
                                    ?>
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    <?php } else{ ?>
                                    <a type="button"  href="<?php echo url();?>/files/<?php echo $transaksi[$i]->progressfunction->file_PK;?>">
                                        <i class="entypo-download"></i></a>

                                    <?php } ?>
                                </td>
                                <td align="center">
                                    <?php
                                    if($transaksi[$i]->progressfunction->status_PJBTL <= 1){
                                    ?>
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    <?php } else{ ?>
                                    <a type="button"  href="<?php echo url();?>/files/<?php echo $transaksi[$i]->progressfunction->file_PJBTL;?>">
                                        <i class="entypo-download"></i></a>

                                    <?php } ?>
                                </td>


                            </tr>
                            <?php }?>
                            </tbody>
                        </table>
                        <a href="javascript:history.back()">
                            <button type="button" class="btn btn-info" href="">
                                Back
                            </button>
                        </a>
                        <script type="text/javascript">
                            var responsiveHelper;
                            var breakpointDefinition = {
                                tablet: 1024,
                                phone : 480
                            };
                            var tableContainer;

                            jQuery(document).ready(function($)
                            {
                                tableContainer = $("#table-1");

                                tableContainer.dataTable({
                                    "sPaginationType": "bootstrap",
                                    "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                                    "bStateSave": true,


                                    // Responsive Settings
                                    bAutoWidth     : false,
                                    fnPreDrawCallback: function () {
                                        // Initialize the responsive datatables helper once.
                                        if (!responsiveHelper) {
                                            responsiveHelper = new ResponsiveDatatablesHelper(tableContainer, breakpointDefinition);
                                        }
                                    },
                                    fnRowCallback  : function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                                        responsiveHelper.createExpandIcon(nRow);
                                    },
                                    fnDrawCallback : function (oSettings) {
                                        responsiveHelper.respond();
                                    }
                                });

                                $(".dataTables_wrapper select").select2({
                                    minimumResultsForSearch: -1
                                });
                            });
                        </script>

                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- END OF CONTENT -->
    </div>

    <br />

@endsection