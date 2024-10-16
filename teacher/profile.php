<?php session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
$eid=$_SESSION['trmsuid'];
$tname=$_POST['tname'];
$lname=$_POST['lname'];
$fname=$_POST['fname'];
$mzf=$_POST['mzf'];
$mzm=$_POST['mzm'];
$mzf=$_POST['mzf'];
$mzm=$_POST['mzm'];
$ls=$_POST['ls'];
$ms=$_POST['ms'];
$do=$_POST['do'];
$ls1=$_POST['ls1'];
$ms1=$_POST['ms1'];
$do1=$_POST['do1'];
$email=$_POST['email'];
$mobnum=$_POST['mobnum'];
$address=$_POST['address'];
$addressd=$_POST['addressd'];
$addressa=$_POST['addressa'];
$address1=$_POST['address1'];
$addressd1=$_POST['addressd1'];
$addressa1=$_POST['addressa1'];
$department=$_POST['department'];
$tsub=$_POST['tsub'];
$degree=$_POST['degree'];
$sciencer=$_POST['sciencer'];
$faculty=$_POST['faculty'];
$tdate=$_POST['joiningdate'];
$ljoiningdate=$_POST['ljoiningdate'];
$description=$_POST['description'];
$teachexp=$_POST['teachingexp'];
$status=$_POST['status'];
$sql="update tblteacher set Name=:tname,lname=:lname,fname=:fname,mzf=:mzf,mzm=:mzm,ls=:ls,ms=:ms,do=:do,ls1=:ls1,ms1=:ms1,do1=:do1,Email=:email,mobnum=:mobnum,department=:department,tsub=:tsub,degree=:degree,sciencer=:sciencer,Address=:address,addressd=:addressd,addressa=:addressa,address1=:address1,addressd1=:addressd1,addressa1=:addressa1,faculty= :faculty,JoiningDate=:joiningdate,ljoiningdate=:ljoiningdate,description=:description,teachingExp=:teachexp,isPublic=:status where ID=:eid";
$query = $dbh->prepare($sql);
$query->bindParam(':tname',$tname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':mzf',$mzf,PDO::PARAM_STR);
$query->bindParam(':mzm',$mzm,PDO::PARAM_STR);
$query->bindParam(':ls',$ls,PDO::PARAM_STR);
$query->bindParam(':ms',$ms,PDO::PARAM_STR);
$query->bindParam(':do',$do,PDO::PARAM_STR);
$query->bindParam(':ls1',$ls1,PDO::PARAM_STR);
$query->bindParam(':ms1',$ms1,PDO::PARAM_STR);
$query->bindParam(':do1',$do1,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':department',$department,PDO::PARAM_STR);
$query->bindParam(':tsub',$tsub,PDO::PARAM_STR);
$query->bindParam(':degree',$degree,PDO::PARAM_STR);
$query->bindParam(':sciencer',$sciencer,PDO::PARAM_STR);
$query->bindParam(':mobnum',$mobnum,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':addressd',$addressd,PDO::PARAM_STR);
$query->bindParam(':addressa',$addressa,PDO::PARAM_STR);
$query->bindParam(':address1',$address1,PDO::PARAM_STR);
$query->bindParam(':addressd1',$addressd1,PDO::PARAM_STR);
$query->bindParam(':addressa1',$addressa1,PDO::PARAM_STR);
$query->bindParam(':faculty',$faculty,PDO::PARAM_STR);
$query->bindParam(':joiningdate',$tdate,PDO::PARAM_STR);
$query->bindParam(':ljoiningdate',$ljoiningdate,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':teachexp',$teachexp,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
echo '<script>alert("Your profile succesfull updated.")</script>';
echo "<script>window.location.href='dashboard.php'</script>";

  }
  ?>

<!doctype html>
<html class="no-js" lang="fa">

<head>
   
    <title>پروفایل استاد</title>
  
    <link rel="apple-touch-icon" href="apple-icon.png">
  


    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body style="font-family:times new roman;">
    <!-- Left Panel -->

    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header.php');?>

        <div dir="rtl" class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>اپدیت مشخصات استاد</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">دشبورد</a></li>
                             
                            <li class="active">اپدیت</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                  
                    <!--/.col-->
