<html>

<head>
    <meta name="description" content="QR Code scanner" />
    <meta name="keywords" content="qrcode,qr code,scanner,barcode,javascript" />
    <meta name="language" content="English" />
    <meta name="Revisit-After" content="1 Days" />
    <meta name="robots" content="index, follow" />
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Web QR</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">

    <style type="text/css">
        body {
            width: 100%;
            text-align: center;
        }

        img {
            border: 0;
        }

        #main {
            margin: 15px auto;
            background: white;
            overflow: auto;
            width: 100%;
        }

        #header {
            background: white;
            margin-bottom: 15px;
        }

        #mainbody {
            background: white;
            width: 100%;
            display: none;
        }

        #footer {
            background: white;
        }

        #v {
            width: 320px;
            height: 240px;
        }

        #qr-canvas {
            display: none;
        }

        #qrfile {
            width: 320px;
            height: 240px;
        }

        #mp1 {
            text-align: center;
            font-size: 35px;
        }

        #imghelp {
            position: relative;
            left: 0px;
            top: -160px;
            z-index: 100;
            font: 18px arial, sans-serif;
            background: #f0f0f0;
            margin-left: 35px;
            margin-right: 35px;
            padding-top: 10px;
            padding-bottom: 10px;
            border-radius: 20px;
        }

        .selector {
            margin: 0;
            padding: 0;
            cursor: pointer;
            margin-bottom: -5px;
        }

        #outdiv {
            width: 320px;
            height: 240px;
            border: solid;
            border-width: 3px 3px 3px 3px;
        }

        #result {
            border: solid;
            border-width: 1px 1px 1px 1px;
            padding: 20px;
            width: 70%;
        }

        ul {
            margin-bottom: 0;
            margin-right: 40px;
        }

        li {
            display: inline;
            padding-right: 0.5em;
            padding-left: 0.5em;
            font-weight: bold;
            border-right: 1px solid #333333;
        }

        li a {
            text-decoration: none;
            color: black;
        }

        #footer a {
            color: black;
        }

        .tsel {
            padding: 0;
        }

        
    </style>

    <script type="text/javascript" src="llqrcode.js"></script>
    <script type="text/javascript" src="plusone.js"></script>
    <script type="text/javascript" src="webqr.js"></script>

 

</head>

<body>
    <div id="main">
        <div id="header">
            <div style="position:relative;top:+20px;left:0px;">
                <g:plusone size="medium"></g:plusone>
            </div>
            <p id="mp1">
                QR Code scanner
            </p>
            <ul>
                <li><a href="index.php">Scan</a></li>
                <li><a href="create.php">Create</a></li>
            </ul>
        </div>
        <div id="mainbody">
            <table class="tsel" border="0" width="100%">
                <tr>
                    <td valign="top" align="center" width="50%">
                        <table class="tsel" border="0">
                            <tr>
                                <td><img class="selector" id="webcamimg" src="vid.png" onclick="setwebcam()" align="left" /></td>
                                <td><img class="selector" id="qrimg" src="cam.png" onclick="setimg()" align="right" /></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <div id="outdiv">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <img src="down.png" />
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <div id="result"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                    <button id="sendqr" value="send">Send QR Code to Check In Database </button><br>
	
    
          <form action="" method="POST">
       
      <input type="text" name="qr_code_detail" id="content2"><br>
        <button id="sendqr" value="send" name="check">Check Product</button>
    </form>
                    </td>
                </tr>
            </table>
            
        </div>&nbsp;
     
    </div>
    <canvas id="qr-canvas" width="800" height="600"></canvas>


    <?php



include "database.php";

$db = new database();
if(isset($_POST['check'])){
    $code = $_POST['qr_code_detail'];
   
	$where = "code='$code'";
    
	

	$db->select('products','*',null,$where,null,null);
    $result = $db->getResult();
	foreach($result as list("code"=>$codep,"name"=>$name,"price"=>$price,"image"=>$image,"specification"=>$spec) ){
        echo " <div class='container justify-content-center'>
        <div class='row'>
        <form action='paynow.php'>
        <div class='container'>
        <div class='row'>
        <input type='text' class='form-control' id='formGroupExampleInput' placeholder='Example input' required hidden name='product_code' value='$codep'>
        </div>
        <div class='row'>
        <h4>product code is $codep </h4>
        </div>
        <div class='row'>
        <h3> $name <h3>
        </div>
        <div class='row'>
        <h3>price : $price Rs </h3>
        </div>
        <div class='row'>
        <img src='$image' alt='$name'>
        </div>
        <div class='row'>
        $spec
        </div>
        <div class='row'>
        <button type='submit' name='proceed'>Buy Now</button>
        </div>
        </form>
        </div>
        
        </div>
        
        </div>
";
        
    
    }
//    $row_count = $result->num_rows;
//   echo $row_count;
// if($row_count > 0){
//     echo "<P>Product for this code does not exist</p>";
// }else{
	
//    }


}
 
// exit;

// $db->select('code','*',null,$where,null,null);
//     $result = $db->getResult();

//    $row_count = $result->num_rows;

?>






    <script type="text/javascript">
        load();
    </script>
    <script type="text/javascript" src="try.js"></script>
</body>

</html>