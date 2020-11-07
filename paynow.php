<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayMe</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
<?php
 


 include "database.php";

 $db = new database();
 
  $code = $_GET["product_code"];
   $where = "code='$code'";
     
   
 
   $db->select('products','*',null,$where,null,null);
     $result = $db->getResult();
   foreach($result as list("price"=>$price) ){
       
    ?>

   



 <div class="container">
 <div class="row justify-content-center">
 
 <form action="payment.php" method="post">
 <h1>Your Payment Amount is <?php echo $price."Rs"  ?></h1>
 <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input" required hidden name="price" value="<?php echo $price ?>">
 <div class="form-group">
    <label for="formGroupExampleInput">Full Name</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter your name" required name="name">
  </div>
 <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Mobile No</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter your mobile no" required name="mobile">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Address</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Your Address" required name="address">
  </div>
  <button type="submit" class="btn btn-primary" name="proceed_to_pay">Submit</button>
</form>
 </div>
 
 </div>
  
 <?php     
     }
 

?>

</body>
</html>