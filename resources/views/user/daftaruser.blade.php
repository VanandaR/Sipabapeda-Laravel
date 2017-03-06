@extends('layout/afterlogin')

@section('judul','Daftar Pelanggan')


@section('konten')
    <div class="row">

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
                            <th>ID User</th>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th>User Level</th>
                            <th>Aksi</th>

                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach($user as $users){?>
                        <tr>
                            <td><?php echo $users->id;?></td>
                            <td><?php echo $users->name;?></td>
                            <td><?php echo $users->email;?></td>
                            <form class="form-horizontal form-groups-bordered" method="POST" action='<?php echo url() ;?>/verifikasiuser'>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="<?php echo $users->id;?>">
                                <td>
                            <select name="level" class="form-control">
                                <option value="">--Pilih Salah Satu Level--</option>
                                <?php foreach($levels as $level){ ?>
                                    <option value="<?php echo $level->id_level;?>"><?php echo $level->level;?></option>
                                <?php } ?>
                            </select>
                            </td>

                            <td><button type="submit" class="btn btn-success">
                                    Verifikasi
                                    <i class="entypo-check"></i></button>
                                <br></td>
                                </form>
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