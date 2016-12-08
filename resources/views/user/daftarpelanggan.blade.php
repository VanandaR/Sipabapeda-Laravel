@extends('layout/afterlogin')

@section('judul','Daftar Pelanggan')


@section('konten')
    <div class="row">
        <!-- CONTENT -->
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        <strong>Daftar Pelanggan</strong>
                    </div>

                </div>

                <div class="panel-body">

                    <div class="col-md-12">






                        <br>
                        <br>
                        <table class="table table-bordered datatable" id="table-1">
                            <thead>
                            <tr>
                                <th>ID Pelanggan</th>
                                <th>Nama</th>
                                <th>Rayon</th>
                                <th>Jenis</th>
                                <th>HPL</th>
                                <th>Status</th>

                            </tr>
                            </thead>

                            <tbody>
                            <?php for($i=0;$i<($jumlah['jumlahTotal']);$i++){?>
                            <tr>
                                <td><?php echo $transaksi[$i]->id_customer;?></td>
                                <td><?php echo $transaksi[$i]->nama;?></td>
                                <td><?php echo $transaksi[$i]->nama_rayon;?></td>
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
                                <td><?php echo $transaksi[$i]->rayon;?></td>
                                <td>
                                    <a type="button" href="<?php echo url();?>/detailPB/<?php echo $transaksi[$i]->no_agenda; ?>" class="btn btn-success">
                                        Detail
                                        <i class="entypo-eye"></i></a>
                                </td>

                            </tr>
                            <?php }?>
                            </tbody>
                        </table>
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

@endsection