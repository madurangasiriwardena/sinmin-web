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
                        <h1 class="page-header">Wildcard Search</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <form role="form" id="myForm" onsubmit="return false;">
                                        <div class="col-lg-12">
                                            <div class="col-lg-6">
                                                <div class="sinmin-form-group">
                                                    <label class="sinmin-label">Word</label>
                                                    <input class="sinmin-form-control" name="word" id="word">
                                                </div>
                                                <div class="sinmin-form-group">
                                                    <span class="pull-right"><input type="button" class="btn btn-outline btn-primary" value="Type in Singlish" onclick="type_in_singlish('word')"></span>  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-lg-6">
                                                <p><i>Add * for a set of characters<br/>Add ? for one character</i></p>
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
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default" id="word-div">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Count over years
                            </div>
                            <div class="panel-body sinmin-panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div id="word-table"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

    <script src="js/jquery.lightbox.js"></script>
    <script src="js/converter.js"></script>

    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    
    <link href="css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <script src="js/jquery.validate.min.js"></script>

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
            $('#word').val(word_string+"*");
            $("#word-div").css("display", "none");

            $("#myForm").validate({
                rules: {
                    word: "required"
                },
                messages: {
                    word: "Enter a word to search"
                },
                submitHandler: function() {
                    submit();
                },
                success: function(label) {
                // set &nbsp; as text for IE
                    label.html("&nbsp;").addClass("checked");
                },
                highlight: function(element, errorClass) {
                    $(element).parent().next().find("." + errorClass).removeClass("checked");
                }
            });
        });

        function ajax_call(method, word, draw_table, cancel_ajax, spinner){
            data = {"value":word};

            data = JSON.stringify(data);

            ajax_obj = $.ajax({
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
                    draw_table(data, spinner)
                },
                error: function (jqXHR, textStatus, errorThrown ) {
                    if(textStatus === "error" || textStatus === "timeout" || textStatus === "parsererror"){
                        cancel_ajax(spinner);
                    }
                },
            });
        }

        function cancel_ajax(spinner){
            $('#ajaxErrorModal').modal('show');
            spinner.stop();
        }

        function submit() {
            word = document.getElementById("word").value;
            target = document.getElementById('page-wrapper');
            spinner = new Spinner(spin_opts).spin(target);

            ajax_call("wildCardSearch", word, draw_table, cancel_ajax, spinner);
        }

        function draw_table(data, spinner){
            dataSet = [];
            for (var i = 0; i < data.length; i++) {
                dataSet[dataSet.length] = [data[i].value];
            };

            column_titles = [];
            column_titles[0] = {"title": "Words"};

            $('#word-table').html( '<table class="table table-striped table-bordered table-hover" border="0" id="example"></table>' );
 
            var Table = $('#example').dataTable( {
                "data": dataSet,
                "columns": column_titles
            } );

            spinner.stop();
            $("#word-div").css("display", "block");
        }
    </script>

</body>

</html>
