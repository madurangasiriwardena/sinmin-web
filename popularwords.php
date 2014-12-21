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
                        <h1 class="page-header">Most popular words after n-gram</h1>
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
                                            <div class="sinmin-form-group">
                                                <span class="pull-right"><input type="button" class="btn btn-outline btn-primary" value="Type in Singlish" onclick="type_in_singlish('word')"></span>
                                                
                                            </div>
                                            <div class="sinmin-form-group" style="margin-top:20px">
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
                                            <br/>
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

            <div class="row" id="table-panel">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="table-panel-heading">
                            Data
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <div class="table-content" id="table-content"></div>
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

    <div id="light_box" class="col-lg-6">
        <form role="form" name="converter" id="converter" onsubmit="return false;">
            <div class="sinmin-form-group">
                <label class="sinmin-label">Singlish</label>
                <textarea id="box1" onkeyup="startText();" onselect="startText();" onclick="startText();" style="font-size: 12pt; width: 350px;" name="box1" rows="3"></textarea>
            </div>
            <div class="sinmin-form-group" style="margin-top:20px">
                <label class="sinmin-label">Unicode</label>
                <textarea style="font-size: 14pt; font-family: Potha, Malithi Web , Arial Unicode MS; width: 350px;" name="box2" rows="3" id="box2"></textarea>
            </div>
            <br/>
            <input type="hidden" id="input_id">
            <button input="button" onclick="copyit()" class="btn btn-outline btn-primary">Ok</button>
            <button type="reset" class="btn btn-outline btn-primary">Reset</button>
        </form>
        <a id="close_x" class="fa fa-close fa-fw close" href="#"></a>
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

    <script src="js/jquery.lightbox.js"></script>
    <script src="js/converter.js"></script>

    <script type="text/javascript">

    function type_in_singlish(input_id) {
        $("#light_box").lightbox_me({centered: true, preventScroll: true, onLoad: function() {
            $("#light_box").find("textarea:first").focus();
        }});
        $('#input_id').val(input_id);
    };

    function copyit () {
        var text = $('#box2').val();
        $("#"+$('#input_id').val()+"").val(text);
        $("#light_box").trigger('close');
    }

    $(document).ready(function(){
        $('#from').val(start_year);
        $('#to').val(end_year);
        $('#word').val(word_string);
        $("#graph-panel").css("display", "none");
        $("#table-panel").css("display", "none");
    });
        
    
        $('#myForm').submit(function() {

            document.getElementById("graph-panel").style.display = "block";
            
            var word = document.getElementById("word").value;
            var from = document.getElementById("from").value;
            var to = document.getElementById("to").value;
            var offset = 0;

            plot_popular();

            document.getElementById("graph-panel").scrollIntoView();            

            function timestamp(date){
                var myDate=date.split("-");
                var newDate=myDate[1]+"/"+myDate[0]+"/"+myDate[2];
                return (new Date(newDate).getTime());
            }

            function plot_popular() {
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

                
                points[points.length] = {data:data[0],label: word+ " එක්සත්"};
                points[points.length] = {data:data[1],label: word+ " නිදහස්"};
                points[points.length] = {data:data[2],label: word+ " ලංකා"};
                points[points.length] = {data:data[3],label: word+ " වන"};
                points[points.length] = {data:data[4],label: word+ " විට"};
                points[points.length] = {data:data[5],label: word+ " මේ"};  
                
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