<!----------------------------------------------------------------------------------------------->
<div dir="rtl" style="text-align:right;" class="col-lg-6">
                        <div class="card">
                            <div class="card-header"><small> مشخصات علمی</small><strong> استاد</strong></div>
                            <form name="" method="post" action="" enctype="multipart/form-data">
                                
                            <div class="card-body card-block">
                    
<!------------------------------------------------------------------------------------->
 <?php
$eid=$_SESSION['trmsuid'];
$sql="SELECT * from  tblteacher where ID=$eid";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>

<!------------------------------------------------------------------------------------->
<div class="row form-group">
<div class="col-12">
<div class="form-group">
<label for="city" class=" form-control-label">موقف ضمنی فعلی</label>
<input disabled="true" type="text" name="mzf" id="mzf" value="<?php  echo $row->mzf;?>" class="form-control" required="true">
</div>
</div>
</div>
<div class="row form-group">
	<div class="col-12">
	<div class="form-group">
	<label for="city" class=" form-control-label">موقف ضمنی از لحاظ موجودیت</label>
	<input type="text" disabled="true" name="mzm" id="mzm" value="<?php  echo $row->mzm;?>" class="form-control" required="true">
	</div>
	</div>
	</div>
	
	<div style="text-align:center;font-size:20px;">رشته های تحصیلی</div>
	<div class="row form-group">
	<div class="col-12">
		<div class="form-group"><label for="city" class=" form-control-label">رشته تحصیلی لیسان</label><input   disabled ="true" type = "text" name="ls" id="ls" value="<?php  echo $row->ls;?>" class="form-control" required="true"></div>
		<div class="form-group"><label for="city" class=" form-control-label">رشته تحصیلی ماستری</label><input  disabled ="true" type = "text" name="ms" id="ms" value="<?php  echo $row->ms;?>" class="form-control" required="true"></div>
		<div class="form-group"><label for="city" class=" form-control-label">رشته تحصیلی دوکتورا</label><input disabled ="true" type= "text" name="do" id="do" value="<?php  echo $row->do;?>" class="form-control" required="true"></div>
	</div>
	</div>
	
	<div style="text-align:center;font-size:20px;">مراجع تحصیل</div>
	<div class="row form-group">
	<div class="col-12">
		<div class="form-group"><label for="city" class=" form-control-label">لیسانس</label><input disabled ="true" type="text" name="ls1" id="ls1" value="<?php  echo $row->ls1;?>" class="form-control" required="true"></div>
		<div class="form-group"><label for="city" class=" form-control-label">ماستری</label><input disabled ="true" type="text" name="ms1" id="ms1" value="<?php  echo $row->ms1;?>" class="form-control" required="true"></div>
		<div class="form-group"><label for="city" class=" form-control-label">دوکتورا</label><input disabled ="true"  type="text" name="do1" id="do1" value="<?php  echo $row->do1;?>" class="form-control" required="true"></div>
	</div>
	</div>
	
	<div class="row form-group">
					<div class="col-12">
					<div class="form-group"><label for="city" class=" form-control-label">پوهنځی استاد</label>
					<select disabled="true" type="text" name="faculty" id="faculty" value="" class="form-control" required="true">
					<option value="<?php  echo $row->faculty;?>"><?php  echo $row->faculty;?></option>
					<?php 
					$sql2 = "SELECT * from   faculty ";
					$query2 = $dbh -> prepare($sql2);
					$query2->execute();
					$result2=$query2->fetchAll(PDO::FETCH_OBJ);
					foreach($result2 as $row1)
					{          
					?>  
					<option value="<?php echo htmlentities($row1->faculty);?>"><?php echo htmlentities($row1->faculty);?></option>
					 <?php } ?> 
					</select></div>
					</div>
					</div>
	
	<div class="row form-group">
	<div class="col-12">
	<div class="form-group">
	<label for="city" class=" form-control-label">دیپارتمنت</label>
	<input disabled="true" type="text" name="department" id="department" value="<?php  echo $row->department;?>" class="form-control" required="true">
	</div>
	</div>
	</div>
	
	
	<div class="row form-group">
					<div class="col-12">
					<div class="form-group"><label for="city" class=" form-control-label">پوهنځی استاد</label>
					<select disabled="true" type="text" name="faculty" id="faculty" value="" class="form-control" required="true">
					<option value="<?php  echo $row->faculty;?>"><?php  echo $row->faculty;?></option>
					<?php 
					$sql2 = "SELECT * from   faculty ";
					$query2 = $dbh -> prepare($sql2);
					$query2->execute();
					$result2=$query2->fetchAll(PDO::FETCH_OBJ);
					foreach($result2 as $row1)
					{          
					?>  
					<option value="<?php echo htmlentities($row1->faculty);?>"><?php echo htmlentities($row1->faculty);?></option>
					 <?php } ?> 
					</select></div>
					</div>
					</div>
	<!---
	<div class="row form-group">
	<div class="col-12">
	<div class="form-group">
	<label for="city"  class=" form-control-label">پوهنحی</label>
	<input type="text" disabled="disabled" name="tsub" id="tsub" value="<?php  echo $row->tsub;?>" class="form-control" required="true">
	</div>
	</div>
	</div>
	-->
	
	<div class="row form-group">
		<div class="col-12">
		<div class="form-group">
		<label for="city" class=" form-control-label">درجه تحصیلی</label>
		<input type="text" disabled="disabled" name="degree" id="degree" value="<?php  echo $row->degree; ?>" class="form-control" required="true">
		</div>
		</div>
	</div>
	
	
	<div class="row form-group">
	<div class="col-12">
	<div class="form-group">
	<label for="city" class=" form-control-label">رتبه علمی</label>
	<input type="text"  disabled="disabled"  name="sciencer" id="sciencer" value="<?php  echo $row->sciencer;?>" class="form-control" required="true">
	</div>
	</div>
	</div>


