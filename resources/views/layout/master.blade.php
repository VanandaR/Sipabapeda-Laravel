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
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">
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

