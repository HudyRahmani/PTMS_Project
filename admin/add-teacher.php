<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$trmsaid=$_SESSION['trmsaid'];
$tname=$_POST["tname"];
$lname = $_POST['lname'];
$fname = $_POST['fname'];
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
$degree=$_POST['degree'];
$sciencer=$_POST['sciencer'];
$faculty=$_POST['faculty'];
$tdate=$_POST['joiningdate'];
$ljoiningdate=$_POST['ljoiningdate'];
$teachingexp=$_POST['teachingexp'];
$description=$_POST['description'];
$propic=$_FILES["propic"]["name"];
$propic1=$_FILES["propic1"]["name"];
 


//Checcking email 

	    // $tname = $lname = $fname = $mzf = $mzm = $ls = $ms = $do =$ls1 = $ms1 = $do1 = $email =$mobnum = $address = $addressd = $addressa =$address1 = $addressd1 = $addressa1 = $department = $degree  = $faculty = $teachingexp = '';
	 //	$errors=array('tname' => '','lname' => '', 'fname' => '','mzf'=>'','mzm' => '','ls' =>'','ms' => '','do' => '','ls1' => '','ms1' => '','do1' => '','email' => '' ,'mobnum' => '','address' => '','addressd' => '','addressa' => '','address1' => '','addressd1' => '','addressa1' => '','department' => '','degree' => '','faculty'  => '','teachingexp'  => '');
	

	$query=$dbh->prepare("SELECT * from  tblteacher where Email='$email' ||  mobnum='$mobnum'");
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	$query1=$dbh->prepare("SELECT * from  tblteacher where Name='$tname' &&  lname='$lname' && fname='$fname'");
	$query1->execute();
	$results=$query1->fetchAll(PDO::FETCH_OBJ);
	 
	
		if(empty($_POST["tname"])){
				$errors["tname"] = "نام استاد ضروری است";
			}
		if(empty($_POST["lname"])){
				$errors["lname"] = "تخلص استاد ضروری است";
		}
	    if(empty($_POST["fname"])){
			$errors["fname"] = "نام پدر ضروری است";
		 }
	    if(empty($_POST["mzf"])){
			$errors["mzf"] = "موفق ضمنی فعلی ضروری است";
		}	
	    if(empty($_POST["mzm"])){
			$errors["mzm"] = "موقف ضمنی از لحاظ موجودیت ضروری است";
		}
		if(empty($_POST["ls"])){
			$errors["ls"] = "رشته تحصیلی لیسانس ضروری است";
		}
		if(empty($_POST["ms"])){
			$errors["ms"] = "رشته تحصیلی ماستری ضروری است";
		}
		if(empty($_POST["do"])){
			$errors["do"] = "رشته تحصیلی دکترا ضروری است";
		}
		
		if(empty($_POST["ls1"])){
			$errors["ls1"] = "مراجع تحصیلی لیسانس ضروری است";
		}
		if(empty($_POST["ms1"])){
			$errors["ms1"] = "مراجع تحصیلی ماستری ضروری است";
		}
		if(empty($_POST["do1"])){
			$errors["do1"] = "مراجع تحصیلی دکترا ضروری است";
		}
		if(empty($_POST["email"])){
			$errors["email"] = "ایمل استاد ضروری است";
		}
		if(!preg_match('/^[A-z0-9]{3,60}@[A-z0-9]{3,60}.[A-z]{2,5}/',$email)){
			 $errors["email"] = "فارمت ایمل آدرس  اشتبا است";
		 }
		if(empty($_POST["mobnum"])){
			$errors["mobnum"] = "مبایل نمبر استاد ضروری است ";
		}
	    if(empty($_POST["address"])){
			$errors["address"] = "ولایت استاد شروری است";
		}
		if(empty($_POST["addressd"])){
			$errors["addressd"] = "ولسوالی استاد ضروری است";
		}
		if(empty($_POST["addressa"])){
			$errors["addressa"] = "قریه استاد ضروری است";
		}
		if(empty($_POST["address1"])){
			$errors["address1"] = "ولایت استاد ضروری است ";
		}
		if(empty($_POST["addressd1"])){
			$errors["addressd1"] = "ولسوالی استاد ضروری است ";
		}
		if(empty($_POST["addressa1"])){
			$errors["addressa1"] = "قریه استاد ضروری است ";
		}
		if(empty($_POST["department"])){
			$errors["department"] = "دیپارتمنت ضروری است";
		}
		if(empty($_POST["degree"])){
			$errors["degree"] = "درجه تحصیلی استاد ضروری است";
		}
		if(empty($_POST["faculty"])){
			$errors["faculty"] = "دیپارتمنت استاد ضروری است ";
		}
		if(empty($_POST["teachingexp"])){
			$errors["teachingexp"] = "تجربه کاری استاد ضروری است ";

  }
	else if(preg_match("/[0-9!@#$%^&*?|.,;]/",$tname)){
				$errors["tname"] = "نام باید حروف باشد ";
			}
    else if($query1->rowCount() > 0){
	  $errors["duplicate"] = "آمر صاحب استاد با این مشخصاب قبلا ذخیره شده";
	  
   }
 	else if($query->rowCount() > 0){
		$errors["emailerror"] = "آمر صاحب این شماره تلیفون یا ایمل آدرس از قبل در سیستم است";
		
  }
 
  else{
$extension = substr($propic,strlen($propic)-4,strlen($propic));
$extension1 = substr($propic1,strlen($propic1)-4,strlen($propic1));
$allowed_extensions = array(".JPG",".jpg","jpeg",".png",".gif");
$allowed_extensions1 = array(".JPG",".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions) || !in_array($extension1,$allowed_extensions1)){
    $errors["invalid"]="jpg / jpeg/ png /gif فارمت درست انتخاب عکس ";
}

else
{

$propic=md5($propic).time().$extension;
$propic1=md5($propic1).time().$extension1;
move_uploaded_file($_FILES["propic"]["tmp_name"],"../teacher/images/".$propic);
move_uploaded_file($_FILES["propic1"]["tmp_name"],"../teacher/idimages/".$propic1);
$sql="insert into tblteacher(Name,lname,fname,mzf,mzm,ls,ms,do,ls1,ms1,do1,Picture,propic1,Email,mobnum,department,degree,sciencer,Address,addressd,addressa,address1,addressd1,addressa1,faculty,JoiningDate,ljoiningDate,teachingExp,description)values(:tname,:lname,:fname,:mzf,:mzm,:ls,:ms,:do,:ls1,:ms1,:do1,:tpics,:propic1,:email,:mobnum,:department,:degree,:sciencer,:address,:addressd,:addressa,:address1,:addressd1,:addressa1,:faculty,:joiningdate,:ljoiningdate,:teachingexp,:description)";
$query=$dbh->prepare($sql);
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
$query->bindParam(':tpics',$propic,PDO::PARAM_STR);
$query->bindParam(':propic1',$propic1,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':department',$department,PDO::PARAM_STR);
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
$query->bindParam(':teachingexp',$teachingexp,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->execute();
$LastInsertId=$dbh->lastInsertId();
if ($LastInsertId>0) {
	header("location:manage-teacher.php?addt=done");
}else{
	$errors["somethingwrong"]="مشکل پیش آمده دوباره کوشش کنید";
    }
	}
}
}
?>

