<!DOCTYPE html>
<html lang="en">

<head>

    <?php require 'head.php';?>

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
                    <h1 class="page-header">Statistics</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Frequent
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Words</th>
                                            <th>Bigrams</th>
                                            <th>Trigrams</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>මේ</td>
                                            <td>ශ්‍රී ලංකා</td>
                                            <td>ජනාධිපති මහින්ද රාජපක්ෂ</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>ඒ</td>
                                            <td>වන විට</td>
                                            <td>මේ වන විට</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>හා</td>
                                            <td>ඒ නිසා</td>
                                            <td>මහින්ද රාජපක්ෂ මහතා</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>ද</td>
                                            <td>මහින්ද රාජපක්ෂ</td>
                                            <td>ශ්‍රී ලංකා ක්‍රිකට්</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>බව</td>
                                            <td>ඒ සඳහා</td>
                                            <td>එක්සත් ජනතා නිදහස්</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>කළ</td>
                                            <td>ඇති බව</td>
                                            <td>ජනාධිපති මහින්ද රාජපක්‍ෂ</td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>ඇති</td>
                                            <td>ඒ මහතා</td>
                                            <td>ශ්‍රී ලංකා නිදහස්</td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>සඳහා</td>
                                            <td>ශ්‍රී ලංකාව</td>
                                            <td>අත්අඩංගුවට ගෙන තිබේ</td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>කර</td>
                                            <td>ඒ අනුව</td>
                                            <td>ද සිල්වා මහතා</td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>මහතා</td>
                                            <td>ජනාධිපති මහින්ද</td>
                                            <td>මහතාගේ උපදෙස් මත</td>
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
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
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
                            <i class="fa fa-bar-chart-o fa-fw"></i> Bar Chart Example
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
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
                                <table class="table table-hover">
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
    </script>

    <script type="text/javascript">
        Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: '2006',
            a: 100,
            b: 90
        }, {
            y: '2007',
            a: 75,
            b: 65
        }, {
            y: '2008',
            a: 50,
            b: 40
        }, {
            y: '2009',
            a: 75,
            b: 65
        }, {
            y: '2010',
            a: 50,
            b: 40
        }, {
            y: '2011',
            a: 75,
            b: 65
        }, {
            y: '2012',
            a: 100,
            b: 90
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B'],
        hideHover: 'auto',
        resize: true
    });
    </script>

    <script type="text/javascript">
        Morris.Line({
        element: 'morris-area-chart',
        data: [{
            period: '2010',
            News: 2666,
            Academic: null,
            Creative_Writing: 2647,
            Spoken: 2294,
            Gazette: 2441
        }, {
            period: '2011',
            News: 2778,
            Academic: 2294,
            Creative_Writing: 2441,
            Spoken: 2294,
            Gazette: 2441
        }, {
            period: '2012',
            News: 4912,
            Academic: 1969,
            Creative_Writing: 2501,
            Spoken: 5432,
            Gazette: 7654
        }, {
            period: '2013',
            News: 3767,
            Academic: 3597,
            Creative_Writing: 5689,
            Spoken: 6543,
            Gazette: 9876
        }, {
            period: '2014',
            News: 6810,
            Academic: 1914,
            Creative_Writing: 2293,
            Spoken: 4321,
            Gazette: 5678
        }, {
            period: '2015',
            News: 5670,
            Academic: 4293,
            Creative_Writing: 1881,
            Spoken: 2312,
            Gazette: 7654
        }, {
            period: '2016',
            News: 4820,
            Academic: 3795,
            Creative_Writing: 1588,
            Spoken: 1345,
            Gazette: 3456
        }, {
            period: '2017',
            News: 15073,
            Academic: 5967,
            Creative_Writing: 5175,
            Spoken: 2345,
            Gazette: 7890
        }, {
            period: '2018',
            News: 10687,
            Academic: 4460,
            Creative_Writing: 2028,
            Spoken: 1234,
            Gazette: 7865
        }, {
            period: '2019',
            News: 8432,
            Academic: 5713,
            Creative_Writing: 1791,
            Spoken: 2222,
            Gazette: 3333
        }],
        xkey: 'period',
        ykeys: ['News', 'Academic', 'Creative_Writing', 'Spoken', 'Gazette'],
        labels: ['News', 'Academic', 'Creative Writing', 'Spoken', 'Gazette'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });
    </script>

</body>

</html>
