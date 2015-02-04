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


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Error</h4>
                </div>
                <div class="modal-body">
                    You can search only upto trigrams.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ajaxErrorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Error</h4>
                </div>
                <div class="modal-body">
                    Error occured while connecting to server. Please try again
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="notSelectedModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Error</h4>
                </div>
                <div class="modal-body">
                    Select at least one option from time and category
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
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

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>
    <script src="js/jquery.lightbox.js"></script>
    <script src="js/converter.js"></script>
    <script src="js/functions.js"></script>

    <script src="js/plugins/highcharts/highcharts.js"></script>
    <script src="js/plugins/highcharts/modules/exporting.js"></script>

    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    
    <link href="css/plugins/dataTables.bootstrap.css" rel="stylesheet">

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

        function ajax_call(method, word, categories, years, plot_func, draw_table, calls, calls_frequency_data, calls_count_data, frequency, ajax_objs, cancel_ajax, spinner){
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
            }else if(word.length == 3){
                data["value1"] = word[0];
                data["value2"] = word[1];
                data["value3"] = word[2];
            }

            data = JSON.stringify(data);
            console.log(data);

            ajax_objs[ajax_objs.length] = $.ajax({
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
                        plot_func(calls_frequency_data, calls_count_data, spinner);
                        draw_table(calls_frequency_data, calls_count_data);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown ) {
                    if(textStatus === "error" || textStatus === "timeout" || textStatus === "parsererror"){
                        cancel_ajax(ajax_objs, spinner);
                    }
                },
            });
        }

        function decimalPlaces(number) {
          return ((+number).toFixed(20)).replace(/^-?\d*\.?|0+$/g, '').length
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

        function cancel_ajax(ajax_objs, spinner){
            for (var i = 0; i < ajax_objs.length; i++) {
                ajax_objs[i].abort();
            };
            $('#ajaxErrorModal').modal('show');
            spinner.stop();
        }


        $('#myForm').submit(function() {
            var word = document.getElementById("word").value;
            var from = document.getElementById("from").value;
            var to = document.getElementById("to").value;
            var offset = 0;
            var method_name;
            var method_count_name;

            calls = [0,0]; //calls[0] = sent, calls[1] = success
            calls_frequency_data = [];
            calls_count_data = [];
            ajax_objs = [];

            word = word.trim();
            var word_arr = word.split(' ');

            var valied_string = true;

            if(word_arr.length == 1){
                method_name = "wordFrequency";
                method_count_name = "wordCount";
            }else if(word_arr.length == 2){
                method_name = "bigramFrequency";
                method_count_name = "bigramCount";
            }else if(word_arr.length == 3){
                method_name = "trigramFrequency";
                method_count_name = "trigramCount";
            }else{
                valied_string = false;
            }

            if(valied_string){
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
                    $('#notSelectedModal').modal('show');
                }
            }else{
                $('#myModal').modal('show');
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

                target = document.getElementById('page-wrapper');
                spinner = new Spinner(spin_opts).spin(target);

                years = [];
                for (i = from; i <= to; i++) {
                    years[years.length] = i.toString(); 
                }
                
                ajax_call(method_name, word_arr, [], years, plot_time_draw, draw_table, calls, calls_frequency_data, calls_count_data, true, ajax_objs, cancel_ajax, spinner);
                ajax_call(method_count_name, [], [], years, plot_time_draw, draw_table, calls, calls_frequency_data, calls_count_data, false, ajax_objs, cancel_ajax, spinner);
            }

            function plot_time_draw(data_received, count_data_received, spinner){
                var data = [];

                for (i = 0; i < data_received.length; i++) {
                    if(count_data_received[i].count != 0){
                        temp = data_received[i].frequency/count_data_received[i].count;
                        temp = Math.round10(temp, -20);
                        data[data.length] = [Date.UTC(data_received[i].date, 0, 1), temp]
                        console.log(temp)
                    }else{
                        data[data.length] = [Date.UTC(data_received[i].date, 0, 1), 0];
                    }
                    
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
                        },
                        min: 0
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

                target = document.getElementById('page-wrapper');
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
                    ajax_call(method_name, word_arr, [], [], plot_category_draw, draw_table, calls, calls_frequency_data, calls_count_data, true, ajax_objs, cancel_ajax, spinner);
                    ajax_call(method_count_name, [], [], [], plot_category_draw, draw_table, calls, calls_frequency_data, calls_count_data, false, ajax_objs, cancel_ajax, spinner);
                }
                ajax_call(method_name, word_arr, categories, [], plot_category_draw, draw_table, calls, calls_frequency_data, calls_count_data, true, ajax_objs, cancel_ajax, spinner);
                ajax_call(method_count_name, [], categories, [], plot_category_draw, draw_table, calls, calls_frequency_data, calls_count_data, false, ajax_objs, cancel_ajax, spinner);
                
            }

            function plot_category_draw(data_received, count_data_received) {

                var data = [];
                var categories = [];

                counts = {};

                for (var i = 0; i < count_data_received.length; i++) {
                    counts[count_data_received[i].category] = count_data_received[i].count;
                };

                for (i = 0; i < data_received.length; i++) {
                    if(counts[data_received[i].category] === undefined || counts[data_received[i].category] != 0){
                        temp = data_received[i].frequency/counts[data_received[i].category];
                        temp = Math.round10(temp, -20);
                        data[data.length] = [temp];
                    }
                    else{
                        data[data.length] = [0];
                    }
                    
                    categories[categories.length] = [data_received[i].category];
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

                target = document.getElementById('page-wrapper');
                spinner = new Spinner(spin_opts).spin(target);

                var years = [];
                for (i = from; i <= to; i++) {
                    years[years.length] = i.toString(); 
                }

                if($('#category-0').is(':checked')){
                    ajax_call(method_name, word_arr, [], years, plot_time_category_draw, draw_table, calls, calls_frequency_data, calls_count_data, true, ajax_objs, cancel_ajax, spinner);
                    ajax_call(method_count_name, [], [], years, plot_time_category_draw, draw_table, calls, calls_frequency_data, calls_count_data, false, ajax_objs, cancel_ajax, spinner);
                }
                if($('#category-1').is(':checked')){
                    ajax_call(method_name, word_arr, ["NEWS"], years, plot_time_category_draw, draw_table, calls, calls_frequency_data, calls_count_data, true, ajax_objs, cancel_ajax, spinner);
                    ajax_call(method_count_name, [], ["NEWS"], years, plot_time_category_draw, draw_table, calls, calls_frequency_data, calls_count_data, false, ajax_objs, cancel_ajax, spinner);
                }
                if($('#category-2').is(':checked')){
                    ajax_call(method_name, word_arr, ["ACADEMIC"], years, plot_time_category_draw, draw_table, calls, calls_frequency_data, calls_count_data, true, ajax_objs, cancel_ajax, spinner);
                    ajax_call(method_count_name, [], ["ACADEMIC"], years, plot_time_category_draw, draw_table, calls, calls_frequency_data, calls_count_data, false, ajax_objs, cancel_ajax, spinner);
                }
                if($('#category-3').is(':checked')){
                    ajax_call(method_name, word_arr, ["CREATIVE"], years, plot_time_category_draw, draw_table, calls, calls_frequency_data, calls_count_data, true, ajax_objs, cancel_ajax, spinner);
                    ajax_call(method_count_name, [], ["CREATIVE"], years, plot_time_category_draw, draw_table, calls, calls_frequency_data, calls_count_data, false, ajax_objs, cancel_ajax, spinner);
                }
                if($('#category-4').is(':checked')){
                    ajax_call(method_name, word_arr, ["SPOKEN"], years, plot_time_category_draw, draw_table, calls, calls_frequency_data, calls_count_data, true, ajax_objs, cancel_ajax, spinner);
                    ajax_call(method_count_name, [], ["SPOKEN"], years, plot_time_category_draw, draw_table, calls, calls_frequency_data, calls_count_data, false, ajax_objs, cancel_ajax, spinner);
                }
                if($('#category-5').is(':checked')){
                    ajax_call(method_name, word_arr, ["GAZETTE"], years, plot_time_category_draw, draw_table, calls, calls_frequency_data, calls_count_data, true, ajax_objs, cancel_ajax, spinner);
                    ajax_call(method_count_name, [], ["GAZETTE"], years, plot_time_category_draw, draw_table, calls, calls_frequency_data, calls_count_data, false, ajax_objs, cancel_ajax, spinner);
                }
            }

            function plot_time_category_draw(data_received, count_data_received) {
                var data = [];
                // var categories = [];
                frequencies = {};
                counts = {};

                if($('#category-0').is(':checked')){
                    frequencies["all"] = {};
                    counts["all"] = {};
                }
                if($('#category-1').is(':checked')){
                    frequencies["NEWS"] = {};
                    counts["NEWS"] = {};
                }
                if($('#category-2').is(':checked')){
                    frequencies["ACADEMIC"] = {};
                    counts["ACADEMIC"] = {};
                }
                if($('#category-3').is(':checked')){
                    frequencies["CREATIVE"] = {};
                    counts["CREATIVE"] = {};
                }
                if($('#category-4').is(':checked')){
                    frequencies["SPOKEN"] = {};
                    counts["SPOKEN"] = {};
                }
                if($('#category-5').is(':checked')){
                    frequencies["GAZETTE"] = {};
                    counts["GAZETTE"] = {};
                }

                for(i = 0; i < data_received.length; i++) {
                    frequencies[data_received[i].category][data_received[i].date] = data_received[i].frequency;
                }

                for(i = 0; i < count_data_received.length; i++) {
                    counts[count_data_received[i].category][count_data_received[i].year] = count_data_received[i].count;
                }

                if($('#category-0').is(':checked')){
                    categories = [];

                    for(i=from;i<=to;i++){
                        if(counts["all"][i] != 0){
                            temp = frequencies["all"][i]/counts["all"][i];
                            temp = Math.round10(temp, -20);
                            categories[categories.length] = [Date.UTC(i, 0, 1), temp]
                        }else{
                            categories[categories.length] = [Date.UTC(i, 0, 1), 0];
                        }
                    }

                    data[data.length] = {data:categories,name: "All"}
                }
                if($('#category-1').is(':checked')){
                    categories = [];

                    for(i=from;i<=to;i++){
                        if(counts["NEWS"][i] != 0){
                            temp = frequencies["NEWS"][i]/counts["NEWS"][i];
                            temp = Math.round10(temp, -20);
                            categories[categories.length] = [Date.UTC(i, 0, 1), temp]
                        }else{
                            categories[categories.length] = [Date.UTC(i, 0, 1), 0];
                        }
                    }

                    data[data.length] = {data:categories,name: "News"}
                }
                if($('#category-2').is(':checked')){
                    categories = [];

                    for(i=from;i<=to;i++){
                        if(counts["ACADEMIC"][i] != 0){
                            temp = frequencies["ACADEMIC"][i]/counts["ACADEMIC"][i];
                            temp = Math.round10(temp, -20);
                            categories[categories.length] = [Date.UTC(i, 0, 1), temp]
                        }else{
                            categories[categories.length] = [Date.UTC(i, 0, 1), 0];
                        }
                    }

                    data[data.length] = {data:categories,name: "Academic"}
                }
                if($('#category-3').is(':checked')){
                    categories = [];

                    for(i=from;i<=to;i++){
                        if(counts["CREATIVE"][i] != 0){
                            temp = frequencies["CREATIVE"][i]/counts["CREATIVE"][i];
                            temp = Math.round10(temp, -20);
                            categories[categories.length] = [Date.UTC(i, 0, 1), temp]
                        }else{
                            categories[categories.length] = [Date.UTC(i, 0, 1), 0];
                        }
                    }

                    data[data.length] = {data:categories,name: "Creative Writing"}
                }
                if($('#category-4').is(':checked')){
                    categories = [];

                    for(i=from;i<=to;i++){
                        if(counts["SPOKEN"][i] != 0){
                            temp = frequencies["SPOKEN"][i]/counts["SPOKEN"][i];
                            temp = Math.round10(temp, -20);
                            categories[categories.length] = [Date.UTC(i, 0, 1), temp]
                        }else{
                            categories[categories.length] = [Date.UTC(i, 0, 1), 0];
                        }
                    }

                    data[data.length] = {data:categories,name: "Spoken"}
                }
                if($('#category-5').is(':checked')){
                    categories = [];

                    for(i=from;i<=to;i++){
                        if(counts["GAZETTE"][i] != 0){
                            temp = frequencies["GAZETTE"][i]/counts["GAZETTE"][i];
                            temp = Math.round10(temp, -20);
                            categories[categories.length] = [Date.UTC(i, 0, 1), temp];
                        }else{
                            categories[categories.length] = [Date.UTC(i, 0, 1), 0];
                        }
                    }

                    data[data.length] = {data:categories,name: "Gazette"}
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
                var categories = [];
                var columns = [];
                var column_titles = [];
                var no_date = 0;
                counts = [];

                for (i = 0; i < 6; i++) {
                    categories[i] = {};
                    counts[i] = {};
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

                for (i = 0; i < count_data_received.length; i++) {
                    if(count_data_received[i].category == "all"){
                        counts[0][count_data_received[i].year] = count_data_received[i].count;
                    }else if(count_data_received[i].category == "NEWS"){
                        counts[1][count_data_received[i].year] = count_data_received[i].count;
                    }else if(count_data_received[i].category == "ACADEMIC"){
                        counts[2][count_data_received[i].year] = count_data_received[i].count;
                    }else if(count_data_received[i].category == "CREATIVE"){
                        counts[3][count_data_received[i].year] = count_data_received[i].count;
                    }else if(count_data_received[i].category == "SPOKEN"){
                        counts[4][count_data_received[i].year] = count_data_received[i].count;
                    }else if(count_data_received[i].category == "GAZETTE"){
                        counts[5][count_data_received[i].year] = count_data_received[i].count;
                    }
                }

                var dataSet = [];
                if(no_date == 0){
                    for (i = from; i <= to; i++) {
                        var row = [];
                        row[0] = i;
                        for(j = 0; j< categories.length; j++){
                            if(columns[j]==1){
                                if(counts[j][i.toString()] != 0){
                                    temp = categories[j][i.toString()]/counts[j][i.toString()];
                                    temp = Math.round10(temp, -10);
                                    row[row.length] = temp;
                                }else{
                                    row[row.length] = 0;
                                }
                            }
                        }

                        dataSet[dataSet.length] = row; 
                    }
                }else{
                    var row = [];
                    row[0] = "All";
                    for(j = 0; j< categories.length; j++){
                        if(columns[j]==1){
                            if(counts[j][0] != 0){
                                temp = categories[j][0]/counts[j][0];
                                temp = Math.round10(temp, -10);
                                row[row.length] = temp;
                            }else{
                                row[row.length] = 0;
                            }
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
 
                var Table = $('#example').dataTable( {
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
