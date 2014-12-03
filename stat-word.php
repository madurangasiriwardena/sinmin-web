<!DOCTYPE html>
<html lang="en">

<head>

    <?php require 'head.php';?>

    <style type="text/css">
        td:nth-child(3), th:nth-child(3), td:nth-child(5), th:nth-child(5), td:nth-child(7), th:nth-child(7), td:nth-child(9), th:nth-child(9), td:nth-child(11), th:nth-child(11), td:nth-child(13), th:nth-child(13){
            display: none;
        }

        th:nth-child(2), th:nth-child(4), th:nth-child(6), th:nth-child(8), th:nth-child(10), th:nth-child(12){
            cursor: pointer;
        }
    </style>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php require 'header.php' ?>
            <?php require 'sidebar.php' ?>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Statistics - Word</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-columns fa-fw"></i> Frequent
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th onclick="show_column('3')" title="Click to see the values">All
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            </th>
                                            <th>Count</th>
                                            <th onclick="show_column('5')" title="Click to see the values">Academic
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            </th>
                                            <th>Count</th>
                                            <th onclick="show_column('7')" title="Click to see the values">News
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            </th>
                                            <th>Count</th>
                                            <th onclick="show_column('9')" title="Click to see the values">Gazette
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            </th>
                                            <th>Count</th>
                                            <th onclick="show_column('11')" title="Click to see the values">Spoken
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            </th>
                                            <th>Count</th>
                                            <th onclick="show_column('13')" title="Click to see the values">Creative Writing
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            </th>
                                            <th>Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>මේ</td>
                                            <td>123442</td>
                                            <td>මේ</td>
                                            <td>53535</td>
                                            <td>මේ</td>
                                            <td>2342</td>
                                            <td>මේ</td>
                                            <td>5456</td>
                                            <td>මේ</td>
                                            <td>6464</td>
                                            <td>මේ</td>
                                            <td>65464</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>ඒ</td>
                                            <td>123442</td>
                                            <td>මේ</td>
                                            <td>53535</td>
                                            <td>ඒ</td>
                                            <td>2342</td>
                                            <td>මේ</td>
                                            <td>5456</td>
                                            <td>ඒ</td>
                                            <td>6464</td>
                                            <td>මේ</td>
                                            <td>65464</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>හා</td>
                                            <td>123442</td>
                                            <td>හා</td>
                                            <td>53535</td>
                                            <td>හා</td>
                                            <td>2342</td>
                                            <td>හා</td>
                                            <td>5456</td>
                                            <td>හා</td>
                                            <td>6464</td>
                                            <td>හා</td>
                                            <td>65464</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>ද</td>
                                            <td>123442</td>
                                            <td>හා</td>
                                            <td>53535</td>
                                            <td>ද</td>
                                            <td>2342</td>
                                            <td>හා</td>
                                            <td>5456</td>
                                            <td>ද</td>
                                            <td>6464</td>
                                            <td>ද</td>
                                            <td>65464</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>බව</td>
                                            <td>123442</td>
                                            <td>බව</td>
                                            <td>53535</td>
                                            <td>බව</td>
                                            <td>2342</td>
                                            <td>බව</td>
                                            <td>5456</td>
                                            <td>බව</td>
                                            <td>6464</td>
                                            <td>බව</td>
                                            <td>65464</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>කළ</td>
                                            <td>123442</td>
                                            <td>කළ</td>
                                            <td>53535</td>
                                            <td>කළ</td>
                                            <td>2342</td>
                                            <td>කළ</td>
                                            <td>5456</td>
                                            <td>කළ</td>
                                            <td>6464</td>
                                            <td>කළ</td>
                                            <td>65464</td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>ඇති</td>
                                            <td>123442</td>
                                            <td>ඇති</td>
                                            <td>53535</td>
                                            <td>ඇති</td>
                                            <td>2342</td>
                                            <td>ඇති</td>
                                            <td>5456</td>
                                            <td>ඇති</td>
                                            <td>6464</td>
                                            <td>ඇති</td>
                                            <td>65464</td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>සඳහා</td>
                                            <td>123442</td>
                                            <td>සඳහා</td>
                                            <td>53535</td>
                                            <td>සඳහා</td>
                                            <td>2342</td>
                                            <td>සඳහා</td>
                                            <td>5456</td>
                                            <td>සඳහා</td>
                                            <td>6464</td>
                                            <td>සඳහා</td>
                                            <td>65464</td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>කර</td>
                                            <td>123442</td>
                                            <td>කර</td>
                                            <td>53535</td>
                                            <td>කර</td>
                                            <td>2342</td>
                                            <td>කර</td>
                                            <td>5456</td>
                                            <td>කර</td>
                                            <td>6464</td>
                                            <td>කර</td>
                                            <td>65464</td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>මහතා</td>
                                            <td>123442</td>
                                            <td>මහතා</td>
                                            <td>53535</td>
                                            <td>මහතා</td>
                                            <td>2342</td>
                                            <td>මහතා</td>
                                            <td>5456</td>
                                            <td>මහතා</td>
                                            <td>6464</td>
                                            <td>මහතා</td>
                                            <td>65464</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Time & Category
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Frequency in category
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                
                                <!-- /.col-lg-4 (nested) -->
                                <div class="col-lg-12">
                                    <div id="morris-bar-chart"></div>
                                </div>
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Composition
                        </div>
                        <div class="panel-body">
                            <div id="morris-donut-chart"></div>
                            <a href="#" class="btn btn-default btn-block">View Details</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Count
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <td>Word</td>
                                            <td>5000000</td>
                                        </tr>
                                        <tr>
                                            <td>Sentences</td>
                                            <td>200000</td>
                                        </tr>
                                        <tr>
                                            <td>Articles</td>
                                            <td>100000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                    <!-- /.panel -->
                    
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

    <script type="text/javascript">
        function show_column(col){
            if($('th:nth-child('+col+')').is(':visible')){
                $('td:nth-child('+col+'),th:nth-child('+col+')').hide();
                $('th:nth-child('+(col-1)+') span i').removeClass("fa-arrow-circle-left");
                $('th:nth-child('+(col-1)+') span i').addClass("fa-arrow-circle-right");
            }else{
                $('td:nth-child('+col+'),th:nth-child('+col+')').show();
                $('th:nth-child('+(col-1)+') span i').removeClass("fa-arrow-circle-right");
                $('th:nth-child('+(col-1)+') span i').addClass("fa-arrow-circle-left");
            }
        }


        Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "News",
            value: 12000
        }, {
            label: "Academic",
            value: 30000
        }, {
            label: "Creative Writing",
            value: 20000
        }, {
            label: "Spoken",
            value: 30000
        }, {
            label: "Gazette",
            value: 20000
        }],
        resize: true
    });


        Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: 'Total',
            1: 100,
            2: 90,
            3: 75,
            4: 65,
            5: 34
        }],
        xkey: 'y',
        ykeys: ['1', '2', '3', '4', '5'],
        labels: ['මේ', 'ඒ', 'හා', 'ද', 'බව'],
        hideHover: 'auto',
        resize: true
    });


        Morris.Line({
        element: 'morris-area-chart',
        data: [{
            period: '2010',
            1: 2666,
            2: null,
            3: 2647,
            4: 2294,
            5: 2441
        }, {
            period: '2011',
            1: 2778,
            2: 2294,
            3: 2441,
            4: 2294,
            5: 2441
        }, {
            period: '2012',
            1: 4912,
            2: 1969,
            3: 2501,
            4: 5432,
            5: 7654
        }, {
            period: '2013',
            1: 3767,
            2: 3597,
            3: 5689,
            4: 6543,
            5: 9876
        }, {
            period: '2014',
            1: 6810,
            2: 1914,
            3: 2293,
            4: 4321,
            5: 5678
        }, {
            period: '2015',
            1: 5670,
            2: 4293,
            3: 1881,
            4: 2312,
            5: 7654
        }, {
            period: '2016',
            1: 4820,
            2: 3795,
            3: 1588,
            4: 1345,
            5: 3456
        }, {
            period: '2017',
            1: 15073,
            2: 5967,
            3: 5175,
            4: 2345,
            5: 7890
        }, {
            period: '2018',
            1: 10687,
            2: 4460,
            3: 2028,
            4: 1234,
            5: 7865
        }, {
            period: '2019',
            1: 8432,
            2: 5713,
            3: 1791,
            4: 2222,
            5: 3333
        }],
        xkey: 'period',
        ykeys: ['1', '2', '3', '4', '5'],
        labels: ['මේ', 'ඒ', 'හා', 'ද', 'බව'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });

// $('[data-toggle="popover"]').popover({
//     trigger: 'hover',
//         'placement': 'top'
// });

$(function () {
  $('[data-toggle="popover"]').popover()
})

    </script>
</body>

</html>
