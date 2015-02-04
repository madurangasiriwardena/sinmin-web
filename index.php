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
                    <h1 class="page-header">Sinmin</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <a href="frequency.php">
                        <div class="panel sinmin-panel-blue">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-line-chart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div><h3>Frequency</h3></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="compare.php">
                        <div class="panel sinmin-panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-files-o fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div><h3>Compare</h3></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="popularwords.php">
                        <div class="panel sinmin-panel-gray">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-star fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div><h3>Probable</h3></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="stat.php">
                        <div class="panel sinmin-panel-purple">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-bar-chart-o fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div><h3>Statistics</h3></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default" id="words-time-category-div">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Time & Category
                        </div>
                        <div class="panel-body sinmin-panel-body">
                            <div id="words-time-category-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default" id="composition-div">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Composition
                        </div>
                        <div class="panel-body sinmin-panel-body">
                            <div id="composition-chart"></div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <script src="js/plugins/highcharts/highcharts.js"></script>
    <script src="js/plugins/highcharts/modules/exporting.js"></script>

    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

    <link href="css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <script type="text/javascript">
        show_composition();
        show_word_time_category();

        function ajax_call(method, word, categories, years, amount, plot_func, calls, data_calls, spinner, ajax_objs, cancel_ajax, retry, div_element){
            
            calls[0] = calls[0]+1;
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

            if(amount != 0){
                data["amount"] = amount;
            }

            data = JSON.stringify(data);

            ajax_objs[ajax_objs.length] = $.ajax({
                url: api_url+method,
                type: 'POST',
                data: data,
                headers: {
                    'Content-Type': "application/json",
                    Accept : "application/json"
                },
                success: function (data) {
                    data_calls.push.apply(data_calls, data);
                    calls[1] = calls[1]+1;
                    if(calls[0] == calls[1]){
                        plot_func(data_calls, spinner);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown ) {
                    if(textStatus === "error" || textStatus === "timeout" || textStatus === "parsererror"){
                        cancel_ajax(ajax_objs, spinner, retry, div_element);
                    }
                },
            });
        }

        function cancel_ajax(ajax_objs, spinner, retry, div_element){
            for (var i = 0; i < ajax_objs.length; i++) {
                ajax_objs[i].abort();
            };

            $('#'+div_element).html('<div class="align-center"><span class="fa fa-refresh fa-5x"></span><br/>Error while connecting to server<br/>Click to retry</div>');
            spinner.stop();
            $('#'+div_element).bind( "click", function() {
                $('#'+div_element).unbind( "click" );
                $('#'+div_element).html("");
                retry();
            });
        }

        function show_word_time_category(){
            target = document.getElementById('words-time-category-div');
            spinner = new Spinner(spin_opts).spin(target);
            calls = [0,0]; //calls[0] = sent, calls[1] = success
            data_calls = [];

            years = [];
            for (i = start_year; i <= end_year; i++) {
                years[years.length] = i.toString(); 
            }

            ajax_objs = [];

            // (method, word, categories, years, amount, plot_func, calls, data_calls, spinner)
            ajax_call("wordCount", [], ["NEWS"], years, 0, draw_word_time_category, calls, data_calls, spinner, ajax_objs, cancel_ajax, show_word_time_category, "words-time-category-chart");
            ajax_call("wordCount", [], ["ACADEMIC"], years, 0, draw_word_time_category, calls, data_calls, spinner, ajax_objs, cancel_ajax, show_word_time_category, "words-time-category-chart");
            ajax_call("wordCount", [], ["CREATIVE"], years, 0, draw_word_time_category, calls, data_calls, spinner, ajax_objs, cancel_ajax, show_word_time_category, "words-time-category-chart");
            ajax_call("wordCount", [], ["SPOKEN"], years, 0, draw_word_time_category, calls, data_calls, spinner, ajax_objs, cancel_ajax, show_word_time_category, "words-time-category-chart");
            ajax_call("wordCount", [], ["GAZETTE"], years, 0, draw_word_time_category, calls, data_calls, spinner, ajax_objs, cancel_ajax, show_word_time_category, "words-time-category-chart");
        }

        function draw_word_time_category(data_received, spinner){
            console.log(data_received);
            data = [];
            var categories = [];

            for (i = 0; i < 5; i++) {
                categories[i] = [];
            }

            for (i = 0; i < data_received.length; i++) {
                if(data_received[i].category == "NEWS"){
                    categories[0][categories[0].length] = [Date.UTC(data_received[i].year, 0, 1), data_received[i].count]
                }else if(data_received[i].category == "ACADEMIC"){
                    categories[1][categories[1].length] = [Date.UTC(data_received[i].year, 0, 1), data_received[i].count]
                }else if(data_received[i].category == "CREATIVE"){
                    categories[2][categories[2].length] = [Date.UTC(data_received[i].year, 0, 1), data_received[i].count]
                }else if(data_received[i].category == "SPOKEN"){
                    categories[3][categories[3].length] = [Date.UTC(data_received[i].year, 0, 1), data_received[i].count]
                }else if(data_received[i].category == "GAZETTE"){
                    categories[4][categories[4].length] = [Date.UTC(data_received[i].year, 0, 1), data_received[i].count]
                }
            }
            
            if(categories[0].length>0){
                    data[data.length] = {data:categories[0],name: "News"}
            }
            if(categories[1].length>0){
                    data[data.length] = {data:categories[1],name: "Academic"}
            }
            if(categories[2].length>0){
                    data[data.length] = {data:categories[2],name: "Creative Writing"}
            }
            if(categories[3].length>0){
                    data[data.length] = {data:categories[3],name: "Spoken"}
            }
            if(categories[4].length>0){
                    data[data.length] = {data:categories[4],name: "Gazette"}
            }

            console.log(data);

            spinner.stop();
            

            chart = $('#words-time-category-chart').highcharts({
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
                    }
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

        function show_composition() {
            target = document.getElementById('composition-div');
            spinner = new Spinner(spin_opts).spin(target);
            calls = [0,0]; //calls[0] = sent, calls[1] = success
            data_calls = [];
            categories = ["NEWS","ACADEMIC","CREATIVE","SPOKEN","GAZETTE"];

            ajax_objs = [];

            ajax_call("wordCount", [], categories, [], 0, draw_composition, calls, data_calls, spinner, ajax_objs, cancel_ajax, show_composition, "composition-chart");
            // (method, word, categories, years, amount, plot_func, calls, data_calls, spinner)
        }


        function draw_composition(data_received, spinner){
            console.log(data_received);
            data_set = [];

            for (var i = 0; i < data_received.length; i++) {
                data_set[data_set.length] = [data_received[i].category, data_received[i].count];
            };

            spinner.stop();

            // Make monochrome colors and set them as default for all pies
            Highcharts.getOptions().plotOptions.pie.colors = (function () {
                var colors = [],
                    base = Highcharts.getOptions().colors[0],
                    i;

                for (i = 0; i < 5; i += 1) {
                    // Start out with a darkened base color (negative brighten), and end
                    // up with a much brighter color
                    colors.push(Highcharts.Color(base).brighten((i - 3) / 7).get());
                }
                return colors;
            }());

            // Build the chart
            
            $('#composition-chart').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: null
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Category share',
                    data: data_set
                }]
            });
        };

    </script>

</body>

</html>