<!doctype html>
<html class="no-js" lang="fa">

<head>
   
    <title>صفحه اضافه کردن استادان</title>
  

    <link rel="apple-touch-icon" href="apple-icon.png">


    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
	<script type="text/javascript">
		
	</script>


</head>

<body>
    <!-- Left Panel -->

    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header.php');?>

        <div class="breadcrumbs" dir="rtl">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
						<ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">دشبورد</a></li>
                            <li><a href="add-teacher.php">جزیات استادان</a></li>
                            <li class="active">اضافه کردن </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                         <h1>جزیات استادان</h1>
                    </div>
                </div>
            </div>
        </div>
		<div class="float-right" style="margin-right:20px;">
			 
			<div class="text-danger"><h6> <?php echo $errors['duplicate'];  ?></h6></div>
			<div class="text-danger"><h6> <?php echo $errors['emailerror'];  ?></h6></div>
			<div class="text-danger"><h6> <?php echo $errors['invalid'];  ?></h6></div>
			<div class="text-danger"><h6> <?php echo $errors['somethingwrong'];  ?></h6></div>
			 
		</div>
        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
              
                    <!--/.col-->

                    

<!---------------------------------------------------------->
 <div class="col-lg-6" dir="rtl">
 
                        <div class="card" style="text-align:right;">
                        <div class="card-header"><small> مشخصات علمی </small><strong>استاد </strong></div>
                           <form name="" method="post" action="" enctype="multipart/form-data">
                            <div class="card-body card-block">
 
											<span id="oke"></span>
                                            <div class="row form-group">
                                                <div class="col-12">
                                                    <div class="form-group"><label for="city" class="  form-control-label">موقف ضمنی فعلی</label><input type="text" name="mzf" id="mzf"  value="<?php  echo $_POST["mzf"];  ?>" required="true"   pattern="[a-zA-Z ا ب ت ث ج ح خ د ذ ر ز س ش ص ض ط ظ ع غ ت ه ف  ق ک ل م ن و ی پ چ ژ‌ ك‌‌ ئ ؤ ء ږ ټ ځ څ ډ ړ ڼ ګ ۍ ي ښ گ]+" class="form-control" ></div>
													<span class="text-danger"><h6> <?php echo $errors['mzf'];  ?></h6></span><br>
                                                    </div>
                                            </div>
										 <div class="row form-group">
                                                <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">موقف ضمنی از لحاظ موجودیت</label><input type="text" name="mzm" id="mzm"  required="true"  value="<?php  echo $_POST["mzm"];  ?>"  pattern="[a-zA-Z ا ب ت ث ج ح خ د ذ ر ز س ش ص ض ط ظ ع غ ت ه ف ق ک ل م ن و ی پ چ ژ‌ ك‌‌ ئ ؤ ء ږ ټ ځ څ ډ ړ ڼ ګ ۍ ي ښ گ]+"  class="form-control" ></div>
													<span class="text-danger"><h6> <?php echo $errors['mzm'];  ?></h6></span><br>
                                                    </div>
                                            </div>
											<!------- new change -->
											 
											<div style="font-size:20px;text-align:center;">رشته های تحصیل</div>
                                                    
														<div class="col-12">
															<div style="text-align:right; font-size:17px" class="form-group"><label for="company"  required="true"  class=" form-control-label">رشته تحصیل لیسانس</label><input type="text" name="ls"  pattern="[a-zA-Z ا ب ت ث ج ح خ د ذ ر ز س ش ص ض ط ظ ع غ ت ه ف ق ک ل م ن و ی پ چ ژ‌ ك‌‌ ئ ؤ ء ږ ټ ځ څ ډ ړ ڼ ګ ۍ ي ښ گ]+"  value="<?php  echo $_POST["ls"];  ?>"    class="form-control" id="ls" ></div>
															<span class="text-danger"><h6> <?php echo $errors['ls'];  ?></h6></span><br>
															<div style="text-align:right; font-size:17px" class="form-group"><label for="company"  required="true" class=" form-control-label">رشته تحصیل ماستری</label><input type="text" name="ms"  pattern="[a-zA-Z ا ب ت ث ج ح خ د ذ ر ز س ش ص ض ط ظ ع غ ت ه ف ق ک ل م ن و ی پ چ ژ‌ ك‌‌ ئ ؤ ء ږ ټ ځ څ ډ ړ ڼ ګ ۍ ي ښ گ]+"  	 value="<?php  echo $_POST["ms"];  ?>"  class="form-control" id="ms" ></div>
															<span class="text-danger"><h6> <?php echo $errors['ms'];  ?></h6></span><br>
															<div style="text-align:right; font-size:17px" class="form-group"><label for="company" required="true"  class=" form-control-label">رشته تحصیل دوکتورا</label><input type="text" name="do"  pattern="[a-zA-Z ا ب ت ث ج ح خ د ذ ر ز س ش ص ض ط ظ ع غ ت ه ف ق ک ل م ن و ی پ چ ژ‌ ك‌‌ ئ ؤ ء ږ ټ ځ څ ډ ړ ڼ ګ ۍ ي ښ گ]+"  	 value="<?php  echo $_POST["do"];  ?>" class="form-control" id="do" ></div>
															<span class="text-danger"><h6> <?php echo $errors['do'];  ?></h6></span><br>
															
                                                    </div>
                                                    
														<div style="font-size:20px;text-align:center;">مراجع تحصیل </div>
														<div class="col-12">
																<div class="form-group"><label for="company" class=" form-control-label">لیسانس </label><input  required="true" type="text" name="ls1"value="<?php  echo $_POST["ls1"];  ?>"  pattern="[a-zA-Z ا ب ت ث ج ح خ د ذ ر ز س ش ص ض ط ظ ع غ ت ه ف ق ک ل م ن و ی پ چ ژ‌ ك‌‌ ئ ؤ ء ږ ټ ځ څ ډ ړ ڼ ګ ۍ ي ښ گ]+"  class="form-control" id="ls1"></div>
																<span class="text-danger"><h6> <?php echo $errors['ls1'];  ?></h6></span><br>
																<div class="form-group"><label for="company" class=" form-control-label">ماستری</label><input required="true"  type="text" name="ms1" value="<?php  echo $_POST["ms1"];  ?>"  pattern="[a-zA-Z ا ب ت ث ج ح خ د ذ ر ز س ش ص ض ط ظ ع غ ت ه ف ق ک ل م ن و ی پ چ ژ‌ ك‌‌ ئ ؤ ء ږ ټ ځ څ ډ ړ ڼ ګ ۍ ي ښ گ]+"  class="form-control" id="ms1" ></div>
																<span class="text-danger"><h6> <?php echo $errors['ms1'];  ?></h6></span><br>
																<div class="form-group"><label for="company" class=" form-control-label">دکتور</label><input required="true"  type="text" name="do1"  value="<?php  echo $_POST["do1"];  ?>"  pattern="[a-zA-Z ا ب ت ث ج ح خ د ذ ر ز س ش ص ض ط ظ ع غ ت ه ف ق ک ل م ن و ی پ چ ژ‌ ك‌‌ ئ ؤ ء ږ ټ ځ څ ډ ړ ڼ ګ ۍ ي ښ گ]+"  class="form-control" id="do1" ></div>
																<span class="text-danger"><h6> <?php echo $errors['do1'];  ?></h6></span><br>
														</div>
											        
											
											<!--	last   -->
											
											
											<!--
											<div class="row form-group">
                                                <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">دیپارتمنت</label><input type="text" required="true"  name="department" id="department"   pattern="[a-zA-Z ا ب ت ث ج ح خ د ذ ر ز س ش ص ض ط ظ ع غ ت ه ف ق ک ل م ن و ی پ چ ژ‌ ك‌‌ ئ ؤ ء ږ ټ ځ څ ډ ړ ڼ ګ ۍ ي ښ گ]+"  value="<?php  echo $_POST["department"];  ?>"  class="form-control" ></div>
													<span class="text-danger"><h6> </h6></span><br>
                                                    </div>
                                            </div>
										  --> 
										<div class="form-group"><label for="city" class=" form-control-label">دیپارتمنت استاد</label>
											<select type="text" name="department"  required="true" id="department" value="" class="form-control" >
												<option value="">انتخاب دیپارتمنت</option>
													<?php 
													$sql2 = "SELECT * from   department ";
													$query2 = $dbh -> prepare($sql2);
													$query2->execute();
													$result2=$query2->fetchAll(PDO::FETCH_OBJ);
													foreach($result2 as $row)
													{          
													?>  
												<option value="<?php echo htmlentities($row->department);?>"><?php echo htmlentities($row->department);?></option>
												 <?php } ?> 
											</select>
										</div>
										 
										<!--	  
											<div class="row form-group">
                                                <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">درجه تحصیلی</label><input type="text" required="true"  name="degree" id="degree"  pattern="[a-zA-Z ا ب ت ث ج ح خ د ذ ر ز س ش ص ض ط ظ ع غ ت ه ف ق ک ل م ن و ی پ چ ژ‌ ك‌‌ ئ ؤ ء ږ ټ ځ څ ډ ړ ڼ ګ ۍ ي ښ گ]+"   value="<?php  echo $_POST["degree"];  ?>" class="form-control"></div>
													<span class="text-danger"><h6>  </h6></span><br>
                                                    </div>
                                            </div>
											
										-->
										 <div class="row form-group">
											<div class="col-12">
												<div class="form-group"><label for="city" class=" form-control-label">درجه تحصیلی</label>
													<select type="text" name="degree" id="degree" value="<?php echo $_POST["degree"]; ?>" class="form-control">
																	<option value="1">لیسانس 		</option>
																	<option value="2">ماستر		</option>
																	<option value="3">دکتر		</option>
																	<option value="4">مافوق دکتر 		</option>						 
														</select>
													</div>
												</div>
											</div>
											 
