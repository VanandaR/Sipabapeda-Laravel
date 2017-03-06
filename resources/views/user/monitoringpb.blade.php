@extends('layout/afterlogin')

@section('judul','Monitoring PB')


@section('konten')
    <div class="row">
        <!-- CONTENT -->
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        <strong>Data Pemasangan Baru Menunggu Proses</strong>
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

                                <?php if (Auth::user()->userlevel == 51601 || Auth::user()->userlevel == 51602 || Auth::user()->userlevel == 51603 || Auth::user()->userlevel == 51604 || Auth::user()->userlevel == 51605
                                || Auth::user()->userlevel == 51606 || Auth::user()->userlevel == 51607 || Auth::user()->userlevel == 51608 || Auth::user()->userlevel == 51609) {?>
                                <th>Kajian Kelayakan</th>
                                <th>Bayar BP</th>
                                <th>Perintah Kerja</th>
                                <th>PJBTL</th>
                                <th>Aksi</th>
                                <?php }?>

                                <?php if (Auth::user()->userlevel == 516002) {?>
                                <th>PJBTL</th>
                                <th>Aksi</th>
                                <?php }?>

                                <?php if (Auth::user()->userlevel == 516003) {?>
                                <th>Pembangunan JTM</th>
                                <th>Comissioning Test</th>
                                <th>Pengecekan SLO</th>
                                <th>Aksi</th>
                                <?php }?>

                                <?php if (Auth::user()->userlevel == 516004) {?>
                                <th>Mutasi PDL</th>
                                <th>Aksi</th>
                                <?php }?>

                                <?php if (Auth::user()->userlevel == 516005) {?>
                                <th>Pemasangan App</th>
                                <th>Aksi</th>
                                <?php }?>



                            </tr>
                            </thead>

                            <tbody>
                            <?php for($i=0;$i<$jumlah['jumlahPB'];$i++){?>
                            <tr>
                                <td><?php echo $transaksi[$i]->no_agenda;?></td>
                                <td><?php echo $transaksi[$i]->customerfunction->nama;?></td>
                                <td><?php echo $transaksi[$i]->customerfunction->rayonfunction->nama_rayon;?></td>
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
                                    if($transaksi[$i]->progressfunction->status_bayar_BP == 1){
                                        echo "<div class='label label-success'>Menunggu BP</div>";
                                    }else if($transaksi[$i]->progressfunction->status_PK == 1){
                                        echo "<div class='label label-success'>Menunggu PK</div>";
                                    }else if($transaksi[$i]->progressfunction->status_PJBTL == 1){
                                        echo "<div class='label label-success'>Menunggu PJBTL</div>";
                                    }else if($transaksi[$i]->progressfunction->status_pembangunan_jtm == 1){
                                        echo "<div class='label label-success'>Menunggu Pembangunan JTM</div>";
                                    }else if($transaksi[$i]->progressfunction->status_commisioning_test == 1){
                                        echo "<div class='label label-success'>Menunggu Comissioning Test</div>";
                                    }else if($transaksi[$i]->progressfunction->status_cek_SLO == 1){
                                        echo "<div class='label label-success'>Menunggu Pengecekan SLO</div>";
                                    }else if($transaksi[$i]->progressfunction->status_pemasangan_app == 1){
                                        echo "<div class='label label-success'>Menunggu Pemasangan App</div>";
                                    }else if($transaksi[$i]->progressfunction->status_mutasi_PDL == 1){
                                        echo "<div class='label label-success'>Menunggu Mutasi PDL</div>";
                                    }else if($transaksi[$i]->progressfunction->status_updating_dij == 1){
                                        echo "<div class='label label-success'>Menunggu Updating DIJ</div>";}
                                    else if($transaksi[$i]->progressfunction->status_kajian_kelayakan <= 1){
                                        echo "<div class='label label-success'>Menunggu Kajian Kelayakan</div>";}
                                    ?>
                                </td>







                                <?php if (Auth::user()->userlevel == 516002) {?>
                                <td align="center">
                                    <?php
                                    if($transaksi[$i]->status_PJBTL <= 1 && $transaksi[$i]->progressfunction->status_PK==2){
                                    ?>
                                    <a type="button" class="" href="<?php echo url();?>/pjbtl/<?php echo $transaksi[$i]->no_agenda; ?>">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </a>

                                    <?php } else if($transaksi[$i]->progressfunction->status_bayar_BP<=1){ ?>

                                    <span class="glyphicon glyphicon-remove" aria-hidden="true" ></span>

                                    <?php } else { ?>
                                    <a type="button" class="" href="<?php echo url();?>/pjbtl/<?php echo $transaksi[$i]->no_agenda; ?>">
                                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                    </a>
                                    <?php } ?>

                                <td>
                                    <a type="button" href="<?php echo url();?>/updatePB/<?php echo $transaksi[$i]->progressfunction->no_agenda; ?>" class="btn btn-success">
                                        Update
                                        <i class="entypo-pencil"></i></a>
                                    <br>

                                    <a type="button" href="<?php echo url();?>/deletePB/<?php echo $transaksi[$i]->progressfunction->no_agenda; ?>" class="btn btn-danger">
                                        Delete
                                        <i class="entypo-trash"></i></a>

                                </td>

                                </td>
                                <?php } if (Auth::user()->userlevel == 51601 || Auth::user()->userlevel == 51602 || Auth::user()->userlevel == 51603 || Auth::user()->userlevel == 51604 || Auth::user()->userlevel == 51605
                                || Auth::user()->userlevel == 51606 || Auth::user()->userlevel == 51607 || Auth::user()->userlevel == 51608 || Auth::user()->userlevel == 51609) {?>
                                <td align="center">
                                    <a type="button" class="" href="<?php echo url();?>/kajiankelayakan/<?php echo $transaksi[$i]->no_agenda; ?>">
                                        <?php
                                        if($transaksi[$i]->progressfunction->status_kajian_kelayakan <= 1){
                                        ?>
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        <?php } else{ ?>
                                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>

                                        <?php } ?>

                                    </a>


                                </td>
                                <td align="center">

                                    <?php
                                    if($transaksi[$i]->progressfunction->status_bayar_BP <= 1 && $transaksi[$i]->progressfunction->status_kajian_kelayakan==2){
                                    ?>
                                    <a type="button" class="" href="<?php echo url();?>/bayarbp/<?php echo $transaksi[$i]->no_agenda; ?>">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </a>

                                    <?php } else if($transaksi[$i]->progressfunction->status_kajian_kelayakan<=1){ ?>

                                    <span class="glyphicon glyphicon-remove" aria-hidden="true" ></span>

                                    <?php } else { ?>
                                    <a type="button" class="" href="<?php echo url();?>/bayarbp/<?php echo $transaksi[$i]->no_agenda; ?>">
                                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                    </a>
                                    <?php } ?>


                                </td>
                                <td align="center">
                                    <?php
                                    if($transaksi[$i]->progressfunction->status_PK <= 1 && $transaksi[$i]->progressfunction->status_bayar_BP==2){
                                    ?>
                                    <a type="button" class="" href="<?php echo url();?>/perintahkerja/<?php echo $transaksi[$i]->no_agenda; ?>">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </a>

                                    <?php } else if($transaksi[$i]->progressfunction->status_bayar_BP<=1){ ?>

                                    <span class="glyphicon glyphicon-remove" aria-hidden="true" ></span>

                                    <?php } else { ?>
                                    <a type="button" class="" href="<?php echo url();?>/perintahkerja/<?php echo $transaksi[$i]->no_agenda; ?>">
                                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                    </a>
                                    <?php } ?>


                                </td>
                                <td align="center">
                                    <?php
                                    if($transaksi[$i]->progressfunction->status_PJBTL <= 1 && $transaksi[$i]->progressfunction->status_PK==2){
                                    ?>
                                    <a type="button" class="" href="<?php echo url();?>/pjbtl/<?php echo $transaksi[$i]->no_agenda; ?>">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </a>

                                    <?php } else if($transaksi[$i]->progressfunction->status_PK<=1){ ?>

                                    <span class="glyphicon glyphicon-remove" aria-hidden="true" ></span>

                                    <?php } else { ?>
                                    <a type="button" class="" href="<?php echo url();?>/pjbtl/<?php echo $transaksi[$i]->no_agenda; ?>">
                                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                    </a>
                                    <?php } ?>


                                </td>
                                <td>
                                    <a type="button" href="<?php echo url();?>/updatePB/<?php echo $transaksi[$i]->progressfunction->no_agenda; ?>" class="btn btn-success">
                                        Update
                                        <i class="entypo-pencil"></i></a>
                                    <br>

                                    <a type="button" href="<?php echo url();?>/deletePB/<?php echo $transaksi[$i]->progressfunction->no_agenda; ?>" class="btn btn-danger">
                                        Delete
                                        <i class="entypo-trash"></i></a>

                                </td>
                                <?php }?>

                                <?php if (Auth::user()->userlevel == 516003) {?>
                                <form class="form-horizontal form-groups-bordered" method="POST" action='<?php echo url() ;?>/konstruksi/<?php echo $transaksi[$i]->no_agenda ?>' >
                                    <input type="hidden" name="id" value="<?php echo $transaksi[$i]->progressfunction->id;?>">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <td class="text-center">
                                    <input type="checkbox" id="pembangunanjtm" name="pembangunanjtm" value="2">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" id="comissioningtest" name="comissioningtest" value="2">
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" id="pengecekanslo" name="pengecekanslo" value="2">
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success">
                                        Update
                                        <i class="entypo-pencil"></i></button>
                                    <br>
                                </td>
                                    </form>
                                <?php }?>

                                <?php if (Auth::user()->userlevel == 516005) {?>
                                <td align="center">
                                    <?php
                                    if($transaksi[$i]->progressfunction->status_pemasangan_app <= 1){
                                    ?>
                                    <a type="button" class="" href="<?php echo url();?>/pemasanganapp/<?php echo $transaksi[$i]->no_agenda; ?>">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </a>
                                        <?php } else { ?>
                                    <a type="button" class="" href="<?php echo url();?>/pemasanganapp/<?php echo $transaksi[$i]->no_agenda; ?>">
                                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                    </a>
                                    <?php } ?>


                                </td>
                                <td>
                                    <a type="button" href="<?php echo url();?>/updatePB/<?php echo $transaksi[$i]->progressfunction->no_agenda; ?>" class="btn btn-success">
                                        Update
                                        <i class="entypo-pencil"></i></a>
                                    <br>

                                    <a type="button" href="<?php echo url();?>/deletePB/<?php echo $transaksi[$i]->progressfunction->no_agenda; ?>" class="btn btn-danger">
                                        Delete
                                        <i class="entypo-trash"></i></a>

                                </td>
                                <?php }?>
                                <?php if (Auth::user()->userlevel == 516004) {?>
                                <td align="center">
                                    <?php
                                    if($transaksi[$i]->progressfunction->status_mutasi_PDL <= 1 && $transaksi[$i]->progressfunction->status_pemasangan_app==2){
                                    ?>
                                    <a type="button" class="" href="<?php echo url();?>/mutasipdl/<?php echo $transaksi[$i]->no_agenda; ?>">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </a>
                                    <?php } else { ?>
                                    <a type="button" class="" href="<?php echo url();?>/mutasipdl/<?php echo $transaksi[$i]->no_agenda; ?>">
                                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                    </a>
                                <?php } ?>

                                <td>
                                    <a type="button" href="<?php echo url();?>/updatePB/<?php echo $transaksi[$i]->progressfunction->no_agenda; ?>" class="btn btn-success">
                                        Update
                                        <i class="entypo-pencil"></i></a>
                                    <br>

                                    <a type="button" href="<?php echo url();?>/deletePB/<?php echo $transaksi[$i]->progressfunction->no_agenda; ?>" class="btn btn-danger">
                                        Delete
                                        <i class="entypo-trash"></i></a>

                                </td>

                                </td>
                                <?php }?>



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