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
                        <h1 class="page-header">Blank</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form role="form" id="myForm" onsubmit="return false;">
                                            <div class="sinmin-form-group">
                                                <label class="sinmin-label">Word</label>
                                                <input class="sinmin-form-control" id="word">
                                            </div>
                                            <div class="sinmin-form-group" style="margin-top:20px">
                                                <label  class="sinmin-label"><input type="checkbox" checked="true" id="enable-time" ></label>
                                                <label  class="sinmin-label">Time</label>
                                            </div>
                                            <div class="sinmin-form-group">
                                                <table style="width:100%">
                                                    <tr>
                                                        <td style="width:50%;"><label  class="sinmin-label">From</label></td>
                                                        <td style="width:50%;padding-left:5px"><label  class="sinmin-label">To</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-right:5px"><input class="sinmin-form-control" id="from"></td>
                                                        <td style="padding-left:5px"><input class="sinmin-form-control" id="to"></td>
                                                    </tr>
                                                </table>
                                                
                                            </div>
                                            <div class="sinmin-form-group" style="margin-top:20px">
                                                <label  class="sinmin-label"><input type="checkbox" id="enable-category" checked="true" ></label>
                                                <label  class="sinmin-label">Category</label>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <div class="sinmin-checkbox">
                                                        <label>
                                                            <input class="checkbox-category" type="checkbox" id="category-0" checked="true" style="position: absolute;">All
                                                        </label>
                                                    </div>
                                                    <div class="sinmin-checkbox">
                                                        <label>
                                                            <input class="checkbox-category" type="checkbox" id="category-1" checked="true" style="position: absolute;">News
                                                        </label>
                                                    </div>
                                                    <div class="sinmin-checkbox">
                                                        <label>
                                                            <input class="checkbox-category" type="checkbox" id="category-2" checked="true" style="position: absolute;">Academic
                                                        </label>
                                                    </div>
                                                    <div class="sinmin-checkbox">
                                                        <label>
                                                            <input class="checkbox-category" type="checkbox" id="category-3" checked="true" style="position: absolute;">Creative Writing
                                                        </label>
                                                    </div>
                                                    <div class="sinmin-checkbox">
                                                        <label>
                                                            <input class="checkbox-category" type="checkbox" id="category-4" checked="true" style="position: absolute;">Spoken
                                                        </label>
                                                    </div>
                                                    <div class="sinmin-checkbox">
                                                        <label>
                                                            <input class="checkbox-category" type="checkbox"  id="category-5" checked="true" style="position: absolute;">Gezette
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <button input="submit" class="btn btn-outline btn-primary">Search</button>
                                            <button type="reset" class="btn btn-outline btn-primary">Reset</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
            </div>

            <div class="row" id="graph-panel">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading" id="panel-heading">
                                
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="flot-chart">
                                    <div class="flot-chart-content" id="flot-chart-content"></div>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                <!-- /.row -->
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

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>


    <script src="js/plugins/flot/excanvas.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.time.js"></script>
    <script src="js/plugins/flot/jquery.flot.categories.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){
        document.getElementById("graph-panel").style.display = "none";
    });
    </script>

    <script type="text/javascript">
        $('#enable-time').change(function(){
            if($('#enable-time').is(':checked')){
                document.getElementById("from").disabled = false;
                document.getElementById("to").disabled = false;
            }else{
                document.getElementById("from").disabled = true;
                document.getElementById("to").disabled = true;
            }
        });
        
    </script>

    <script type="text/javascript">
        $('#enable-category').change(function(){
            if($('#enable-category').is(':checked')){
                var categories = document.getElementsByClassName("checkbox-category");
                for (i = 0; i < categories.length; i++) {
                    categories[i].disabled=false ;
                }
            }else{
                var categories = document.getElementsByClassName("checkbox-category");

                for (i = 0; i < categories.length; i++) {
                    categories[i].disabled=true; 
                }
            }
        });
        
    </script>

    <script type="text/javascript">
        $('#myForm').submit(function() {

            document.getElementById("graph-panel").style.display = "block";
            
            var word = document.getElementById("word").value;
            var from = document.getElementById("from").value;
            var to = document.getElementById("to").value;
            var offset = 0;

            if($('#enable-category').is(':checked') && $('#enable-time').is(':checked')){
                document.getElementById("panel-heading").innerHTML = "Frequency of '"+word+"' over time and category";
                plot_time_category();
            }else if($('#enable-category').is(':checked') && !($('#enable-time').is(':checked'))){
                document.getElementById("panel-heading").innerHTML = "Frequency of '"+word+"' over category";
                plot_category();
            }else if(!($('#enable-category').is(':checked')) && $('#enable-time').is(':checked')){
                plot_time();
                document.getElementById("panel-heading").innerHTML = "Frequency of '"+word+"' over time";
            }else if(!($('#enable-category').is(':checked')) && !($('#enable-time').is(':checked'))){
                // alert("d");
            }  

            document.getElementById("graph-panel").scrollIntoView();            

            function timestamp(date){
                var myDate=date.split("-");
                var newDate=myDate[1]+"/"+myDate[0]+"/"+myDate[2];
                return (new Date(newDate).getTime());
            }

            function plot_time() {
                var data = [
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

                var plotObj = $.plot($("#flot-chart-content"), [{
                        data: data,
                        label: word
                    }],
                    options);
            }

            function plot_category() {
                var data = [
                    ["News",1000],
                    ["Academic",1500],
                    ["Creative Writing",1200],
                    ["Spoken",1800],
                    ["Gezette",1000]
                ]
                

                var options = {
                    series: {
                        bars: {
                    show: true,
                    barWidth: 0.6,
                    align: "center"
                }
                    },
                    xaxis: {
                        mode: "categories",
                        tickLength: 0
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

                var plotObj = $.plot($("#flot-chart-content"), [data],options);
            }

            function plot_time_category() {
                var data = [
                    [[timestamp("01-01-2005"),1000],
                    [timestamp("01-01-2006"),1500],
                    [timestamp("01-01-2007"),1200],
                    [timestamp("01-01-2008"),1800],
                    [timestamp("01-01-2009"),1000],
                    [timestamp("01-01-2010"),1500],
                    [timestamp("01-01-2011"),1200],
                    [timestamp("01-01-2012"),1800],
                    [timestamp("01-01-2013"),1300],
                    [timestamp("01-01-2014"),1600]],

                    [[timestamp("01-01-2005"),100],
                    [timestamp("01-01-2006"),500],
                    [timestamp("01-01-2007"),100],
                    [timestamp("01-01-2008"),800],
                    [timestamp("01-01-2009"),10],
                    [timestamp("01-01-2010"),50],
                    [timestamp("01-01-2011"),200],
                    [timestamp("01-01-2012"),100],
                    [timestamp("01-01-2013"),300],
                    [timestamp("01-01-2014"),600]],

                    [[timestamp("01-01-2005"),200],
                    [timestamp("01-01-2006"),100],
                    [timestamp("01-01-2007"),200],
                    [timestamp("01-01-2008"),400],
                    [timestamp("01-01-2009"),300],
                    [timestamp("01-01-2010"),150],
                    [timestamp("01-01-2011"),300],
                    [timestamp("01-01-2012"),100],
                    [timestamp("01-01-2013"),250],
                    [timestamp("01-01-2014"),450]],

                    [[timestamp("01-01-2005"),500],
                    [timestamp("01-01-2006"),500],
                    [timestamp("01-01-2007"),120],
                    [timestamp("01-01-2008"),180],
                    [timestamp("01-01-2009"),100],
                    [timestamp("01-01-2010"),350],
                    [timestamp("01-01-2011"),120],
                    [timestamp("01-01-2012"),180],
                    [timestamp("01-01-2013"),130],
                    [timestamp("01-01-2014"),160]],

                    [[timestamp("01-01-2005"),300],
                    [timestamp("01-01-2006"),150],
                    [timestamp("01-01-2007"),220],
                    [timestamp("01-01-2008"),280],
                    [timestamp("01-01-2009"),440],
                    [timestamp("01-01-2010"),150],
                    [timestamp("01-01-2011"),220],
                    [timestamp("01-01-2012"),800],
                    [timestamp("01-01-2013"),300],
                    [timestamp("01-01-2014"),260]],

                    [[timestamp("01-01-2005"),100],
                    [timestamp("01-01-2006"),100],
                    [timestamp("01-01-2007"),420],
                    [timestamp("01-01-2008"),800],
                    [timestamp("01-01-2009"),150],
                    [timestamp("01-01-2010"),150],
                    [timestamp("01-01-2011"),120],
                    [timestamp("01-01-2012"),380],
                    [timestamp("01-01-2013"),230],
                    [timestamp("01-01-2014"),165]]

                ]
                

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

                var points = [];

                if($('#category-0').is(':checked')){
                    points[points.length] = {data:data[0],label: "All"};  
                }
                if($('#category-1').is(':checked')){
                    points[points.length] = {data:data[1],label: "News"};  
                }
                if($('#category-2').is(':checked')){
                    points[points.length] = {data:data[2],label: "Academic"};  
                }
                if($('#category-3').is(':checked')){
                    points[points.length] = {data:data[3],label: "Creative Writing"};  
                }
                if($('#category-4').is(':checked')){
                    points[points.length] = {data:data[4],label: "Spoken"};  
                }
                if($('#category-5').is(':checked')){
                    points[points.length] = {data:data[5],label: "Gezette"};  
                }

                var plotObj = $.plot($("#flot-chart-content"), points,
                    options);
            }

            function timestamp(date){
                var myDate=date.split("-");
                var newDate=myDate[1]+"/"+myDate[0]+"/"+myDate[2];
                return (new Date(newDate).getTime());
            }
            
            
        });
    </script>

</body>

</html>
