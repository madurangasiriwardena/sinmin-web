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

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Word Frequency</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form role="form" id="myForm" onsubmit="return false;">
                                            <div class="form-group">
                                                <label>Word</label>
                                                <input class="form-control" id="word">
                                            </div>
                                            <div class="form-group">

                                            <label>Checkboxes</label>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="" checked="true">All
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="" checked="true">News
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="" checked="true">Academic
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="" checked="true">Creative Writing
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="" checked="true">Spoken
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="" checked="true"  >Gezette
                                                    </label>
                                                </div>
                                                
                                            </div>
                                            <button input="submit" class="btn btn-default">Submit Button</button>
                                            <button type="reset" class="btn btn-default">Reset Button</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                <!-- /.row -->
                </div>
                <div class="row" id="graph-panel">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Line Chart Example
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="flot-chart">
                                    <div class="flot-chart-content" id="flot-bar-chart"></div>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                <!-- /.row -->
                </div>
            </div>
            <!-- /.container-fluid -->
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


    <script src="js/plugins/flot/excanvas.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){
        document.getElementById("graph-panel").style.display = "none";
    });
    </script>


    <script type="text/javascript">
        $('#myForm').submit(function() {
            document.getElementById("graph-panel").style.display = "block";
            function timestamp(date){
                var myDate=date.split("-");
                var newDate=myDate[1]+"/"+myDate[0]+"/"+myDate[2];
                return (new Date(newDate).getTime());
            }
            var barOptions = {
                series: {
                    bars: {
                        show: true,
                        barWidth: 9000000000
                    }
                },
                xaxis: {
                    mode: "time"
                },
                grid: {
                    hoverable: true
                },
                legend: {
                    show: false
                },
                tooltip: true,
                tooltipOpts: {
                    content: "year: %x, frequency: %y"
                }
            };
            var barData = {
                label: "bar",
                data : [
                    [timestamp("01-01-2005"),1000],
                    [timestamp("01-01-2006"),1500],
                    [timestamp("01-01-2007"),1200],
                    [timestamp("01-01-2008"),1800],
                    [timestamp("01-01-2009"),1000],
                    [timestamp("01-01-2010"),1500],
                    [timestamp("01-01-2011"),1200],
                    [timestamp("01-01-2012"),1800],
                    [timestamp("01-01-2013"),1300],
                    [timestamp("01-01-2014"),1600]
                ]
            };
            $.plot($("#flot-bar-chart"), [barData], barOptions);
        });
    </script>

</body>

</html>
