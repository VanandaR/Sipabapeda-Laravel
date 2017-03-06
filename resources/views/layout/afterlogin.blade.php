<!DOCTYPE html>
<html lang="en">
<head>

    <title>@yield('judul')</title>

    <?php
    echo Html::style('js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css');
    echo Html::style('css/font-icons/entypo/css/entypo.css');
    echo Html::style('css/bootstrap.css');
    echo Html::style('css/neon-core.css');
    echo Html::style('css/neon-theme.css');
    echo Html::style('css/neon-forms.css');
    echo Html::style('css/custom.css');
    echo Html::script('js/jquery-1.11.0.min.js');
    echo Html::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js');
    echo Html::script('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js');

    ?>


</head>
<body class="page-body" data-url="http://neon.dev">
<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->


    <!-- Main Menu -->
    <div class="sidebar-menu">
        <header class="logo-env">
        <!-- logo -->
            <div class="brand">
                <a href="home">
                    <img src="<?php echo url() ;?>/images/logo.jpg" width="20" height="30" alt="" />


                </a>
            </div>
            <!-- logo collapse icon -->

            <div class="sidebar-collapse">
                <a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                    <i class="entypo-menu"></i>
                </a>
            </div>

            <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
            <div class="sidebar-mobile-menu visible-xs">
                <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                    <i class="entypo-menu"></i>
                </a>
            </div>
        </header>

        <!-- Sidebar -->
    <?php
    if(Auth::user()->userlevel == 516003 ) { ?>
    <!-- Sidebar Perencanaan -->
        <ul id="main-menu" class="">
            <!-- add class "multiple-expanded" to allow multiple submenus to open -->
            <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
            <!-- Search Bar -->

            <li class="active">
                <a href="home">
                    <i class="entypo-monitor"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="#" target="_blank">
                    <i class="entypo-newspaper"></i>
                    <span>Monitoring</span>
                    <?php if ($jumlah['jumlahPB'] > 0 or $jumlah['jumlahPD'] > 0) { ?>
                    <span class="badge badge-secondary"><?php echo ($jumlah['jumlahPB'] + $jumlah['jumlahPD']);?></span>
                    <?php } ?>
                </a>
                <ul>
                    <li>
                        <a href="<?php echo url() ;?>/monitoringPB">
                            <i class="entypo-flow-cascade"></i>
                            <span>Pasang Baru</span>
                            <?php if ($jumlah['jumlahPB'] > 0) { ?>
                            <span class="badge badge-secondary"><?php echo $jumlah['jumlahPB'];?></span>
                            <?php } ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url() ;?>/monitoringPD">
                            <i class="entypo-flow-cascade"></i>
                            <span>Perubahan Daya</span>
                            <?php if ($jumlah['jumlahPD'] > 0) { ?>
                            <span class="badge badge-secondary"><?php echo $jumlah['jumlahPD'];?></span>
                            <?php } ?>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="active">
                <a href="<?php echo url() ;?>/daftarpelanggan">
                    <i class="entypo-flow-cascade"></i>
                    <span>Daftar Pelanggan</span>
                </a>
            </li>
        </ul>
        <!-- End of Sidebar Perencanaan -->
    <?php } elseif (Auth::user()->userlevel == 516001) { ?>
    <!-- Sidebar Perencanaan -->
        <ul id="main-menu" class="">
            <!-- add class "multiple-expanded" to allow multiple submenus to open -->
            <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
            <!-- Search Bar -->

            <li class="active">
                <a href="home">
                    <i class="entypo-monitor"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="<?php echo url() ;?>/downloadberkas">
                    <i class="entypo-download"></i>
                    <span>Download Berkas</span>
                    <?php if ($jumlah['jumlahPB'] > 0 or $jumlah['jumlahPD'] > 0) { ?>
                    <span class="badge badge-secondary"><?php echo ($jumlah['jumlahTotal']);?></span>
                    <?php } ?>
                </a>
            </li>
            <li class="active">
                <a href="<?php echo url() ;?>/uploadrencana">
                    <i class="entypo-newspaper"></i>
                    <span>Perencanaan</span>
                    <?php if ($jumlah['jumlahPB'] > 0 or $jumlah['jumlahPD'] > 0) { ?>
                    <span class="badge badge-secondary"><?php echo ($jumlah['jumlahPB'] + $jumlah['jumlahPD']);?></span>
                    <?php } ?>
                </a>
            </li>
            <li class="active">
                <a href="<?php echo url() ;?>/daftaruser">
                    <i class="entypo-user"></i>
                    <span>Daftar User</span>
                </a>
            </li>
            <li class="active">
                <a href="<?php echo url() ;?>/daftarpelanggan">
                    <i class="entypo-flow-cascade"></i>
                    <span>Daftar Pelanggan</span>
                </a>
            </li>
        </ul>
        <!-- End of Sidebar Perencanaan -->
    <?php } elseif (Auth::user()->userlevel == 516004) { ?>

    <!-- Sidebar Konstruktor -->
        <ul id="main-menu" class="">
            <li class="active">
                <a href="home">
                    <i class="entypo-monitor"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="#" target="_blank">
                    <i class="entypo-newspaper"></i>
                    <span>Monitoring</span>
                </a>
                <ul>
                    <li>
                        <a href="<?php echo url() ;?>/monitoringPB">
                            <i class="entypo-flow-cascade"></i>
                            <span>Pasang Baru</span>
                            <?php if ($jumlah['jumlahPB'] > 0) { ?>
                            <span class="badge badge-secondary"><?php echo $jumlah['jumlahPB'];?></span>
                            <?php } ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url() ;?>/monitoringPD">
                            <i class="entypo-flow-cascade"></i>
                            <span>Perubahan Daya</span>
                            <?php if ($jumlah['jumlahPD'] > 0) { ?>
                            <span class="badge badge-secondary"><?php echo $jumlah['jumlahPD'];?></span>
                            <?php } ?>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a href="<?php echo url() ;?>/daftarPelanggan">
                    <i class="entypo-flow-cascade"></i>
                    <span>Daftar Pelanggan</span>
                </a>
            </li>

        </ul>
        <!-- End of Sidebar Konstruktor -->
    <?php } elseif (Auth::user()->userlevel == 516005) { ?>
        <ul id="main-menu" class="">
            <!-- add class "multiple-expanded" to allow multiple submenus to open -->
            <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
            <!-- Search Bar -->

            <li class="active">
                <a href="home">
                    <i class="entypo-monitor"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="#" target="_blank">
                    <i class="entypo-newspaper"></i>
                    <span>Monitoring</span>
                    <?php if ($jumlah['jumlahPB'] > 0 or $jumlah['jumlahPD'] > 0) { ?>
                    <span class="badge badge-secondary"><?php echo ($jumlah['jumlahPB'] + $jumlah['jumlahPD']);?></span>
                    <?php } ?>
                </a>
                <ul>
                    <li>
                        <a href="<?php echo url() ;?>/monitoringPB">
                            <i class="entypo-flow-cascade"></i>
                            <span>Pasang Baru</span>
                            <?php if ($jumlah['jumlahPB'] > 0) { ?>
                            <span class="badge badge-secondary"><?php echo $jumlah['jumlahPB'];?></span>
                            <?php } ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url() ;?>/monitoringPD">
                            <i class="entypo-flow-cascade"></i>
                            <span>Perubahan Daya</span>
                            <?php if ($jumlah['jumlahPD'] > 0) { ?>
                            <span class="badge badge-secondary"><?php echo $jumlah['jumlahPD'];?></span>
                            <?php } ?>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a href="<?php echo url() ;?>/daftarpelanggan">
                    <i class="entypo-flow-cascade"></i>
                    <span>Daftar Pelanggan</span>
                </a>
            </li>
        </ul>

    <?php } elseif (Auth::user()->userlevel == 51601 || Auth::user()->userlevel == 51602 || Auth::user()->userlevel == 51603 || Auth::user()->userlevel == 51604 || Auth::user()->userlevel == 51605
    || Auth::user()->userlevel == 51606 || Auth::user()->userlevel == 51607 || Auth::user()->userlevel == 51608 || Auth::user()->userlevel == 51609 || Auth::user()->userlevel == 516002) {
    $tingkat = "";
    if (Auth::user()->userlevel == 516002) {
        $tingkat = "manager";
    } else {
        $tingkat = "rayon";
    }
    ?>
    <!-- Sidebar Rayon & Manager -->

        <ul id="main-menu" class="">
            <li class="active">
                <a href="<?php echo url() ;?>/home">
                    <i class="entypo-monitor"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="<?php echo url() ;?>#" target="_blank">
                    <i class="entypo-newspaper"></i>
                    <span>Input Pelanggan</span>
                </a>
                <ul>
                    <li>
                        <a href="<?php echo url() ;?>/pendaftaranPB">
                            <i class="entypo-flow-cascade"></i>
                            <span>Pasang Baru</span>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url() ;?>/pendaftaranPD">
                            <i class="entypo-flow-cascade"></i>
                            <span>Perubahan Daya</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="active">
                <a href="#" target="_blank">
                    <i class="entypo-newspaper"></i>
                    <span>Monitoring Pengajuan</span>
                    <?php if ($jumlah['jumlahPB'] > 0 or $jumlah['jumlahPD'] > 0) { ?>
                    <span class="badge badge-secondary"><?php echo ($jumlah['jumlahPB'] + $jumlah['jumlahPD']);?></span>
                    <?php } ?>
                </a>
                <ul>
                    <li>
                        <a href="<?php echo url() ;?>/monitoringPB">
                            <i class="entypo-flow-cascade"></i>
                            <span>Pasang Baru</span>
                            <?php if ($jumlah['jumlahPB'] > 0) { ?>
                            <span class="badge badge-secondary"><?php echo $jumlah['jumlahPB'];?></span>
                            <?php } ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url() ;?>/monitoringPD">
                            <i class="entypo-flow-cascade"></i>
                            <span>Perubahan Daya</span>
                            <?php if ($jumlah['jumlahPD'] > 0) { ?>
                            <span class="badge badge-secondary"><?php echo $jumlah['jumlahPD'];?></span>
                            <?php } ?>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a href="<?php echo url() ;?>/datainduk">
                    <i class="entypo-database"></i>
                    <span>Data Induk Pelanggan</span>
                </a>
            </li>
            <li class="active">
                <a href="<?php echo url() ;?>/daftarpelanggan">
                    <i class="entypo-flow-cascade"></i>
                    <span>Daftar Pelanggan</span>
                </a>
            </li>

            <?php } ?>
        </ul>
        <!-- End of Sidebar Rayon & Perencanaan -->
    <!-- End of Side bar -->
    </div>
    <!-- End of Main Menu -->

    <?php
    echo Html::script('js/highcharts.js');
    echo Html::script('js/jquery-1.11.0.min.js');
    ?>
    <div class="main-content">
        <div class="row">
            <!-- Profile Info and Notifications -->
            <div class="col-md-6 col-sm-8 clearfix">
                <ul class="user-info pull-left pull-none-xsm">
                    <!-- Profile Info -->
                    <li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <h3><strong>Selamat datang
                                    <?php
                                        if (Auth::user()->userlevel == 51601){
                                        echo "Rayon Jember";
                                        }else if (Auth::user()->userlevel == 51602){
                                        echo "Rayon Lumajang";
                                        }else if (Auth::user()->userlevel == 51603){
                                            echo "Rayon Kalisat";
                                        }else if (Auth::user()->userlevel == 51604){
                                            echo "Rayon Rambipuji";
                                        }else if (Auth::user()->userlevel == 51605){
                                            echo "Rayon Ambulu";
                                        }else if (Auth::user()->userlevel == 51606){
                                            echo "Rayon Klakah";
                                        }else if (Auth::user()->userlevel == 51607){
                                            echo "Rayon Tanggul";
                                        }else if (Auth::user()->userlevel == 51608){
                                            echo "Rayon Kencong";
                                        }else if (Auth::user()->userlevel == 51609){
                                            echo "Rayon Tempeh";
                                        }else if (Auth::user()->userlevel == 516001){
                                            echo "Bagian Perencanaan";
                                        }else if (Auth::user()->userlevel == 516002){
                                            echo "Manager";
                                        }else if (Auth::user()->userlevel == 516003){
                                            echo "Bagian Konstruksi";
                                        }else if (Auth::user()->userlevel == 516004){
                                            echo "Pelayanan Administrasi";
                                        }else if (Auth::user()->userlevel == 516005){
                                            echo "Bagian Tranel";
                                        }

                                    ?>
                                </strong></h3>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Raw Links -->
            <div class="col-md-6 col-sm-4 clearfix hidden-xs">
                <ul class="list-inline links-list pull-right">
                    <!-- Language Selector -->
                    <li class="sep"></li>
                    <li>
                        <a href="<?php echo url() ;?>/logout">
                            Log Out <i class="entypo-logout right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

