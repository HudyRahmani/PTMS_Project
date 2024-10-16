<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
  $sql ="SELECT Email FROM tbladmin WHERE Email=:email and MobileNumber=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tbladmin set Password=:newpassword where Email=:email and MobileNumber=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute(); 
header("location:index.php?password=changed");
}
else { 
header("location:forgot-password.php?invalid=mobile");
}
}

?>
<!doctype html>
<html class="no-js" lang="fa">
<head>
    
    <title>فراموش کردن پسورد</title>
  

    <link rel="apple-touch-icon" href="apple-icon.png">
   


    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("پسورد جدید و تکرار پسورد باهم برابر نیست!!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>

</head>

<body class="bg-dark" style=" background-image: url('images/5.jpg'); background-size:cover;">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content" style="box-shadow:1px 1px 40px 20px grey;">
                <div class="login-logo bg-primary p-3 ">
                    <h3 style="color:black" class="text-white" >سیستم معلوماتی استادان پوهنتون پروان </h3>
                    
                </div>
				<hr color="black">
                <div class="login-form">
                    <form dir="rtl" style="text-align:right;" action="" method="post" name="chngpwd" onSubmit="return valid();">
                       <?php if(isset($_GET["invalid"])){ ?>
							<div style="text-align:center;color:red;">ایمل آدرس یا شماره تماس  اشتبا است</div>
					   <?php } ?>
<div class="form-group">
<label>ایمل آدرس</label>
<input type="email" class="form-control" <?php echo $_POST["email"]; ?> required="" name="email">
</div>

<div class="form-group">
<label>شماره تماس</label>
<input type="text" class="form-control" <?php if(isset($_POST["mobile"])){ echo $_POST["mobile"];} ?> name="mobile" required="true">
</div>
                        
<div class="form-group">
<label>پسورد</label>
<input class="form-control" type="password" name="newpassword" required="true"/>
</div>

<div class="form-group">
<label>تائیدی پسورد</label>
<input class="form-control" type="password" name="confirmpassword" required="true" />
</div>

<div  class="checkbox">
				<label class="pull-right">
				 
					<a class="p-2" style="background-color:yellow;color:black;border-radius:40px;" href="index.php" ><span style="font-size:20px;font-weight:bold;">&#8594;</span>دوباره وصل شدن</a>
				 
				</label>
		</div>

		<button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" style="font-size:18px;" name="submit">رمز  تبدیل شود</button>
</form>

</div>
</div>
</div>
</div>


    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>


</body>

</html>