<div class="row form-group">
<div class="col-12">
	<div class="form-group"><label for="city" class=" form-control-label">رتبه علمی</label>
		<select type="text" name="sciencer" id="sciencer" value="<?php echo $_POST["sciencer"]; ?>" class="form-control">
				
						<option value="1">پوهاند 		</option>
						<option value="2">پوهنوال		</option>
						<option value="3">پوهندوی		</option>
						<option value="4">پوهنمل 		</option>
						<option value="5">پوهنیار		</option>
						<option value="6">نامزد پوهنیار </option>
						<option value="7">پوهیالی       </option>
					 
			</select>
		</div>
	</div>
</div>
											 

<div class="row form-group">
<div class="col-12">
<div class="form-group">
<label for="city" class=" form-control-label">مدت خدمت به صفت کادر علمی</label>
<input type="text" name="teachingexp" id="teachingexp" pattern="[0-9]+" title="only numbers"  required="true"  value="<?php echo $_POST["teachingexp"]; ?>" class="form-control" >
<span class="text-danger"><h6> <?php echo $errors['teachingexp'];  ?></h6></span><br>
</div>
</div>
</div>

<div class="col-12">
<div class="form-group">
    <label for="city" class=" form-control-label">مشخصات بیشتر استاد</label>
    <textarea type="text" name="description" id="description" class="form-control" rows="3" cols="12" ></textarea></div>