@yield('konten')

<!-- Bottom Scripts -->

<?php
echo Html::style('js/datatables/responsive/css/datatables.responsive.css');
echo Html::style('js/select2/select2-bootstrap.css');
echo Html::style('js/select2/select2.css');
echo Html::style('js/rickshaw/rickshaw.min.css');
echo Html::style('js/jvectormap/jquery-jvectormap-1.2.2.css');
echo Html::style('js/rickshaw/rickshaw.min.css');



echo Html::script('js/gsap/main-gsap.js');
echo Html::script('js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js');
echo Html::script('js/bootstrap.js');
echo Html::script('js/joinable.js');
echo Html::script('js/resizeable.js');
echo Html::script('js/neon-api.js');
echo Html::script('js/jquery.validate.min.js');
echo Html::script('js/neon-login.js');
echo Html::script('js/neon-custom.js');
echo Html::script('js/neon-demo.js');

echo Html::script('js/jvectormap/jquery-jvectormap-1.2.2.min.js');
echo Html::script('js/jvectormap/jquery-jvectormap-europe-merc-en.js');
echo Html::script('js/jquery.sparkline.min.js');
echo Html::script('js/rickshaw/vendor/d3.v3.js');
echo Html::script('js/rickshaw/rickshaw.min.js');
echo Html::script('js/raphael-min.js');
echo Html::script('js/morris.min.js');
echo Html::script('js/fullcalendar/fullcalendar.min.js');
echo Html::script('js/neon-chat.js');
echo Html::script('js/neon-charts.js');
echo Html::script('js/jquery.dataTables.min.js');
echo Html::script('js/datatables/TableTools.min.js');

echo Html::script('js/dataTables.bootstrap.js');
echo Html::script('js/datatables/jquery.dataTables.columnFilter.js');
echo Html::script('js/datatables/lodash.min.js');
echo Html::script('js/datatables/responsive/js/datatables.responsive.js');
echo Html::script('js/select2/select2.min.js');
echo Html::script('js/morris.min.js');
echo Html::script('js/jquery.peity.min.js');

?>


</body>
@yield('tambahanscript')
</html>

