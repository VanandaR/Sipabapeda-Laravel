@extends('layout/afterlogin')

@section('judul','Pendaftaran PD')


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
                                <th>ID Customer</th>
                                <th>Nama</th>
                                <th>Rayon</th>
                                <th>Daya</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php for($i=0;$i<count($transaksi);$i++){?>
                            <tr>
                                <td><?php echo $transaksi[$i]->id_customer;?></td>
                                <td><?php echo $transaksi[$i]->customerfunction->nama;?></td>
                                <td><?php echo $customer[$i]->rayonfunction->nama_rayon;?></td>
                                <td><?php echo $transaksi[$i]->daya_barufunction->daya;?> - <?php echo $transaksi[$i]->daya_barufunction->tarif ;?></td>


                                <td>
                                    <a type="button" href="<?php echo url();?>/formPD/<?php echo $transaksi[$i]->no_agenda; ?>" class="btn btn-primary">
                                        Perubahan Daya
                                        </a>

                                    <br>
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