</div>

<div class="row form-group">
	<div class="col-12">
		<div class="form-group"><label for="city" class=" form-control-label">حالت پروفایل <small style="color:red">(اگر عمومی باشد همه می بیند و اگر عمومی نباشد فقط خود شما می بینید)</small></label>
			<select type="text" name="status" id="status" value="" class="form-control" >
					 <?php if($row->isPublic=='1'):?>  
					<option value="1">عمومی</option>
					<option value="0">عمومی نباشد</option>
					<?php else: ?>
					<option value="0">عمومی نباشد</option>
					<option value="1">عمومی</option>
					<?php endif;?>
			</select>
		</div>
	</div>
</div>

<!--        -->

		<!--   last -->
            
             <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                    <i class="fa fa-dot-circle-o"></i> ثبت کردن استاد جدید
                </button></p>
        </div>
      
    </div>
    </div>

<!--------------------------------------------------------------------------------------------->

<div class="col-lg-6" dir="rtl">


                        <div class="card" style="text-align:right;">
                            <div class="card-header"><small> مشخصات شخصی </small><strong>استاد </strong></div>
                           
                                
                            <div class="card-body card-block">
 
                                <div class="form-group"><label for="company" class="  form-control-label">نام </label><input  required="true"   type="text" name="tname" value="<?php if(isset($_POST['tname'])) echo $_POST["tname"];  ?>"  class="form-control" id="tname"  ></div>
								<span class="text-danger"><h6> <?php echo $errors['tname'];  ?></h6></span><br>
                                <div class="form-group"><label for="company" class=" form-control-label">تخلص</label><input  required="true"  type="text" name="lname" value="<?php  if(isset($_POST['lname'])) echo $_POST["lname"];  ?>"  pattern="[a-zA-Z ا ب ت ث ج ح خ د ذ ر ز س ش ص ض ط ظ ع غ ت ه ف ق ک ل م ن و ی پ چ ژ‌ ك‌‌ ئ ؤ ء ږ ټ ځ څ ډ ړ ڼ ګ ۍ ي ښ گ]+"  class="form-control" id="lname" ></div>
								<span class="text-danger"><h6> <?php echo $errors['lname'];  ?></h6></span><br>
                                <div class="form-group"><label for="company" class=" form-control-label">ولد</label><input required="true"  type="text" name="fname" value="<?php  echo $_POST['fname']; ?>" class="form-control"  pattern="[a-zA-Z ا ب ت ث ج ح خ د ذ ر ز س ش ص ض ط ظ ع غ ت ه ف ق ک ل م ن و ی پ چ ژ‌ ك‌‌ ئ ؤ ء ږ ټ ځ څ ډ ړ ڼ ګ ۍ ي ښ گ]+"  id="fname" ></div>
								<span class="text-danger"><h6> <?php echo $errors['fname'];  ?></h6></span><br>
                                <div class="form-group"><label for="company" class=" form-control-label">عکس استاد</label><input required="true"  type="file" name="propic" value="<?php echo $_POST["Picture"]; ?>" class="form-control" id="propic" ></div>
								 
                                <div class="form-group"><label for="company" class=" form-control-label">فوتوکاپی تذکره</label><input required="true"  type="file" name="propic1" value="" class="form-control" id="propic1" ></div>
								 
                                                                          
                                        <div class="form-group"><label for="street" class=" form-control-label">ایمل آدرس استاد</label><input required="true"  type="email" name="email" value="<?php  echo $_POST["email"];  ?>" id="email" class="form-control" ></div>
                                        <span class="text-danger"><h6> <?php echo $errors['email'];  ?></h6></span><br>
                                                    <div class="row form-group">
                                                <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">شماره تماس</label><input required="true"  type="text" name="mobnum" id="mobnum" value="<?php  echo $_POST["mobnum"];  ?>" class="form-control"  maxlength="10" pattern="[0-9]+"></div>
													<span class="text-danger"><h6> <?php echo $errors['mobnum'];  ?></h6></span><br>
                                                    </div>
                                                   
                                                    
                                                    </div>
                                                    <div style="font-size:20px;text-align:center;">سکونت اصلی</div>
                                                    
														<div class="col-12">
																<div style="text-align:right; font-size:17px" class="form-group"><label for="company" class=" form-control-label">ولایت</label><input required="true"  type="text" name="address"   pattern="[a-zA-Z ا ب ت ث ج ح خ د ذ ر ز س ش ص ض ط ظ ع غ ت ه ف ق ک ل م ن و ی پ چ ژ‌ ك‌‌ ئ ؤ ء ږ ټ ځ څ ډ ړ ڼ ګ ۍ ي ښ گ]+"   value="<?php  echo $_POST["address"];  ?>" class="form-control" id="address" ></div>
																<span class="text-danger"><h6> <?php echo $errors['address'];  ?></h6></span><br>
															<div style="text-align:right; font-size:17px" class="form-group"><label for="company" class=" form-control-label">ولسوالی</label><input  required="true" type="text" name="addressd"    pattern="[a-zA-Z ا ب ت ث ج ح خ د ذ ر ز س ش ص ض ط ظ ع غ ت ه ف ق ک ل م ن و ی پ چ ژ‌ ك‌‌ ئ ؤ ء ږ ټ ځ څ ډ ړ ڼ ګ ۍ ي ښ گ]+"  value="<?php  echo $_POST["addressd"];  ?>" class="form-control" id="addressd" ></div>
															<span class="text-danger"><h6> <?php echo $errors['addressd'];  ?></h6></span><br>
															<div style="text-align:right; font-size:17px" class="form-group"><label for="company" class=" form-control-label">قریه/ناحیه</label><input type="text" required="true"  name="addressa" pattern="[a-zA-Z ا ب ت ث ج ح خ د ذ ر ز س ش ص ض ط ظ ع غ ت ه ف ق ک ل م ن و ی پ چ ژ‌ ك‌‌ ئ ؤ ء ږ ټ ځ څ ډ ړ ڼ ګ ۍ ي ښ گ]+"  value="<?php  echo $_POST["addressa"];  ?>" class="form-control" id="addressa" ></div>
															<span class="text-danger"><h6> <?php echo $errors['addressa'];  ?></h6></span><br>
															
                                                    </div>
                                                     
														<div style="font-size:20px;text-align:center;">سکونت فعلی </div>
														<div class="col-12">
																<div class="form-group"><label for="company" class=" form-control-label">ولایت</label><input type="text" name="address1"  required="true"        pattern="[a-zA-Z ا ب ت ث ج ح خ د ذ ر ز س ش ص ض ط ظ ع غ ت ه ف ق ک ل م ن و ی پ چ ژ‌ ك‌‌ ئ ؤ ء ږ ټ ځ څ ډ ړ ڼ ګ ۍ ي ښ گ]+"  value="<?php  echo $_POST["address1"];  ?>" class="form-control" id="address1" ></div>
																<span class="text-danger"><h6> <?php echo $errors['address1'];  ?></h6></span><br>                                                             
																<div class="form-group"><label for="company" class=" form-control-label">ولسوالی</label><input type="text" name="addressd1"  required="true"   pattern="[a-zA-Z ا ب ت ث ج ح خ د ذ ر ز س ش ص ض ط ظ ع غ ت ه ف ق ک ل م ن و ی پ چ ژ‌ ك‌‌ ئ ؤ ء ږ ټ ځ څ ډ ړ ڼ ګ ۍ ي ښ گ]+"   value="<?php  echo $_POST["addressd1"];  ?>"class="form-control" id="addressd1" ></div>
																<span class="text-danger"><h6> <?php echo $errors['addressd1'];  ?></h6></span><br>                                                            
																<div class="form-group"><label for="company" class=" form-control-label">قریه/ناحیه</label><input type="text" name="addressa1" required="true" pattern="[a-zA-Z ا ب ت ث ج ح خ د ذ ر ز س ش ص ض ط ظ ع غ ت ه ف ق ک ل م ن و ی پ چ ژ‌ ك‌‌ ئ ؤ ء ږ ټ ځ څ ډ ړ ڼ ګ ۍ ي ښ گ]+"    value="<?php  echo $_POST["addressa1"];  ?>" class="form-control" id="addressa1"></div>
																<span class="text-danger"><h6> <?php echo $errors['addressa1'];  ?></h6></span><br>
														</div>
												 <!-- last change -->
												 
												 <div class="row form-group">
		<div class="col-12">
		<div class="form-group"><label for="city" class=" form-control-label">پوهنځی استاد</label>
			<select type="text" name="faculty"  required="true" id="faculty" value="" class="form-control" >
				<option value="">انتخاب پوهنځی	</option>
					<?php 
					$sql2 = "SELECT * from   faculty ";
					$query2 = $dbh -> prepare($sql2);
					$query2->execute();
					$result2=$query2->fetchAll(PDO::FETCH_OBJ);
					foreach($result2 as $row)
					{          
					?>  
				<option value="<?php echo htmlentities($row->faculty);?>"><?php echo htmlentities($row->faculty);?></option>
				 <?php } ?> 
			</select>
		</div>
		</div>
</div>


<div class="row form-group">


            <div class="col-6">
				<div class="form-group"><label for="city" class=" form-control-label">تاریخ ثبت</label><input  required="true" type="date" name="joiningdate" id="joiningdate" value="<?php echo $_POST["joiningdate"]; ?>" class="form-control"></div>
            </div>
			
			<div class="col-6">
				<div class="form-group"><label for="city" class=" form-control-label">تاریخ آخرین ترفع علمی</label><input  required="true" type="date" name="ljoiningdate" id="ljoiningdate" value="<?php echo $_POST["ljoiningdate"]; ?>" class="form-control" ></div>
            </div>
            
            </div>
												 
												 
												<!-- last change  -->
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