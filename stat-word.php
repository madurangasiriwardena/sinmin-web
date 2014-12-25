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
                    <h1 class="page-header">Statistics - Word</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-columns fa-fw"></i> Frequent
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <div class="table-content" id="frequent-words-table-content"></div>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Time & Category
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
                            <i class="fa fa-bar-chart-o fa-fw"></i> Frequency in category
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
                            <div id="composition-chart"></div>
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

    <script src="js/plugins/highcharts/highcharts.js"></script>
    <script src="js/plugins/highcharts/modules/exporting.js"></script>

    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

    <script type="text/javascript">
        show_composition();
        show_frequent_words();

        function show_column(col){
            if($('th:nth-child('+col+')').is(':visible')){
                $('td:nth-child('+col+'),th:nth-child('+col+')').hide();
                $('th:nth-child('+(col-1)+') span i').removeClass("fa-arrow-circle-left");
                $('th:nth-child('+(col-1)+') span i').addClass("fa-arrow-circle-right");
            }else{
                $('td:nth-child('+col+'),th:nth-child('+col+')').show();
                $('th:nth-child('+(col-1)+') span i').removeClass("fa-arrow-circle-right");
                $('th:nth-child('+(col-1)+') span i').addClass("fa-arrow-circle-left");
            }
        }

        function ajax_call(method, word, categories, years, amount, plot_func, calls, data_calls){
            //calls[0] = sent, calls[1] = success
            calls[0] = calls[0]+1;
            console.log("---------calls" + calls[0])
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

            if(amount != 0){
                data["amount"] = amount;
            }

            data = JSON.stringify(data);
            console.log(data);

            $.ajax({
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
                        plot_func(data_calls);
                    }
                },
                error: function (data) { console.log(data)},
            });
        }

        function show_frequent_words(){
            calls = [0,0]; //calls[0] = sent, calls[1] = success
            data_calls = [];
            categories = ["NEWS","ACADEMIC","CREATIVE","SPOKEN","GAZETTE"];
            ajax_call("frequentWords", [], [], [], 10, draw_frequent_words, calls, data_calls);
            ajax_call("frequentWords", [], ["NEWS"], [], 10, draw_frequent_words, calls, data_calls);
            ajax_call("frequentWords", [], ["ACADEMIC"], [], 10, draw_frequent_words, calls, data_calls);
            ajax_call("frequentWords", [], ["CREATIVE"], [], 10, draw_frequent_words, calls, data_calls);
            ajax_call("frequentWords", [], ["SPOKEN"], [], 10, draw_frequent_words, calls, data_calls);
            ajax_call("frequentWords", [], ["GAZETTE"], [], 10, draw_frequent_words, calls, data_calls);
        }

        function draw_frequent_words(data_received){
            console.log(data_received);

            data_set = [];
            column_titles = [];
            column_defs = [];
            for (i = 0; i < 10; i++) {
                console.log("-----------------row " + i)
                var row = [];
                row[0] = i+1;
                for(j = 0; j< data_received.length; j++){
                    console.log("category " + j)
                    if(data_received[j].category == "all"){
                        if (data_received[j].value1[i] !== null){
                            row[1] = (data_received[j].value1[i].value).trim();
                            row[2] = data_received[j].value1[i].frequency;
                        }else{
                            row[1] = "-";
                            row[2] = "-";
                        }
                    }else if(data_received[j].category == "NEWS"){
                        if (data_received[j].value1[i] !== null){
                            row[3] = (data_received[j].value1[i].value).trim();
                            row[4] = data_received[j].value1[i].frequency;
                        }else{
                            row[3] = "-";
                            row[4] = "-";
                        }
                    }else if(data_received[j].category == "ACADEMIC"){
                        if (data_received[j].value1[i] !== null){
                            row[5] = (data_received[j].value1[i].value).trim();
                            row[6] = data_received[j].value1[i].frequency;
                        }else{
                            row[5] = "-";
                            row[6] = "-";
                        }
                    }else if(data_received[j].category == "CREATIVE"){
                        if (data_received[j].value1[i] !== null){
                            row[7] = (data_received[j].value1[i].value).trim();
                            row[8] = data_received[j].value1[i].frequency;
                        }else{
                            row[7] = "-";
                            row[8] = "-";
                        }
                    }else if(data_received[j].category == "SPOKEN"){
                        if (data_received[j].value1[i] !== null){
                            row[9] = (data_received[j].value1[i].value).trim();
                            row[10] = data_received[j].value1[i].frequency;
                        }else{
                            row[9] = "-";
                            row[10] = "-";
                        }
                    }else if(data_received[j].category == "GAZETTE"){
                        if (data_received[j].value1[i] !== null){
                            row[11] = (data_received[j].value1[i].value).trim();
                            row[12] = data_received[j].value1[i].frequency;
                        }else{
                            row[11] = "-";
                            row[12] = "-";
                        }
                    }
                }

                data_set[data_set.length] = row; 
            }

            console.log(data_set);

            column_titles[0] = {"title": "#"};
            column_defs[0] = {"targets": column_defs.length,"visible": true,};
            for (var i = 0; i < 6; i++) {
                column_index = column_titles.length;
                column_titles[column_index] = {"title": category_names[i]};
                column_defs[column_index] = {"targets": column_defs.length,"visible": true, "orderable": false};

                column_index = column_titles.length;
                column_titles[column_index] = {"title": "Frequency"};
                column_defs[column_index] = {"targets": column_defs.length,"visible": true, "orderable": false}

            };
            console.log(column_titles);

            $('#frequent-words-table-content').html( '<table class="table table-striped table-bordered table-hover" border="0" id="example"></table>' );
 
            var table = $('#example').dataTable( {
                "data": data_set,
                "columns": column_titles,
                "columnDefs": column_defs
            } );

            // $('#example thead').on( 'click', 'th', function () {         
            //     alert( 'Column title clicked on: ');
            // } );

            $("#table-panel").css("display", "block");
        }

        

        function show_composition() {
            // ajax_call(method, word, categories, years, plot_func);
        }


        function draw_composition() {

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
                console.log(colors);
                return colors;
            }());

            // Build the chart
            
            $('#composition-chart').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: 0,
                    plotShadow: false
                },
                title: {
                    text: 'Category<br>shares',
                    align: 'center',
                    verticalAlign: 'middle',
                    y: 0
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        dataLabels: {
                            enabled: true,
                            distance: -50,
                            style: {
                                fontWeight: 'bold',
                                color: 'white',
                                textShadow: '0px 1px 2px black'
                            }
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Browser share',
                    innerSize: '50%',
                    data: [
                        ['Firefox',   45.0],
                        ['IE',       26.8],
                        ['Chrome', 12.8],
                        ['Safari',    8.5],
                        ['Opera',     6.2],
                        {
                            name: 'Others',
                            y: 0.7,
                            dataLabels: {
                                enabled: false
                            }
                        }
                    ]
                }]
            });
        };


        Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: 'Total',
            1: 100,
            2: 90,
            3: 75,
            4: 65,
            5: 34
        }],
        xkey: 'y',
        ykeys: ['1', '2', '3', '4', '5'],
        labels: ['මේ', 'ඒ', 'හා', 'ද', 'බව'],
        hideHover: 'auto',
        resize: true
    });


        Morris.Line({
        element: 'morris-area-chart',
        data: [{
            period: '2010',
            1: 2666,
            2: null,
            3: 2647,
            4: 2294,
            5: 2441
        }, {
            period: '2011',
            1: 2778,
            2: 2294,
            3: 2441,
            4: 2294,
            5: 2441
        }, {
            period: '2012',
            1: 4912,
            2: 1969,
            3: 2501,
            4: 5432,
            5: 7654
        }, {
            period: '2013',
            1: 3767,
            2: 3597,
            3: 5689,
            4: 6543,
            5: 9876
        }, {
            period: '2014',
            1: 6810,
            2: 1914,
            3: 2293,
            4: 4321,
            5: 5678
        }, {
            period: '2015',
            1: 5670,
            2: 4293,
            3: 1881,
            4: 2312,
            5: 7654
        }, {
            period: '2016',
            1: 4820,
            2: 3795,
            3: 1588,
            4: 1345,
            5: 3456
        }, {
            period: '2017',
            1: 15073,
            2: 5967,
            3: 5175,
            4: 2345,
            5: 7890
        }, {
            period: '2018',
            1: 10687,
            2: 4460,
            3: 2028,
            4: 1234,
            5: 7865
        }, {
            period: '2019',
            1: 8432,
            2: 5713,
            3: 1791,
            4: 2222,
            5: 3333
        }],
        xkey: 'period',
        ykeys: ['1', '2', '3', '4', '5'],
        labels: ['මේ', 'ඒ', 'හා', 'ද', 'බව'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });

// $('[data-toggle="popover"]').popover({
//     trigger: 'hover',
//         'placement': 'top'
// });

$(function () {
  $('[data-toggle="popover"]').popover()
})

    </script>
</body>

</html>
