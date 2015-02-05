<!DOCTYPE html>
<html lang="en">

<head>

    <?php require 'head.php';?>

    <style type="text/css">
        /*th:nth-child(2), th:nth-child(4), th:nth-child(6), th:nth-child(8), th:nth-child(10), th:nth-child(12){
            cursor: pointer;
        }*/
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
                    <h1 class="page-header">Statistics - Bigram</h1>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" id="frequent-words-table-div">
                        <div class="panel-heading">
                            <i class="fa fa-columns fa-fw"></i> Frequent Bigrams
                        </div>
                        <div class="panel-body sinmin-panel-body">
                            <div class="table-responsive">
                                <div class="table-content" id="frequent-words-table-content"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default" id="time-div">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Frequency over years
                        </div>
                        <div class="panel-body sinmin-panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="time-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- <div class="panel panel-default">
                        <div class="panel-heading">
                            Count
                        </div>
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
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>

    <script src="js/plugins/highcharts/highcharts.js"></script>
    <script src="js/plugins/highcharts/modules/exporting.js"></script>

    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

    <link href="css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <script type="text/javascript">
        show_composition();
        show_frequent_words();
        show_word_time_category();
        show_time();

        function ajax_call(method, word, categories, years, amount, plot_func, calls, data_calls, spinner, ajax_objs, cancel_ajax, retry, div_element){
            //calls[0] = sent, calls[1] = success
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
                url: api_url,
                type: 'POST',
                data: data,
                headers: {
                    'Content-Type': "application/json",
                    Accept : "application/json",
                    'Method-Name': method
                },
                success: function (data) {
                    data = JSON.parse(data);
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

        function show_frequent_words(){
            target = document.getElementById('frequent-words-table-div');
            spinner = new Spinner(spin_opts).spin(target);
            calls = [0,0]; //calls[0] = sent, calls[1] = success
            data_calls = [];

            ajax_objs = [];

            categories = ["NEWS","ACADEMIC","CREATIVE","SPOKEN","GAZETTE"];
            ajax_call("frequentBigrams", [], [], [], 10, draw_frequent_words, calls, data_calls, spinner, ajax_objs, cancel_ajax, show_frequent_words, "frequent-words-table-content");
            ajax_call("frequentBigrams", [], ["NEWS"], [], 10, draw_frequent_words, calls, data_calls, spinner, ajax_objs, cancel_ajax, show_frequent_words, "frequent-words-table-content");
            ajax_call("frequentBigrams", [], ["ACADEMIC"], [], 10, draw_frequent_words, calls, data_calls, spinner, ajax_objs, cancel_ajax, show_frequent_words, "frequent-words-table-content");
            ajax_call("frequentBigrams", [], ["CREATIVE"], [], 10, draw_frequent_words, calls, data_calls, spinner, ajax_objs, cancel_ajax, show_frequent_words, "frequent-words-table-content");
            ajax_call("frequentBigrams", [], ["SPOKEN"], [], 10, draw_frequent_words, calls, data_calls, spinner, ajax_objs, cancel_ajax, show_frequent_words, "frequent-words-table-content");
            ajax_call("frequentBigrams", [], ["GAZETTE"], [], 10, draw_frequent_words, calls, data_calls, spinner, ajax_objs, cancel_ajax, show_frequent_words, "frequent-words-table-content");
        }

        function draw_frequent_words(data_received, spinner){
            console.log(data_received);

            data_set = [];
            column_titles = [];
            column_defs = [];
            for (i = 0; i < 10; i++) {
                var row = [];
                row[0] = i+1;
                for(j = 0; j< data_received.length; j++){
                    if(data_received[j].category == "all"){
                        if (data_received[j].value1[i] !== null && data_received[j].value2[i] !== null){
                            row[1] = (data_received[j].value1[i].value).trim()+ " " + (data_received[j].value2[i].value).trim();
                            row[2] = data_received[j].value1[i].frequency;
                        }else{
                            row[1] = "-";
                            row[2] = "-";
                        }
                    }else if(data_received[j].category == "NEWS"){
                        if (data_received[j].value1[i] !== null && data_received[j].value2[i] !== null){
                            row[3] = (data_received[j].value1[i].value).trim()+ " " + (data_received[j].value2[i].value).trim();
                            row[4] = data_received[j].value1[i].frequency;
                        }else{
                            row[3] = "-";
                            row[4] = "-";
                        }
                    }else if(data_received[j].category == "ACADEMIC"){
                        if (data_received[j].value1[i] !== null && data_received[j].value2[i] !== null){
                            row[5] = (data_received[j].value1[i].value).trim()+ " " + (data_received[j].value2[i].value).trim();
                            row[6] = data_received[j].value1[i].frequency;
                        }else{
                            row[5] = "-";
                            row[6] = "-";
                        }
                    }else if(data_received[j].category == "CREATIVE"){
                        if (data_received[j].value1[i] !== null && data_received[j].value2[i] !== null){
                            row[7] = (data_received[j].value1[i].value).trim()+ " " + (data_received[j].value2[i].value).trim();
                            row[8] = data_received[j].value1[i].frequency;
                        }else{
                            row[7] = "-";
                            row[8] = "-";
                        }
                    }else if(data_received[j].category == "SPOKEN"){
                        if (data_received[j].value1[i] !== null && data_received[j].value2[i] !== null){
                            row[9] = (data_received[j].value1[i].value).trim()+ " " + (data_received[j].value2[i].value).trim();
                            row[10] = data_received[j].value1[i].frequency;
                        }else{
                            row[9] = "-";
                            row[10] = "-";
                        }
                    }else if(data_received[j].category == "GAZETTE"){
                        if (data_received[j].value1[i] !== null && data_received[j].value2[i] !== null){
                            row[11] = (data_received[j].value1[i].value).trim()+ " " + (data_received[j].value2[i].value).trim();
                            row[12] = data_received[j].value1[i].frequency;
                        }else{
                            row[11] = "-";
                            row[12] = "-";
                        }
                    }
                }

                data_set[data_set.length] = row; 
            }


            column_titles[0] = {"title": "#"};
            column_defs[0] = {"targets": column_defs.length,"visible": true,};
            for (var i = 0; i < 6; i++) {
                column_index = column_titles.length;
                column_titles[column_index] = {"title": category_names[i]+"<span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>"};
                column_defs[column_index] = {"targets": column_defs.length,"visible": true, "orderable": false};

                column_index = column_titles.length;
                column_titles[column_index] = {"title": "Frequency"};
                column_defs[column_index] = {"targets": column_defs.length,"visible": false, "orderable": false}

            };

            spinner.stop();

            $('#frequent-words-table-content').html( '<table class="table table-striped table-bordered table-hover" border="0" id="example"></table>' );
 
            table = $('#example').DataTable( {
                "info": false,
                "paging": false,
                "data": data_set,
                "columns": column_titles,
                "columnDefs": column_defs
            } );

            $("#example").find("thead").on('click', 'th', function(){
                var col_idx =  table.column(this).index();
                console.log("colId = " + col_idx);
                if(col_idx>0 & col_idx%2==1){
                    if(table.column(col_idx+1).visible()){
                        table.column(col_idx+1).visible(false);
                        $('th:nth-child('+(col_idx+1)+') span i').removeClass("fa-arrow-circle-left");
                        $('th:nth-child('+(col_idx+1)+') span i').addClass("fa-arrow-circle-right");
                    }else{
                        table.column(col_idx+1).visible(true);
                        $('th:nth-child('+(col_idx+1)+') span i').removeClass("fa-arrow-circle-right");
                        $('th:nth-child('+(col_idx+1)+') span i').addClass("fa-arrow-circle-left");
                    }
                }
            });

            $("#table-panel").css("display", "block");
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
            ajax_call("bigramCount", [], ["NEWS"], years, 0, draw_word_time_category, calls, data_calls, spinner, ajax_objs, cancel_ajax, show_word_time_category, "words-time-category-chart");
            ajax_call("bigramCount", [], ["ACADEMIC"], years, 0, draw_word_time_category, calls, data_calls, spinner, ajax_objs, cancel_ajax, show_word_time_category, "words-time-category-chart");
            ajax_call("bigramCount", [], ["CREATIVE"], years, 0, draw_word_time_category, calls, data_calls, spinner, ajax_objs, cancel_ajax, show_word_time_category, "words-time-category-chart");
            ajax_call("bigramCount", [], ["SPOKEN"], years, 0, draw_word_time_category, calls, data_calls, spinner, ajax_objs, cancel_ajax, show_word_time_category, "words-time-category-chart");
            ajax_call("bigramCount", [], ["GAZETTE"], years, 0, draw_word_time_category, calls, data_calls, spinner, ajax_objs, cancel_ajax, show_word_time_category, "words-time-category-chart");
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
                        text: 'Bigrams'
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

            ajax_call("bigramCount", [], categories, [], 0, draw_composition, calls, data_calls, spinner, ajax_objs, cancel_ajax, show_composition, "composition-chart");
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

        function show_time() {
            target = document.getElementById('time-div');
            spinner = new Spinner(spin_opts).spin(target);
            calls = [0,0]; //calls[0] = sent, calls[1] = success
            data_calls = [];

            years = [];
            for (i = start_year; i <= end_year; i++) {
                years[years.length] = i.toString(); 
            }

            ajax_objs = [];

            ajax_call("bigramCount", [], [], years, 0, draw_time, calls, data_calls, spinner, ajax_objs, cancel_ajax, show_time, "time-chart");
            
        }


        function draw_time(data_received, spinner){
            data_set = [];
            years = [];

            for (var i = 0; i < data_received.length; i++) {
                data_set[data_set.length] = [data_received[i].count];
                years[years.length] = [data_received[i].year];
            };

            spinner.stop();
            
            $('#time-chart').highcharts({
                chart: {
                        type: 'column'
                },
                title: {
                    text: null
                },
                xAxis: {
                    categories: years
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Bigrams'
                    }
                },
                legend: {
                    enabled: false
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Bigrams',
                    data: data_set

                }]
            });
        };

$(function () {
  $('[data-toggle="popover"]').popover()
})

    </script>
</body>

</html>
