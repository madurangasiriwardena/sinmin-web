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
                <div class="row" id="form-panel">
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
                                                <label>From</label>
                                                <input class="form-control" id="from">
                                            </div>
                                            <div class="form-group">
                                                <label>To</label>
                                                <input class="form-control" id="to">
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
                <frame>
                    <html>
                    <head>
                    </head>
                    <body>
                        <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Line Chart Example
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="flot-chart">
                                    <div class="flot-chart-content" id="flot-line-chart"></div>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    </body>
                    </html>
                </frame>
                    
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
    var form = document.getElementById("form-panel");
    $("#graph-panel").hover(function() {
            form.css('height', '50');     
        }, function() {
            form.css('height', 'auto');     
        });  

    </script>


    <script type="text/javascript">
        $('#myForm').submit(function() {
            document.getElementById("graph-panel").style.display = "block";
            var word = document.getElementById("word").value;
            var from = document.getElementById("from").value;
            var to = document.getElementById("to").value;
            var word = word.split(',');
            console.log(word[0]);
            console.log(word[1]);
            var offset = 0;
            plot();

            function timestamp(date){
                var myDate=date.split("-");
                var newDate=myDate[1]+"/"+myDate[0]+"/"+myDate[2];
                return (new Date(newDate).getTime());
            }

            function plot() {
                var word1 = [
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
                ],
                    word2 = [
                    [timestamp("01-01-2005"),1300],
                    [timestamp("01-01-2006"),1800],
                    [timestamp("01-01-2007"),1400],
                    [timestamp("01-01-2008"),1500],
                    [timestamp("01-01-2009"),1900],
                    [timestamp("01-01-2010"),1300],
                    [timestamp("01-01-2011"),1100],
                    [timestamp("01-01-2012"),1000],
                    [timestamp("01-01-2013"),1500],
                    [timestamp("01-01-2014"),1450]
                ];
                

                var options = {
                    series: {
                        lines: {
                            show: true
                        },
                        points: {
                            show: true
                        }
                    },
                    grid: {
                        hoverable: true //IMPORTANT! this is needed for tooltip to work
                    },
                    xaxes: [{
                        mode: 'time'
                    }],
                    tooltip: true,
                    tooltipOpts: {
                        content: "'%s' of %x.1 is %y.4",
                        shifts: {
                            x: -60,
                            y: 25
                        }
                    }
                };

                var plotObj = $.plot($("#flot-line-chart"), [{
                        data: word1,
                        label: word[0]
                    }, {
                        data: word2,
                        label: word[1]
                    }],
                    options);
            }
        });
    </script>

</body>

</html>
