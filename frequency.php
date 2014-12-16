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
                        <h1 class="page-header">Frequency of n-gram</h1>
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
                                <form role="form" id="myForm" onsubmit="return false;">
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                            <div class="sinmin-form-group">
                                                <label class="sinmin-label">Word</label>
                                                <input class="sinmin-form-control" id="word">
                                            </div>
                                            <div class="sinmin-form-group">
                                                <span class="pull-right"><input type="button" class="btn btn-outline btn-primary" value="Type in Singlish" onclick="type_in_singlish('word')"></span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="col-lg-6">
                                            <div class="sinmin-form-group" style="margin-top:20px">
                                                    <label  class="sinmin-label"><input type="checkbox" checked="true" id="enable-time" ></label>
                                                    <label  class="sinmin-label">Time</label>
                                                </div>
                                                <div class="sinmin-form-group">
                                                    <label class="sinmin-label">From</label>
                                                    <input class="sinmin-form-control" id="from">
                                                </div>
                                                <div class="sinmin-form-group">
                                                    <label class="sinmin-label">To</label>
                                                    <input class="sinmin-form-control" id="to">
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
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
                                                            <input class="checkbox-category" type="checkbox"  id="category-5" checked="true" style="position: absolute;">Gazette
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="col-lg-12">
                                                    <button input="submit" class="btn btn-outline btn-primary">Search</button>
                                                    <button type="reset" class="btn btn-outline btn-primary">Reset</button>
                                                </div>
                                            </div>
                                        </form>
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
    <script src="js/functions.js"></script>

    <script src="js/plugins/highcharts/highcharts.js"></script>
    <script src="js/plugins/highcharts/modules/exporting.js"></script>

    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    

    <script type="text/javascript" charset="utf-8">

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


        $('#enable-time').change(function(){
            if($('#enable-time').is(':checked')){
                document.getElementById("from").disabled = false;
                document.getElementById("to").disabled = false;
            }else{
                document.getElementById("from").disabled = true;
                document.getElementById("to").disabled = true;
            }
        });
        
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
        
        var sent_calls;
        var success_calls;
        var data_calls = [];


        $('#myForm').submit(function() {
            var word = document.getElementById("word").value;
            var from = document.getElementById("from").value;
            var to = document.getElementById("to").value;
            var offset = 0;
            var spinner;

            sent_calls = 0;
            success_calls = 0;
            data_calls = [];

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

                       
            function timestamp(date){
                var myDate=date.split("-");
                var newDate=myDate[1]+"/"+myDate[0]+"/"+myDate[2];
                return (new Date(newDate).getTime());
            }

            function plot_time() {
                if($('#flot-chart-content').is(':visible')){
                    $('#flot-chart-content').contents().remove();
                    $("#graph-panel").css("display", "none");
                    $("#table-panel").css("display", "none");
                    $('#table-content').contents().remove();
                }

                var target = document.getElementById('page-wrapper');
                spinner = new Spinner(spin_opts).spin(target);

                years = [];
                for (i = from; i <= to; i++) {
                    years[years.length] = i.toString(); 
                }
                
                ajax_call("wordFrequency", word, [], years, plot_time_draw, draw_table);
            }

            function plot_time_draw(data_received){
                var data = [];

                for (i = 0; i < data_received.length; i++) {
                    data[data.length] = [Date.UTC(data_received[i].date, 0, 1), data_received[i].frequency]
                }

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
                        }
                    },
                    tooltip: {
                            shared: true
                        },
                    legend: {
                        enabled: false
                        },

                    series: [
                        {
                            name: 'Words',
                            data: data
                            }
                            ]
                        });
            }

            function plot_category() {
                if($('#flot-chart-content').is(':visible')){
                    $('#flot-chart-content').contents().remove();
                    $("#graph-panel").css("display", "none");
                    $("#table-panel").css("display", "none");
                    $('#table-content').contents().remove();
                }

                var target = document.getElementById('page-wrapper');
                spinner = new Spinner(spin_opts).spin(target);

                var all_categories = 0;

                var categories = [];
                if($('#category-0').is(':checked')){
                    // categories[categories.length] = "All";
                    all_categories = 1;  
                }
                if($('#category-1').is(':checked')){
                    categories[categories.length] = "NEWS";  
                }
                if($('#category-2').is(':checked')){
                    categories[categories.length] = "ACADEMIC";  
                }
                if($('#category-3').is(':checked')){
                    categories[categories.length] = "CREATIVE";  
                }
                if($('#category-4').is(':checked')){
                    categories[categories.length] = "SPOKEN";  
                }
                if($('#category-5').is(':checked')){
                    categories[categories.length] = "GAZETTE";  
                }

                if(all_categories == 1){
                    ajax_call("wordFrequency", word, [], [], plot_category_draw, draw_table);
                }
                ajax_call("wordFrequency", word, categories, [], plot_category_draw, draw_table);
                
            }

            function plot_category_draw(data_received) {

                var data = [];
                var categories = [];

                for (i = 0; i < data_received.length; i++) {
                    data[data.length] = [data_received[i].frequency];
                    categories[categories.length] = [data_received[i].category]
                }

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
                        type: 'column'
                    },
                    title: {
                        text: null
                    },
                    xAxis: {
                        categories: categories
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Words'
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
                        name: 'Words',
                        data: data

                    }]
                });
            }

            function plot_time_category() {
                if($('#flot-chart-content').is(':visible')){
                    $('#flot-chart-content').contents().remove();
                    $("#graph-panel").css("display", "none");
                    $("#table-panel").css("display", "none");
                    $('#table-content').contents().remove();
                }

                var target = document.getElementById('page-wrapper');
                spinner = new Spinner(spin_opts).spin(target);

                var years = [];
                for (i = from; i <= to; i++) {
                    years[years.length] = i.toString(); 
                }


                var categories = [];
                if($('#category-0').is(':checked')){
                    ajax_call("wordFrequency", word, [], years, plot_time_category_draw, draw_table);
                }
                if($('#category-1').is(':checked')){
                    ajax_call("wordFrequency", word, ["NEWS"], years, plot_time_category_draw, draw_table);
                }
                if($('#category-2').is(':checked')){
                    ajax_call("wordFrequency", word, ["ACADEMIC"], years, plot_time_category_draw, draw_table); 
                }
                if($('#category-3').is(':checked')){
                    ajax_call("wordFrequency", word, ["CREATIVE"], years, plot_time_category_draw, draw_table); 
                }
                if($('#category-4').is(':checked')){
                    ajax_call("wordFrequency", word, ["SPOKEN"], years, plot_time_category_draw, draw_table);
                }
                if($('#category-5').is(':checked')){
                    ajax_call("wordFrequency", word, ["GAZETTE"], years, plot_time_category_draw, draw_table);
                }
            }

            function plot_time_category_draw(data_received) {
                var data = [];
                var categories = [];

                for (i = 0; i < 6; i++) {
                    categories[i] = [];
                }

                for (i = 0; i < data_received.length; i++) {
                    if(data_received[i].category == "all"){
                        categories[0][categories[0].length] = [Date.UTC(data_received[i].date, 0, 1), data_received[i].frequency]
                    }else if(data_received[i].category == "NEWS"){
                        categories[1][categories[1].length] = [Date.UTC(data_received[i].date, 0, 1), data_received[i].frequency]
                    }else if(data_received[i].category == "ACADEMIC"){
                        categories[2][categories[2].length] = [Date.UTC(data_received[i].date, 0, 1), data_received[i].frequency]
                    }else if(data_received[i].category == "CREATIVE"){
                        categories[3][categories[3].length] = [Date.UTC(data_received[i].date, 0, 1), data_received[i].frequency]
                    }else if(data_received[i].category == "SPOKEN"){
                        categories[4][categories[4].length] = [Date.UTC(data_received[i].date, 0, 1), data_received[i].frequency]
                    }else if(data_received[i].category == "GAZETTE"){
                        categories[5][categories[5].length] = [Date.UTC(data_received[i].date, 0, 1), data_received[i].frequency]
                    }
                }
                if(categories[0].length>0){
                        data[data.length] = {data:categories[0],name: "All"}
                }
                if(categories[1].length>0){
                        data[data.length] = {data:categories[1],name: "News"}
                }
                if(categories[2].length>0){
                        data[data.length] = {data:categories[2],name: "Academic"}
                }
                if(categories[3].length>0){
                        data[data.length] = {data:categories[3],name: "Creative Writing"}
                }
                if(categories[4].length>0){
                        data[data.length] = {data:categories[4],name: "Spoken"}
                }
                if(categories[5].length>0){
                        data[data.length] = {data:categories[5],name: "Gazette"}
                }

                spinner.stop();
                $("#graph-panel").css("display", "block");
                $('html, body').animate({
                    scrollTop: $("#graph-panel").offset().top
                }, 1000);

                var chart;

                if (typeof chart !== "undefined"){
                    console.log('the property is available...'); // print into console
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


            function draw_table(data_received){
                var data = [];
                var categories = [];
                var columns = [];
                var column_titles = [];
                var no_date = 0;

                for (i = 0; i < 6; i++) {
                    categories[i] = [];
                }

                for (i = 0; i < 6; i++) {
                    columns[i] = 0;
                }

                for (i = 0; i < data_received.length; i++) {
                    if(data_received[i].date == 0){
                        no_date = 1;
                    }
                    if(data_received[i].category == "all"){
                        categories[0][data_received[i].date] = data_received[i].frequency;
                        columns[0] = 1;
                    }else if(data_received[i].category == "NEWS"){
                        categories[1][data_received[i].date] = data_received[i].frequency;
                        columns[1] = 1;
                    }else if(data_received[i].category == "ACADEMIC"){
                        categories[2][data_received[i].date] = data_received[i].frequency;
                        columns[2] = 1;
                    }else if(data_received[i].category == "CREATIVE"){
                        categories[3][data_received[i].date] = data_received[i].frequency;
                        columns[3] = 1;
                    }else if(data_received[i].category == "SPOKEN"){
                        categories[4][data_received[i].date] = data_received[i].frequency;
                        columns[4] = 1;
                    }else if(data_received[i].category == "GAZETTE"){
                        categories[5][data_received[i].date] = data_received[i].frequency;
                        columns[5] = 1;
                    }
                }

                var dataSet = [];
                if(no_date == 0){
                    for (i = from; i <= to; i++) {
                        var row = [];
                        row[0] = i;
                        for(j = 0; j< categories.length; j++){
                            if(columns[j]==1){
                                row[row.length] = categories[j][i.toString()];
                            }
                        }

                        dataSet[dataSet.length] = row; 
                    }
                }else{
                    var row = [];
                    row[0] = "All";
                    for(j = 0; j< categories.length; j++){
                        if(columns[j]==1){
                            row[row.length] = categories[j][0+""];
                        }
                    }

                    dataSet[dataSet.length] = row;
                }
                
                column_titles[0] = {"title": "Year"};
                for (var i = 0; i < 6; i++) {
                    if(columns[i]==1){
                        column_titles[column_titles.length] = {"title": category_names[i]};
                    }
                };


                $('#table-content').html( '<table class="table table-striped table-bordered table-hover" border="0" id="example"></table>' );
 
                $('#example').dataTable( {
                    "data": dataSet,
                    "columns": column_titles
                } );  

                $("#table-panel").css("display", "block");
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
