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

    <script src="js/jquery.lightbox.js"></script>
    <script src="js/converter.js"></script>

    <script src="js/plugins/highcharts/highcharts.js"></script>
    <script src="js/plugins/highcharts/modules/exporting.js"></script>

    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <link href="css/plugins/dataTables.bootstrap.css" rel="stylesheet">

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

    var sent_calls;
        var success_calls;
        var data_calls;        
    
        $('#myForm').submit(function() {
            
            var word = document.getElementById("word").value;
            var from = document.getElementById("from").value;
            var to = document.getElementById("to").value;
            var offset = 0;

            var spinner;
            var method_name;
            var method_count_name;

            word = word.trim();
            var word_arr = word.split(' ');

            var valied_string = true;

            if(word_arr.length == 1){
                method_name = "frequentWordsAfterWordTimeRange";
                method_count_name = "bigramCount";
            }else if(word_arr.length == 2){
                method_name = "frequentWordsAfterBigramTimeRange";
                method_count_name = "trigramCount";
            }else{
                valied_string = false;
            }

            document.getElementById("panel-heading").innerHTML = "Most popular words after '"+word+"'";
            plot_popular();

            function plot_popular() {
                if($('#flot-chart-content').is(':visible')){
                    $('#flot-chart-content').contents().remove();
                    $("#graph-panel").css("display", "none");
                    $("#table-panel").css("display", "none");
                    $('#table-content').contents().remove();
                }

                var target = document.getElementById('page-wrapper');
                spinner = new Spinner(spin_opts).spin(target);

                years = [];
                years[years.length] = from;
                years[years.length] = to;

                years_count = [];
                for (i = from; i <= to; i++) {
                    years_count[years_count.length] = i.toString(); 
                }

                calls = [0,0]; //calls[0] = sent, calls[1] = success
                calls_frequency_data = [];
                calls_count_data = [];
                
                ajax_call(method_name, word_arr, [], years, plot_popular_draw, draw_table, calls, calls_frequency_data, calls_count_data, true);
                ajax_call(method_count_name, [], [], years_count, plot_popular_draw, draw_table, calls, calls_frequency_data, calls_count_data, false);
                // ajax_call(method, word, categories, years, plot_func, draw_table, calls, calls_frequency_data, calls_count_data, frequency)
            }

            function plot_popular_draw(data_received, count_data_received){
                data = [];
                words = [];
                word_frequency = {};
                word_frequency_available = {}; 
                word_count = {};

                for (var i = 0; i < count_data_received.length; i++) {
                    word_count[count_data_received[i].year] = count_data_received[i].count;
                };
                console.log(word_count);

                for (i = 0; i < data_received[0].words.length; i++) {
                    word_temp = data_received[0].words[i].word;
                    word_temp = word_temp.trim();

                    if (typeof word_frequency[word_temp] === "undefined"){
                        words[words.length] = word_temp;
                        word_frequency[word_temp] = [];
                        word_frequency_available[word_temp] = {};
                    }
                    if(word_count[data_received[0].words[i].year] > 0){
                        temp = data_received[0].words[i].frequency/word_count[data_received[0].words[i].year];
                    }else{
                        temp = 0;
                    }
                    temp = Math.round10(temp, -20);
                    word_frequency[word_temp][word_frequency[word_temp].length] = [Date.UTC(data_received[0].words[i].year, 0, 1), temp];
                    word_frequency_available[word_temp][(data_received[0].words[i].year).toString()] = true;
                }

                for (var i = 0; i < words.length; i++) {
                    for (var j = from; j <= to; j++) {
                        if (typeof word_frequency_available[words[i]][j.toString()] === "undefined"){
                            word_frequency[words[i]][word_frequency[words[i]].length] = [Date.UTC(j, 0, 1), 0]
                        }
                    };

                    word_frequency[words[i]].sort(function(a, b){return a[0]-b[0]})
                };

                for (var i = 0; i < words.length; i++) {
                    data[data.length] = {data:word_frequency[words[i]],name: words[i]}
                };

                spinner.stop();
                $("#graph-panel").css("display", "block");
                $('html, body').animate({
                    scrollTop: $("#graph-panel").offset().top
                }, 1000); 

                var chart;

                if (typeof chart !== "undefined"){
                    while(chart.series.length > 0)
                    chart.series[0].remove(true);
                }
                 
                chart = $('#flot-chart-content').highcharts({
                    chart: {
                        zoomType: 'x',
                        type: 'spline'
                    },
                    title: {
                        text: null
                    },
                    subtitle: {
                        text: document.ontouchstart === undefined ?
                                'Click and drag in the plot area to zoom in' :
                                'Pinch the chart to zoom in'
                    },
                    xAxis: {
                        type: 'datetime',
                        labels:
                            {
                                formatter: function () {
                                    return Highcharts.dateFormat("%Y", this.value);
                                }
                            },
                            tickInterval: Date.UTC(2010, 0, 1) - Date.UTC(2009, 0, 1)
                    },
                    yAxis: {
                        title: {
                            text: 'Words'
                        },
                        min: 0
                    },
                    tooltip: {
                            shared: true
                        },
                    legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom',
                            borderWidth: 0
                        },
                    plotOptions: {
                        area: {
                            fillColor: {
                                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1},
                                stops: [
                                    [0, Highcharts.getOptions().colors[0]],
                                    [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                                ]
                            },
                            marker: {
                                radius: 2
                            },
                            lineWidth: 1,
                            states: {
                                hover: {
                                    lineWidth: 1
                                }
                            },
                            threshold: null
                        }
                    },

                    series: data
                });
            }

            function draw_table(data_received, count_data_received){
                data = [];
                words = [];
                word_frequency = [];
                word_frequency_available = []; 
                column_titles = [];
                word_count = {};

                for (var i = 0; i < count_data_received.length; i++) {
                    word_count[count_data_received[i].year] = count_data_received[i].count;
                };

                for (i = 0; i < data_received[0].words.length; i++) {
                    word_temp = data_received[0].words[i].word;
                    word_temp = word_temp.trim();

                    if (typeof word_frequency[word_temp] === "undefined"){
                        words[words.length] = word_temp;
                        word_frequency[word_temp] = {};
                        word_frequency_available[word_temp] = {};
                    }
                    if(word_count[data_received[0].words[i].year] > 0){
                        temp = data_received[0].words[i].frequency/word_count[data_received[0].words[i].year];
                    }else{
                        temp = 0;
                    }
                    temp = Math.round10(temp, -10);
                    word_frequency[word_temp][(data_received[0].words[i].year).toString()] = temp;
                    word_frequency_available[word_temp][(data_received[0].words[i].year).toString()] = true;
                }

                for (var i = 0; i < words.length; i++) {
                    for (var j = from; j <= to; j++) {
                        if (typeof word_frequency_available[words[i]][j.toString()] === "undefined"){
                            word_frequency[words[i]][j.toString()] = 0;
                        }
                    };
                };

                var dataSet = [];
                for (i = from; i <= to; i++) {
                    var row = [];
                    row[0] = i;
                    for(j = 0; j< words.length; j++){
                        row[row.length] = word_frequency[words[j]][i.toString()];
                    }

                    dataSet[dataSet.length] = row; 
                }
                
                column_titles[0] = {"title": "Year"};
                for (var i = 0; i < 10; i++) {
                    column_titles[column_titles.length] = {"title": words[i]};
                };


                $('#table-content').html( '<table class="table table-striped table-bordered table-hover" border="0" id="example"></table>' );
 
                $('#example').dataTable( {
                    "data": dataSet,
                    "columns": column_titles
                } );  

                $("#table-panel").css("display", "block");
            }

            (function(){

                /**
                 * Decimal adjustment of a number.
                 *
                 * @param   {String}    type    The type of adjustment.
                 * @param   {Number}    value   The number.
                 * @param   {Integer}   exp     The exponent (the 10 logarithm of the adjustment base).
                 * @returns {Number}            The adjusted value.
                 */
                function decimalAdjust(type, value, exp) {
                    // If the exp is undefined or zero...
                    if (typeof exp === 'undefined' || +exp === 0) {
                        return Math[type](value);
                    }
                    value = +value;
                    exp = +exp;
                    // If the value is not a number or the exp is not an integer...
                    if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
                        return NaN;
                    }
                    // Shift
                    value = value.toString().split('e');
                    value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
                    // Shift back
                    value = value.toString().split('e');
                    return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
                }

                // Decimal round
                if (!Math.round10) {
                    Math.round10 = function(value, exp) {
                        return decimalAdjust('round', value, exp);
                    };
                }
                // Decimal floor
                if (!Math.floor10) {
                    Math.floor10 = function(value, exp) {
                        return decimalAdjust('floor', value, exp);
                    };
                }
                // Decimal ceil
                if (!Math.ceil10) {
                    Math.ceil10 = function(value, exp) {
                        return decimalAdjust('ceil', value, exp);
                    };
                }

            })();


            function ajax_call(method, word, categories, years, plot_func, draw_table, calls, calls_frequency_data, calls_count_data, frequency){
                //calls[0] = sent, calls[1] = success
                calls[0] = calls[0]+1;
                console.log(calls[0]);
                var data;
                if(categories.length==0 & years.length!=0){
                    data = {"time":years}
                }else if(years.length==0 & categories.length!=0){
                    data = {"category":categories}
                }else if(years.length==0 & categories.length==0){
                    data = {}
                }else{
                    data = {"time":years, "category":categories}
                }

                if(word.length == 1){
                    data["value"] = word[0];
                }else if(word.length == 2){
                    data["value1"] = word[0];
                    data["value2"] = word[1];
                }

                if(frequency){
                    data["amount"] = 10;
                }

                data = JSON.stringify(data);

                $.ajax({
                    url: api_url+method,
                    type: 'POST',
                    data: data,
                    headers: {
                        'Content-Type': "application/json",
                        Accept : "application/json"
                    },
                    success: function (data) {
                        if(frequency){
                            calls_frequency_data.push.apply(calls_frequency_data, data);
                        }else{
                            calls_count_data.push.apply(calls_count_data, data);
                        }
                        calls[1] = calls[1]+1;
                        console.log(calls[0] + " " + calls[1]);
                        if(calls[0] == calls[1]){
                            plot_func(calls_frequency_data, calls_count_data);
                            draw_table(calls_frequency_data, calls_count_data);
                        }
                    },
                    error: function (data) { console.log(data)},
                });
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
