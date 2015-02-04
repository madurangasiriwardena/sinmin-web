<!DOCTYPE html>
<html lang="en">

    <head>
        <?php require 'head.php'; ?>
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
                            <h1 class="page-header">Compare</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <form role="form" id="myForm" onsubmit="return false;">

                                                <div class="col-lg-6">
                                                    <div class="sinmin-form-group">
                                                        <label class="sinmin-label">Word-1</label>
                                                        <input class="sinmin-form-control" id="word1">
                                                    </div>
                                                    <div class="sinmin-form-group">
                                                        <span class="pull-right"><input type="button" class="btn btn-outline btn-primary" value="Type in Singlish" onclick="type_in_singlish('word1')"></span>
                                                    </div>
                                                    <br><br>
                                                    <div class="sinmin-form-group">
                                                        <label class="sinmin-label">Within</label>
                                                        <input class="sinmin-form-control" id="within1" value="5">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="sinmin-form-group">
                                                        <label class="sinmin-label">Word-2</label>
                                                        <input class="sinmin-form-control" id="word2">
                                                    </div>
                                                    <div class="sinmin-form-group">
                                                        <span class="pull-right"><input type="button" class="btn btn-outline btn-primary" value="Type in Singlish" onclick="type_in_singlish('word2')"></span>
                                                    </div>
                                                    <br><br>
                                                    <div class="sinmin-form-group">
                                                        <label class="sinmin-label">Within</label>
                                                        <input class="sinmin-form-control" id="within2" value="5">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label  class="sinmin-label">Category</label>
                                                    <div class="sinmin-form-group">
                                                        <div class="sinmin-radio">
                                                            <label>
                                                                <input class="checkbox-category" type="radio" name="category_radio" id="category-0" value="all" checked="true" style="position: absolute;">All
                                                            </label>
                                                        </div>
                                                        <div class="sinmin-radio">
                                                            <label>
                                                                <input class="checkbox-category" type="radio" name="category_radio" id="category-1" value="NEWS" style="position: absolute;">News
                                                            </label>
                                                        </div>
                                                        <div class="sinmin-radio">
                                                            <label>
                                                                <input class="checkbox-category" type="radio" name="category_radio" id="category-2" value="ACADEMIC" style="position: absolute;">Academic
                                                            </label>
                                                        </div>
                                                        <div class="sinmin-radio">
                                                            <label>
                                                                <input class="checkbox-category" type="radio" name="category_radio" id="category-3" value="CREATIVE" style="position: absolute;">Creative Writing
                                                            </label>
                                                        </div>
                                                        <div class="sinmin-radio">
                                                            <label>
                                                                <input class="checkbox-category" type="radio" name="category_radio" id="category-4" value="SPOKEN" style="position: absolute;">Spoken
                                                            </label>
                                                        </div>
                                                        <div class="sinmin-radio">
                                                            <label>
                                                                <input class="checkbox-category" type="radio" name="category_radio" id="category-5" value="GAZETTE" style="position: absolute;">Gazette
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="sinmin-form-group">
                                                        <label class="sinmin-label">Amount</label>
                                                        <input class="sinmin-form-control" id="amount" value="20">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="sinmin-form-group">
                                                        <button input="submit" class="btn btn-outline btn-primary">Search</button>
                                                        <button type="reset" class="btn btn-outline btn-primary">Reset</button>
                                                    </div>
                                                </div>  
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="panel panel-default" id="panel-1">
                                <div class="panel-heading">
                                    Word-1
                                </div>
                                <h5 style="text-align: center"  id="word-1-title"></h5>
                                <div class="panel-body  sinmin-panel-body" id="table-1-div">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover"  id="table-1">
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel panel-default"  id="panel-2">
                                <div class="panel-heading">
                                    Word-2
                                </div>
                                <h5 style="text-align: center" id="word-2-title"></h5>
                                <div class="panel-body  sinmin-panel-body" id="table-2-div">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="table-2">
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
        </div>
    </div>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins/metisMenu/metisMenu.min.js"></script>
        <script src="js/sb-admin-2.js"></script>
        <script src="js/converter.js"></script>
        <script src="js/jquery.lightbox.js"></script>

        <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
        <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

        <script type="text/javascript" charset="utf-8">
            $(document).ready(function(){
                $('#word1').val(word_string1);
                $('#word2').val(word_string2);
                $("#panel-1").css("display", "none");
                $("#panel-2").css("display", "none");
            });

            function ajax_call(method, word, categories, years, amount, range, draw_table_func, spinner, table_id, cancel_ajax, retry, div_element){
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

                data["value"] = word

                if(amount != 0){
                    data["amount"] = amount;
                }
                if(range != 0){
                    data["range"] = range;
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
                        draw_table_func(data, spinner, table_id);
                    },
                    error: function (jqXHR, textStatus, errorThrown ) {
                        if(textStatus === "error" || textStatus === "timeout" || textStatus === "parsererror"){
                            cancel_ajax(spinner, retry, div_element);
                        }
                    },
                });
            }

            function cancel_ajax(spinner, retry, div_element){

                $('#'+div_element).html('<div class="align-center"><span class="fa fa-refresh fa-5x"></span><br/>Error while connecting to server<br/>Click to retry</div>');
                spinner.stop();
                $('#'+div_element).bind( "click", function() {
                    $('#'+div_element).unbind( "click" );
                    $('#'+div_element).html("");
                    retry();
                });
            }

            $('#myForm').submit(function() {
                word1 = $('#word1').val();
                word2 = $('#word2').val();

                $('#word-1-title').text("Word-1 (w1) : "+word1);
                $('#word-2-title').text("Word-2 (w2) : "+word2);

                $("#panel-1").css("display", "block");
                $("#panel-2").css("display", "block");

                table1_call();
                table2_call();
            });

            function table1_call(){
                word1 = $('#word1').val();
                category = $('input[name=category_radio]:checked').val();
                amount = $('#amount').val();
                within1 = $('#within1').val();

                target1 = document.getElementById('panel-1');
                spinner1 = new Spinner(spin_opts).spin(target1);
                
                method_name = [];
                method_name = "frequentWordsAroundWord";
                ajax_call(method_name, word1, [category], [], amount, within1, draw_table, spinner1, "1", cancel_ajax, table1_call, "table-1-div");
            }

            function table2_call(){
                word2 = $('#word2').val();
                category = $('input[name=category_radio]:checked').val();
                amount = $('#amount').val();
                within2 = $('#within2').val();

                target2 = document.getElementById('panel-2');
                spinner2 = new Spinner(spin_opts).spin(target2);
                
                method_name = [];
                method_name = "frequentWordsAroundWord";
                ajax_call(method_name, word2, [category], [], amount, within2, draw_table, spinner2, "2", cancel_ajax, table2_call, "table-2-div");
            }

            function draw_table(data_received, spinner, table_id){
                console.log(data_received);
                spinner.stop();

                data_set = [];

                for (i = 0; i < data_received[0].words.length; i++) {
                    var row = [];
                    row[0] = i+1;
                    row[1] = data_received[0].words[i].value;
                    row[2] = data_received[0].words[i].frequency;

                    data_set[data_set.length] = row;
                };

                column_titles = [];
                column_titles[0] = {"title": "#"};
                column_titles[1] = {"title": "Word"};
                column_titles[2] = {"title": "W"+table_id};

                var Table = $('#table-'+table_id).dataTable( {
                    "data": data_set,
                    "columns": column_titles
                } );
            }

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
            
            $('#enable-category').change(function () {
                if ($('#enable-category').is(':checked')) {
                    var categories = document.getElementsByClassName("checkbox-category");
                    for (i = 0; i < categories.length; i++) {
                        categories[i].disabled = false;
                    }
                } else {
                    var categories = document.getElementsByClassName("checkbox-category");

                    for (i = 0; i < categories.length; i++) {
                        categories[i].disabled = true;
                    }
                }
            });

        </script>

    </body>

</html>
