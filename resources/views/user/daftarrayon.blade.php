@extends('layout/afterlogin')

@section('judul','Daftar Pelanggan')


@section('konten')
    <div class="row">
        <!-- CONTENT -->
        {{--<div class="panel panel-primary" data-collapsed="0">--}}

            {{--<div class="panel-heading">--}}
                {{--<div class="panel-title">--}}
                    {{--<strong>Daftar Pelanggan</strong>--}}
                {{--</div>--}}

            {{--</div>--}}

            {{--<div class="panel-body">--}}

        {{--<div class="col-md-12">--}}
            {{--<form class="form-horizontal form-groups-bordered" method="POST" action='<?php echo url() ;?>/pendaftaranPB'>--}}

                {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                {{--<div class="form-group">--}}
                    {{--<label for="field-1" class="col-sm-3 control-label" >Nomor agenda</label>--}}

                    {{--<div class="col-sm-5">--}}
                        {{--<input type="text" class="form-control" id="field-1" name="no_agenda" maxlength="18" placeholder="Nomor Agenda" required>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label for="field-1" class="col-sm-3 control-label">ID Pelanggan</label>--}}

                    {{--<div class="col-sm-5">--}}
                        {{--<input type="number" class="form-control" id="field-1" name="id_pel" placeholder="ID Pelanggan" required>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="modal-footer">--}}
                    {{--<a href="javascript:history.back()"><button type="button" class="btn btn-default">Close</button></a>--}}
                    {{--<input type="submit" class="btn btn-gold" id="field-1">--}}
                {{--</div>--}}
            {{--</form>--}}
            {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        <strong>Daftar Pelanggan</strong>
                    </div>

                </div>

                <div class="panel-body">

                    <div class="col-md-12">

                        <button data-toggle='modal' data-target='#insert' type='button' class='btn btn-primary'>Tambah Rayon</button>
                        <div class="modal" id="insert" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Update</h4>
                                    </div>
                                    <?php echo Form::open(array('url'=>'sapa/update','method'=>'post'));?>
                                    <div class="modal-body">
                                        <input type="hidden" name="id">
                                        <textarea name="sapa" class="form-control" rows="5"></textarea>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-info">Proses</button>
                                    </div>
                                    <?php echo Form::close();?>
                                </div>

                            </div>
                        </div>



                        <br>
                        <br>
                        <table class="table table-bordered datatable" id="table-1">
                            <thead>
                            <tr>
                                <th>ID Rayon</th>
                                <th>Nama Rayon</th>
                                <th>Aksi</th>

                            </tr>
                            </thead>

                            <tbody>
                            <?php for($i=0;$i<count($rayon);$i++){?>
                            <tr>
                                <td><?php echo $rayon[$i]->id_rayon;?></td>
                                <td><?php echo $rayon[$i]->nama_rayon;?></td>
                                <td>
                                    <button data-toggle='modal' data-target='#<?php echo $rayon[$i]->id_rayon;?>' type='button' class='btn btn-info'>Sunting</button>
                                    <a href='sapa/delete/".$sapa->id."' class='btn btn-danger'>Delete</a>
                                </td>
                                <div class="modal fade" id="<?php echo $rayon[$i]->id_rayon;?>" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Update</h4>
                                            </div>
                                            <?php echo Form::open(array('url'=>'sapa/update','method'=>'post'));?>
                                            <div class="modal-body">
                                                <input type="hidden" value="<?php echo $rayon[$i]->id_rayon;?>" name="id">
                                                <textarea name="sapa" class="form-control" rows="5"><?php echo $rayon[$i]->nama_rayon;?></textarea>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-info">Proses</button>
                                            </div>
                                            <?php echo Form::close();?>
                                        </div>

                                    </div>
                                </div>

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