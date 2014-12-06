<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'head.php';?>

    <style type="text/css">
        @font-face {
            font-family: Potha;
            src: url(POTHA0.eot);
        }
        .english{
            color: purple;
        }
        .sinhala{
            font-family: Iskoola Pota;
            color: navy;
        }
        .title{
            font-familiy:Arial;
            font-weight:bold;
            color:navy;
        }
        .title2{
            font-familiy:Arial;
            font-weight:bold;
        }
        .link{
            font-weight: bold;
            color: green;
            border-width: 1px;
            border-style:solid;
            border-color: green;
            cursor:hand;
        }
    </style>

    <script src="js/converter.js"></script>

    <script language="JavaScript" type="text/javascript">
function copyit() {
    $('#box2').select();
}

var isIe = (navigator.userAgent.toLowerCase().indexOf("msie") != -1 
           || navigator.userAgent.toLowerCase().indexOf("trident") != -1);

document.addEventListener('copy', function(e) {
    var textToPutOnClipboard = $('#box2').val();;
    if (isIe) {
        window.clipboardData.setData('Text', textToPutOnClipboard);    
    } else {
        e.clipboardData.setData('text/plain', textToPutOnClipboard);
    }
    e.preventDefault();
});

var schemeVisible = 0;
function changeVisibility(){
    if (schemeVisible){
        document.getElementById('scheme').style.visibility='hidden';
        document.getElementById('link').innerHTML="&nbsp;Show Transliteration Scheme&nbsp;";
        schemeVisible=0;
    }
    else{
        document.getElementById('scheme').style.visibility='visible';
        document.getElementById('link').innerHTML="&nbsp;&nbsp;Hide Transliteration Scheme&nbsp;";
        schemeVisible=1;
    }
}
//  End -->

    </script>

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
                        <h1 class="page-header">Unicode converter</h1>
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
                                        <form role="form" name="converter" id="converter" onsubmit="return false;">
                                            <div class="sinmin-form-group">
                                                <label class="sinmin-label">Singlish</label>
                                                <textarea id="box1" onkeyup="startText();" onselect="startText();" onclick="startText();" style="font-size: 12pt; width: 600px;" name="box1" rows="7"></textarea>
                                            </div>
                                            <div class="sinmin-form-group" style="margin-top:20px">
                                                <label class="sinmin-label">Unicode</label>
                                                <textarea style="font-size: 14pt; font-family: Potha, Malithi Web , Arial Unicode MS; width: 600px;" name="box2" rows="7" id="box2"></textarea>
                            <!-- <input type="reset" value="Reset" style="position: relative; left: 500px; width: 100px;" /> -->
                                                <!-- <input onclick="copyit('txtBox.box2')" type="button" value="Copy" style="position: relative; left: 500px; width: 100px;" /> -->
                                            </div>
                                            <br/>
                                            <button input="button" onclick="copyit()" class="btn btn-outline btn-primary">Select</button>
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
                <div class="row">
                        <div class="col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa">Vowel Sounds</i> 
                                </div>
                                <div class="panel-body">
                                        <div  class="col-lg-5">
                                            <table class="table table-bordered table-hover">
                                            <tr>
                                                <td colspan="3" >Short</td>
                                            </tr>
                                             
                                            <tr>
                                                <td>&#3461;</td>
                                                <td>a</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>&#3463;</td>
                                                <td>A</td>
                                                <td>\a</td>
                                            </tr>
                                            <tr>
                                                <td>&#3465;</td>
                                                <td>i</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>&#3473;</td>
                                                <td>e</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&#3476;</td>
                                                <td>o</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&#3467;</td>
                                                <td>u</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </table>
                                        </div>

                                        <div  class="col-lg-6">
                                        <table class="table table-bordered table-hover">
                                            <tr>
                                                <td colspan="5">Long</td>
                                            </tr>
                                            <tr>
                                                <td>&#3462;</td>
                                                <td>aa</td>
                                                <td>a)</td>
                                                <td>&nbsp;</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>&#3464;</td>
                                                <td>Aa</td>
                                                <td>A)</td>
                                                <td>ae</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&#3466;</td>
                                                <td>ii</td>
                                                <td>i)</td>
                                                <td>ie</td>
                                                <td>ee</td>
                                            </tr>
                                            <tr>
                                                <td>&#3474;</td>
                                                <td>ea</td>
                                                <td>e)</td>
                                                <td>ei</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&#3477;</td>
                                                <td>oe</td>
                                                <td>o)</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&#3468;</td>
                                                <td>uu</td>
                                                <td>u)</td>
                                                <td>oo</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&#3478;</td>
                                                <td>au</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </table>
                                        </div>
                                </div>
                            </div>
                            
                        </div>

                        
                        <div class="col-lg-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-fw">Consonants</i> 
                                </div>
                                <div class="panel-body">
                                    <div  class="col-lg-5">
                                        <table class="table table-bordered table-hover">
                                            <tr>
                                                <td colspan="5">Common</td>
                                            </tr>
                                            <tr>
                                                <td>&#3482;</td>
                                                <td>k</td>
                                                <td>&#3510;</td>
                                                <td>b</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>&#3484;</td>
                                                <td>g</td>
                                                <td>&#3512;</td>
                                                <td>m</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&#3488;</td>
                                                <td>ch</td>
                                                <td>&#3514;</td>
                                                <td>y</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&#3490;</td>
                                                <td>j</td>
                                                <td>&#3515;</td>
                                                <td>r</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&#3495;</td>
                                                <td>t</td>
                                                <td>&#3517;</td>
                                                <td>l</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&#3497;</td>
                                                <td>d</td>
                                                <td>&#3520;</td>
                                                <td>w</td>
                                                <td>v</td>
                                            </tr>
                                            <tr>
                                                <td>&#3501;</td>
                                                <td>th</td>
                                                <td>&#3523;</td>
                                                <td>s</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&#3503;</td>
                                                <td>dh</td>
                                                <td>&#3524;</td>
                                                <td>h</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>&#3505;</td>
                                                <td>n</td>
                                                <td>&#3499;</td>
                                                <td>N</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>&#3508;</td>
                                                <td>p</td>
                                                <td>&#3525;</td>
                                                <td>L</td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div  class="col-lg-3">
                                        <table class="table table-bordered table-hover">
                                            <tr>
                                                <td colspan="3">Aspirated</td>
                                            </tr>
                                            <tr>
                                                <td>&#3483;</td>
                                                <td>kh</td>
                                                <td>K</td>
                                            </tr>
                                            <tr>
                                                <td>&#3485;</td>
                                                <td>gh</td>
                                                <td>G</td>
                                            </tr>
                                            <tr>
                                                <td>&#3489;</td>
                                                <td>Ch</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&#3496;</td>
                                                <td>&nbsp;</td>
                                                <td>T</td>
                                            </tr>
                                            <tr>
                                                <td>&#3498;</td>
                                                <td>&nbsp;</td>
                                                <td>D</td>
                                            </tr>
                                            <tr>
                                                <td>&#3502;</td>
                                                <td>Th</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>&#3504;</td>
                                                <td>Dh</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&#3509;</td>
                                                <td>ph</td>
                                                <td>P</td>
                                            </tr>
                                            <tr>
                                                <td>&#3511;</td>
                                                <td>bh</td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div  class="col-lg-2">
                                        <table class="table table-bordered table-hover">
                                            <tr>
                                                <td colspan="2">Special</td>
                                            </tr>
                                            <tr>
                                                <td>&#3513;</td>
                                                <td>B</td>
                                            </tr>
                                            <tr>
                                                <td>&#3521;</td>
                                                <td>sh</td>
                                            </tr>
                                            <tr>
                                                <td>&#3522;</td>
                                                <td>Sh</td>
                                            </tr>
                                            <tr>
                                                <td>&#3526;</td>
                                                <td>f</td>
                                            </tr>
                                            <tr>
                                                <td>&#3493;</td>
                                                <td>GN</td>
                                            </tr>
                                            <tr>
                                                <td>&#3492;</td>
                                                <td>KN</td>
                                            </tr>
                                            <tr>
                                                <td>&#3491;</td>
                                                <td>q</td>
                                            </tr>
                                            <tr>
                                                <td>&#3525;&#3540;</td>
                                                <td>Lu</td>
                                            </tr>
                                            <tr>
                                                <td>&#3525;&#3542;</td>
                                                <td>Luu</td>
                                            </tr>
                                            <tr>
                                        </table>
                                    </div>
                                    <div  class="col-lg-2">
                                        <table class="table table-bordered table-hover">
                                            <tr>
                                                <td colspan="2">Standalone</td>
                                            </tr>
                                            <tr>
                                                <td>&#3458;</td>
                                                <td>\n</td>
                                            </tr>
                                            <tr>
                                                <td>&#3459;</td>
                                                <td>\h</td>
                                            </tr>
                                            <tr>
                                                <td>&#3500;</td>
                                                <td>\N</td>
                                            </tr>
                                            <tr>
                                                <td>&#3469;</td>
                                                <td>\R</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                        <div class="row">
                            <div class="col-lg-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa">Auxiliaries</i> 
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <tr>
                                                <td colspan="4">Special Auxiliaries</td>
                                            </tr>
                                            <tr>
                                                <td>&#3515;&#3530;</td>
                                                <td style='font-family:"Iskoola Pota";font-size: initial;'>&#3512;&#3515;&#3530;&#8205;</td>
                                                <td>\r&lt;letter&gt;</td>
                                                <td>R&lt;letter&gt;</td>
                                            </tr>
                                            <tr>
                                                <td >&#3530;&#8205;&#3514;</td>
                                                <td>&#3504;&#3530;&#8205;&#3514;&#8205;</td>
                                                <td >&lt;letter&gt;Y</td>
                                                <td >&lt;letter&gt;\y</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">Vowel Sound Auxiliaries</td>
                                            </tr>
                                            <tr>
                                                <td >&#3544;</td>
                                                <td >&#3482;&#3544;</td>
                                                <td >&lt;letter&gt;ru</td>
                                                <td ></td>
                                            </tr>
                                            <tr>
                                                <td >&#3551;</td>
                                                <td >&#3488;&#3550;</td>
                                                <td>&lt;letter&gt;au</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>ෛ</td>
                                                <td>&#3512;&#3547;</td>
                                                <td>&lt;letter&gt;I</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">Nasal Sound Auxiliaries</td>
                                            </tr>
                                            <tr>
                                                <td>&#3500;</td>
                                                <td>&#3524;&#3500;</td>
                                                <td><b>nn</b>da</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>&#3507;</td>
                                                <td>&#3524;&#3507;</td>
                                                <td><b>nn</b>dha</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td >&#3487;</td>
                                                <td>&#3484;&#3487;</td>
                                                <td><b>nn</b>ga</td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="col-lg-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa">Deriving Consonants</i> 
                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-12">
                                        <table class="table table-bordered table-hover">
                                        <tr>
                                            <td>&#3482;&#3530;</td>
                                            <td>&#3482;</td>
                                            <td>&#3482;&#3535;</td>
                                            <td>&#3482;&#3536;</td>
                                            <td>&#3482;&#3537;</td>
                                            <td>&#3482;&#3538;</td>
                                            <td>&#3482;&#3539;</td>
                                            <td>&#3482;&#3540;</td>
                                            <td>&#3482;&#3542;</td>
                                            <td>&#3482;&#3545;</td>
                                            <td>&#3482;&#3546;</td>
                                            <td>&#3482;&#3548;</td>
                                            <td>&#3482;&#3549;</td>
                                        </tr>
                                        <tr>
                                            <td>k</td>
                                            <td>ka</td>
                                            <td>kaa</td>
                                            <td>kA</td>
                                            <td>kAa</td>
                                            <td>ki</td>
                                            <td>kie</td>
                                            <td>ku</td>
                                            <td>kuu</td>
                                            <td>ke</td>
                                            <td>kei</td>
                                            <td>ko</td>
                                            <td>koe</td>
                                        </tr>
                                        <tr>
                                            <td>&#3482;&#3550;</td>
                                            <td>&#3482;&#3530;&#8205;&#3515;</td>
                                            <td>&#3482;&#3530;&#8205;&#3515;&#3535;</td>
                                            <td>&#3482;&#3530;&#8205;&#3515;&#3536;</td>
                                            <td>&#3482;&#3530;&#8205;&#3515;&#3537;</td>
                                            <td>&#3482;&#3530;&#8205;&#3515;&#3538;</td>
                                            <td>&#3482;&#3530;&#8205;&#3515;&#3539;</td>
                                            <td>&#3482;&#3544;</td>
                                            <td>&#3482;&#3570;</td>
                                            <td>&#3482;&#3530;&#8205;&#3515;&#3545;</td>
                                            <td>&#3482;&#3530;&#8205;&#3515;&#3546;</td>
                                            <td>&#3482;&#3530;&#8205;&#3515;&#3548;</td>
                                            <td>&#3482;&#3530;&#8205;&#3515;&#3549;</td>
                                        </tr>
                                        <tr>
                                            <td>kau</td>
                                            <td>kra</td>
                                            <td>kraa</td>
                                            <td>krA</td>
                                            <td>krAa</td>
                                            <td>kri</td>
                                            <td>krie</td>
                                            <td>kru</td>
                                            <td>kruu</td>
                                            <td>kre</td>
                                            <td>krei</td>
                                            <td>kro</td>
                                            <td>kroe</td>
                                        </tr>
                                    </table>
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

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>