<div class="row form-group">
<div class="col-12">
<div class="form-group">
<label for="city" class=" form-control-label">مدت خدمت به صفت کادر علمی</label>
<input type="text" disabled="true" name="teachingexp" id="teachingexp" pattern="[0-9]+" title="only numbers"  value="<?php  echo $row->teachingExp;?>" class="form-control" required="true">
</div>
</div>
</div>

<div class="row form-group">
<div class="col-12">
<div class="form-group"><label for="city" class=" form-control-label">مشخصات اضافه استاد</label><textarea type="text" name="description" id="description" class="form-control" rows="3" cols="12" ><?php  echo $row->description;?></textarea></div>
</div>
</div>




<div class="row form-group">
<div class="col-12">
<div class="form-group"><label for="city" class=" form-control-label"> حالت پروفایل  <small style="color:red">(اگر پروفایل عمومی باشد همه کس می بیند و اگر عمومی نباشد فقط خود تان می بینید)</small></label>
    <select type="text" name="status" id="status" value="" class="form-control" required="true">
         <?php if($row->isPublic=='1'):?>  
<option value="1">عمومی</option>
<option value="0">عمومی نباشد</option>
<?php else: ?>
<option value="0">عمومی نباشد</option>
<option value="1">عمومی</option>
<?php endif;?>
</select></div>
</div>
 </div>
 
<!--------------------------------------------------------------------------------------------------->
</div>


                                                     
                                                </div>
<p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit"><i class="fa fa-dot-circle-o"></i> اپدیت</button></p> 
  
                                            </div>
<!---------------------------------------------------------------------------------------------------->
          <div dir="rtl" style="text-align:right;" class="col-lg-6" style="float-left:left !important">
                        <div class="card">
                            <div class="card-header"><small> مشخصات سخصی</small><strong> استاد </strong></div>
                            <form name="" method="post" action="" enctype="multipart/form-data">
                                
                            <div class="card-body card-block">

<!--------------------------------------------------------------------------------------------->


<div class="form-group">
<label for="company" class=" form-control-label">نام </label>
<input type="text" name="tname" value="<?php  echo $row->Name;?>" class="form-control" id="tname" required="true">
</div>

