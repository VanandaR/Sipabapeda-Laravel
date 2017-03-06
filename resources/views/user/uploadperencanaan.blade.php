@extends('layout/afterlogin')

@section('judul','Upload Perencanaan')


@section('konten')
    <div class="row">
        <!-- CONTENT -->
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        <strong>Data Pemasangan Baru Menunggu Survey</strong>
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
                                <th>Status</th>
                                <th>Konstruksi</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php for($i=0;$i<($jumlah['jumlahPB']+$jumlah['jumlahPD']);$i++){?>
                            <tr>
                                <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo url() ;?>/uploadrencanastore/<?php echo $transaksi[0]->no_agenda ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id" value="<?php echo $transaksi[$i]->progressfunction->id;?>">
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

                                <td class="text-center">
                                    <?php
                                    if($transaksi[$i]->status_bayar_BP == 0){
                                        echo "<div class='label label-danger'>Menunggu Pembayaran</div>";
                                    }
                                    ?>
                                </td>


                                <td class="text-center">
                                    <input type="checkbox" id="konstruksi" name="konstruksi" value="3">

                                </td>

                                <td>
                                    <button type="submit" class="btn btn-success">
                                        Rencanakan
                                        <i class="entypo-upload"></i></button>
                                    <br>

                                </td>

                                </form>


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