<div class="form-group">
<label for="company" class=" form-control-label">تخلص</label>
<input type="text" name="lname" value="<?php  echo $row->lname;?>" class="form-control" id="lname" required="true">
</div>

<div class="form-group">
<label for="company" class=" form-control-label">ولد</label>
<input type="text" name="fname" value="<?php  echo $row->fname;?>" class="form-control" id="fname" required="true">
</div>

<div class="form-group">
<label for="company" class=" form-control-label">عکس استاد</label> &nbsp;
<?php if($row->Picture==''):?>
<img src="images/no-image.png"  alt="NO Image">
<?php else: ?>    
<img src="images/<?php echo $row->Picture;?>" width="100" height="100" value="<?php  echo $row->Picture;?>">
<?php endif;?>
<a href="changeimage.php"> &nbsp; تبدیل عکس استاد</a>
</div>

<div class="form-group">
<label for="street" class=" form-control-label">ایمل آدرس </label>
<input type="text" name="email" value="<?php  echo $row->Email;?>" id="email" class="form-control" required="true">
</div>



<div class="row form-group">
<div class="col-12">
<div class="form-group"><label for="city" class=" form-control-label">شماره تماس </label><input type="text" name="mobnum" id="mobnum" value="<?php  echo $row->mobnum;?>" class="form-control" required="true" maxlength="10" pattern="[0-9]+"></div>
</div>
</div>


<div style="text-align:center;font-size:20px;">سکونت اصلی</div>
				<div class="row form-group">
					<div class="col-12">
						<div class="form-group"><label for="city" class=" form-control-label">ولایت</label><input type="text" name="address" id="address" disabled="true"  value="<?php  echo $row->Address;?>" class="form-control" required="true"></div>
						<div class="form-group"><label for="city" class=" form-control-label">ولسوالی</label><input type="text" name="addressd" id="addressd" disabled="true"  value="<?php  echo $row->addressd;?>" class="form-control" required="true"></div>
						<div class="form-group"><label for="city" class=" form-control-label">قریه/ناحیه</label><input type="text" name="addressa" id="addressa" disabled="true"  value="<?php  echo $row->addressa;?>" class="form-control" required="true"></div>
						
					</div>
					
				</div>
				
				<div style="text-align:center;font-size:20px;">سکونت فعلی</div>
				<div class="row form-group">
					<div class="col-12">
						<div class="form-group"><label for="city" class=" form-control-label">ولایت</label><input type="text" name="address1" id="address1" value="<?php  echo $row->address1;?>" class="form-control" required="true"></div>
						<div class="form-group"><label for="city" class=" form-control-label">ولسوالی</label><input type="text" name="addressd1" id="addressd1" value="<?php  echo $row->addressd1;?>" class="form-control" required="true"></div>
						<div class="form-group"><label for="city" class="  form-control-label">قریه/ناحیه</label><input type="text" name="addressa1" id="addressa1" value="<?php  echo $row->addressa1;?>" class="form-control" required="true"></div>
						
					</div>
					
				</div>

				 
				<div class="row form-group">
					<div class="col-6">
					<div class="form-group"><label for="city" class=" form-control-label">تاریخ ثبت</label><input type="date"  disabled="true"  name="joiningdate" id="joiningdate" value="<?php  echo $row->JoiningDate;?>" class="form-control" required="true"></div>
					</div>
					
					<div class="col-6">
					<div class="form-group"><label for="city" class=" form-control-label">تاریخ آخرین ترفع علمی</label><input disabled="true" type="date" name="ljoiningdate" id="ljoiningdate" value="<?php  echo $row->ljoiningdate;?>" class="form-control" required="true"></div>
					</div>
				</div>

<!-------------------------------------------------------------------------------->
</div>
<?php $cnt=$cnt+1;}} ?>

                                                   
                                                </div>
                                                </form>
                                            </div>

                                           
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->


                            <script src="../vendors/jquery/dist/jquery.min.js"></script>
                            <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="../vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="../vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="../assets/js/main.js"></script>
</body>
</html>
<?php }  ?>