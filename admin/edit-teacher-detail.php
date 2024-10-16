<?php session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{
//Add Teacher Details  
if(isset($_POST['submit']))
{
$eid=$_GET['tid'];
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
$degree=$_POST['degree'];
$sciencer=$_POST['sciencer'];
$faculty=$_POST['faculty'];
$tdate=$_POST['joiningdate'];
$ljoiningdate=$_POST['ljoiningdate'];
$description=$_POST['description'];
$teachexp=$_POST['teachingexp'];
$status=$_POST['status'];
$sql="update tblteacher set Name=:tname,lname=:lname,fname=:fname,mzf=:mzf,mzm=:mzm,ls=:ls,ms=:ms,do=:do,ls1=:ls1,ms1=:ms1,do1=:do1,Email=:email,mobnum=:mobnum,department=:department,degree=:degree,sciencer=:sciencer,Address=:address,addressd=:addressd,addressa=:addressa,address1=:address1,addressd1=:addressd1,addressa1=:addressa1,faculty= :faculty,JoiningDate=:joiningdate,ljoiningdate=:ljoiningdate,description=:description,teachingExp=:teachexp,isPublic=:status where ID=:eid";
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
	header("location:manage-teacher.php?update=success");
  }
  ?>

<!doctype html>
<html class="no-js" lang="fa">

<head>
   
    <title>پروفایل استادان</title>
  
    <link rel="apple-touch-icon" href="apple-icon.png">
  


    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
	
	
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body style="'Times new roman';">
    <!-- Left Panel -->

    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header.php');?>

        <div dir="rtl" class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>جزیات پروفایل استادان</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">دشبورد</a></li>
                            <li><a href="manage-teacher.php">اپدیت استاد</a></li>
                            <li class="active">اپدیت</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
		<div class="float-right" style="margin-right:20px;">
			<a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addPostModal"> <i class="fa fa-camera pr-2"></i> نمایش همه مشخصات استاد</a> 
			
		</div>
        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                  
                    <!--/.col-->
<!--------------------------------------------------------------------------------------------------->
                    
<div style="text-align:right;" class="col-lg-6" style="float-left:left !important">
	<div class="card">
			<div class="card-header"><strong>مشخصات علمی </strong><strong>استاد </strong></div>
			<form dir="rtl" name="" method="post" action="" enctype="multipart/form-data">                   
		<div class="card-body card-block">
					 <?php
					$eid=$_GET['tid'];
					$sql="SELECT * from  tblteacher where ID=$eid";
					$query = $dbh -> prepare($sql);
					$query->execute();
					$results=$query->fetchAll(PDO::FETCH_OBJ);
					$cnt=1;
					if($query->rowCount() > 0)
					{
					foreach($results as $row)
					{               ?>
					
					<div class="row form-group">
					<div class="col-12">
					<div class="form-group">
					<label for="city" class=" form-control-label">موقف ضمنی فعلی</label>
					<input type="text" name="mzf" id="mzf" value="<?php  echo $row->mzf;?>" class="form-control" required="true">
					</div>
					</div>
					</div>
					
					<div class="row form-group">
					<div class="col-12">
					<div class="form-group">
					<label for="city" class=" form-control-label">موقف ضمنی از لحاظ موجودیت</label>
					<input type="text" name="mzm" id="mzm" value="<?php  echo $row->mzm;?>" class="form-control" required="true">
					</div>
					</div>
					</div>
					
					<div style="text-align:center;font-size:20px;">رشته های تحصیلی</div>
					<div class="row form-group">
					<div class="col-12">
						<div class="form-group"><label for="city" class=" form-control-label">رشته تحصیلی لیسان</label><input type="text" name="ls" id="ls" value="<?php  echo $row->ls;?>" class="form-control" required="true"></div>
						<div class="form-group"><label for="city" class=" form-control-label">رشته تحصیلی ماستری</label><input type="text" name="ms" id="ms" value="<?php  echo $row->ms;?>" class="form-control" required="true"></div>
						<div class="form-group"><label for="city" class=" form-control-label">رشته تحصیلی دوکتورا</label><input type="text" name="do" id="do" value="<?php  echo $row->do; ?>" class="form-control" required="true"></div>
					</div>
					</div>
					
					<div style="text-align:center;font-size:20px;">مراجع تحصیل</div>
					<div class="row form-group">
					<div class="col-12">
						<div class="form-group"><label for="city" class=" form-control-label">لیسانس</label><input type="text" name="ls1" id="ls1" value="<?php  echo $row->ls1;?>" class="form-control" required="true"></div>
						<div class="form-group"><label for="city" class=" form-control-label">ماستری</label><input type="text" name="ms1" id="ms1" value="<?php  echo $row->ms1;?>" class="form-control" required="true"></div>
						<div class="form-group"><label for="city" class=" form-control-label">دوکتورا</label><input type="text" name="do1" id="do1" value="<?php  echo $row->do1;?>" class="form-control" required="true"></div>
					</div>
					</div>
					<!--
					<div class="row form-group">
					<div class="col-12">
					<div class="form-group">
					<label for="city" class=" form-control-label">دیپارتمنت</label>
					<input type="text" name="department" id="department" value=" " class="form-control" required="true">
					</div>
					</div>
					</div>
					---> 
					<div class="form-group"><label for="city" class=" form-control-label">دیپارتمنت استاد</label>
					<select type="text" name="department" id="department" value="" class="form-control" required="true">
					<option value="<?php  echo $row->department;?>"><?php  echo $row->department;?></option>
							<?php 
							$sql2 = "SELECT * from   department ";
							$query2 = $dbh -> prepare($sql2);
							$query2->execute();
							$result2=$query2->fetchAll(PDO::FETCH_OBJ);
							foreach($result2 as $row1)
							{          
							?>  
					<option value="<?php echo htmlentities($row1->department);?>"><?php echo htmlentities($row1->department);?></option>
					 <?php } ?> 
					</select></div>
					 
					 
					
					<!--
					<div class="row form-group">
						<div class="col-12">
						<div class="form-group">
						<label for="city" class=" form-control-label">درجه تحصیلی</label>
						<input type="text" name="degree" id="degree" value=" " class="form-control" required="true">
						</div>
						</div>
					</div>
					-->
					<div class="row form-group">
					<div class="col-12">
					<div class="form-group"><label for="city" class=" form-control-label">درجه تحصیلی</label>
						<select type="text" name="degree" id="degree" value="" class="form-control" required="true">
					 <?php if($row->degree=='1'){ ?>  
					<option value="1">لیسانس 		</option>
					<option value="2">ماستر		</option>
					<option value="3">دکتور		</option>
					<option value="4">مافوق دکتور 		</option>
					 
					 <?php } else if($row->degree=='2'){ ?>
					<option value="2">ماستر		</option>
					<option value="1">لیسانس 		</option>
					<option value="3">دکتور		</option>
					<option value="4">مافوق دکتور 		</option>
					 
					 <?php } else if($row->degree=='3'){ ?>
					<option value="3">دکتور		</option>
					<option value="2">ماستر		</option>
					<option value="1">لیسانس 		</option>
					<option value="4">مافوق دکتور 		</option>
					 <?php } else { ?> 
						<option value="4">مافوق دکتور 		</option>
						<option value="3">دکتور		</option>
						<option value="2">ماستر		</option>
						<option value="1">لیسانس 		</option>
					 <?php } ?>
					 
					</select></div>
					</div>
					 </div>
					
					
					<div class="row form-group">
					<div class="col-12">
					<div class="form-group"><label for="city" class=" form-control-label">رتبه علمی</label>
						<select type="text" name="sciencer" id="sciencer" value="" class="form-control" required="true">
					 <?php if($row->sciencer=='1'){ ?>  
					<option value="1">پوهاند 		</option>
					<option value="2">پوهنوال		</option>
					<option value="3">پوهندوی		</option>
					<option value="4">پوهنمل 		</option>
					<option value="5">پوهنیار		</option>
					<option value="6">نامزد پوهنیار </option>
					<option value="7">پوهیالی       </option>
					 <?php } else if($row->sciencer=='2'){ ?>
					<option value="2">پوهنوال</option>
					<option value="1">پوهاند</option>
					<option value="3">پوهندوی</option>
					<option value="4">پوهنمل</option>
					<option value="5">پوهنیار</option>
					<option value="6">نامزد پوهنیار</option>
					<option value="7">پوهیالی</option>
					 <?php } else if($row->sciencer=='3'){ ?>  
					<option value="3">پوهندوی		</option>
					<option value="1">پوهاند 		</option>
					<option value="2">پوهنوال		</option>
					<option value="4">پوهنمل 		</option>
					<option value="5">پوهنیار		</option>
					<option value="6">نامزد پوهنیار </option>
					<option value="7">پوهیالی       </option>
					 <?php } else if($row->sciencer=='4'){ ?>  
					<option value="4">پوهنمل 		</option>
					<option value="1">پوهاند 		</option>
					<option value="2">پوهنوال		</option>
					<option value="3">پوهندوی		</option>
					<option value="5">پوهنیار		</option>
					<option value="6">نامزد پوهنیار </option>
					<option value="7">پوهیالی       </option>
					 <?php  } else if($row->sciencer=='5'){ ?>  
					<option value="5">پوهنیار		</option>
					<option value="1">پوهاند 		</option>
					<option value="2">پوهنوال		</option>
					<option value="3">پوهندوی		</option>
					<option value="4">پوهنمل 		</option>
					<option value="6">نامزد پوهنیار </option>
					<option value="7">پوهیالی       </option>
					 <?php  } else if($row->sciencer=='6'){ ?>  
					<option value="6">نامزد پوهنیار </option>
					<option value="1">پوهاند 		</option>
					<option value="2">پوهنوال		</option>
					<option value="3">پوهندوی		</option>
					<option value="4">پوهنمل 		</option>
					<option value="5">پوهنیار		</option>
					<option value="7">پوهیالی       </option>
					 <?php  } else { ?>  
					<option value="7">پوهیالی       </option>
					<option value="1">پوهاند 		</option>
					<option value="2">پوهنوال		</option>
					<option value="3">پوهندوی		</option>
					<option value="4">پوهنمل 		</option>
					<option value="5">پوهنیار		</option>
					<option value="6">نامزد پوهنیار </option>
					 <?php }  ?>
					</select></div>
					</div>
					 </div>
					
					<div class="row form-group">
					<div class="col-12">
					<div class="form-group">
					<label for="city" class=" form-control-label">مدت خدمت به صفت کادر علمی</label>
					<input type="text" name="teachingexp" id="teachingexp" pattern="[0-9]+" title="only numbers"  value="<?php  echo $row->teachingExp;?>" class="form-control" required="true">
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
					<div class="form-group"><label for="city" class=" form-control-label">حالت پروفایل <small style="color:red">(اگر عمومی باشد همه می بیند و اگر عمومی نباشد فقط خود شما می بینید)</small></label>
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


<!------------------------------------------------------------------------------------------------------->
			</div>
			<p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit"><i class="fa fa-plus pr-2"></i> اپدیت</button></p> 
			
       </div>   

 </div>
 
<!---------------------------------------------------------------------------------------------------->
<div style="text-align:right;" class="col-lg-6">
      <div dir="rtl" class="card">
						<div class="card-header"><strong> مشخصات شخصی </strong><strong>استاد</strong></div>
			
		<div class="card-body card-block">
				<div class="form-group">
				<label for="company" class=" form-control-label">نام استاد</label>
				<input type="text" name="tname" value="<?php  echo $row->Name;?>" class="form-control" id="tname" required="true"  pattern="[a-zA-Z آ ا ب ت ث ج ح خ د ذ ر ز س ش ص ض ط ظ ع غ ت ه ف ق ک ل م ن و ی پ چ ژ‌ ك‌‌ ئ ؤ ء ږ ټ ځ څ ډ ړ ڼ ګ ۍ ي ښ]+" >
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
				<img src="images/no-image.png" width="150" height="150"  alt="NO Image">
				<?php else: ?>    
				<img src="../teacher/images/<?php echo $row->Picture;?>" width="150" height="150" value="<?php  echo $row->Picture;?>">
				<?php endif;?>
				<a href="changeimage.php?tid=<?php echo $row->ID;?>" style="color:blue;font-size:18px;"> &nbsp; ایدیت کردن عکس استاد</a>
				</div>
				
				<div class="form-group">
				<label for="company" class=" form-control-label" >فوتوکاپی</label> &nbsp;
				<?php if($row->propic1==''):?>
				<img src="images/no-image.png" width="150" height="150"  alt="NO Image">
				<?php else: ?>    
				<img src="../teacher/idimages/<?php echo $row->propic1;?>" width="150" height="150" value="<?php  echo $row->propic1;?>">
				<?php endif;?>
				<a href="changeimage1.php?tid=<?php echo $row->ID;?>" style="color:blue;font-size:18px;"> &nbsp; تبدیل فوتوکاپی تذکره</a>
				</div>
				
				<div class="form-group">
				<label for="street" class=" form-control-label">ایمل آدرس استاد</label>
				<input type="email" name="email" value="<?php  echo $row->Email;?>" id="email" class="form-control" required="true">
				</div>



				<div class="row form-group">
				<div class="col-12">
				<div class="form-group"><label for="city" class=" form-control-label">شماره تماس استاد</label><input type="text" name="mobnum" id="mobnum" value="<?php  echo $row->mobnum;?>" class="form-control" required="true" maxlength="10" pattern="[0-9]+"></div>
				</div>
				</div>

				<div style="text-align:center;font-size:20px;">سکونت اصلی</div>
				<div class="row form-group">
					<div class="col-12">
						<div class="form-group"><label for="city" class=" form-control-label">ولایت</label><input type="text" name="address" id="address" value="<?php  echo $row->Address;?>" class="form-control" required="true"></div>
						<div class="form-group"><label for="city" class=" form-control-label">ولسوالی</label><input type="text" name="addressd" id="addressd" value="<?php  echo $row->addressd;?>" class="form-control" required="true"></div>
						<div class="form-group"><label for="city" class=" form-control-label">قریه/ناحیه</label><input type="text" name="addressa" id="addressa" value="<?php  echo $row->addressa;?>" class="form-control" required="true"></div>
						
					</div>
					
				</div>
				
				<div style="text-align:center;font-size:20px;">سکونت فعلی</div>
				<div class="row form-group">
					<div class="col-12">
						<div class="form-group"><label for="city" class=" form-control-label">ولایت</label><input type="text" name="address1" id="address1" value="<?php  echo $row->address1;?>" class="form-control" required="true"></div>
						<div class="form-group"><label for="city" class=" form-control-label">ولسوالی</label><input type="text" name="addressd1" id="addressd1" value="<?php  echo $row->addressd1;?>" class="form-control" required="true"></div>
						<div class="form-group"><label for="city" class=" form-control-label">قریه/ناحیه</label><input type="text" name="addressa1" id="addressa1" value="<?php  echo $row->addressa1;?>" class="form-control" required="true"></div>
						
					</div>
					
				</div>
				
				<div class="row form-group">
					<div class="col-12">
					<div class="form-group"><label for="city" class=" form-control-label">پوهنځی استاد</label>
					<select type="text" name="faculty" id="faculty" value="" class="form-control" required="true">
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
					<div class="col-6">
					<div class="form-group"><label for="city" class=" form-control-label">تاریخ ثبت</label><input type="date" name="joiningdate" id="joiningdate" value="<?php  echo $row->JoiningDate;?>" class="form-control" required="true"></div>
					</div>
					
					<div class="col-6">
					<div class="form-group"><label for="city" class=" form-control-label">تاریخ آخرین ترفع علمی</label><input type="date" name="ljoiningdate" id="ljoiningdate" value="<?php  echo $row->ljoiningdate;?>" class="form-control" required="true"></div>
					</div>
				</div>
				
				 
					 
			 

<!----------------------------------------------------------------------------------------------->

</div>
<?php $cnt=$cnt+1;}} ?>


        </div>
     </form>
</div>
<!------------------------------------------------------------------------------------------->                                         
										   
										   
										   
										   
										   
										   
										   
										   
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->
								</div>
   <div class="modal fade" id="addPostModal" >
    <div class="modal-dialog modal-lg" >
      <div class="modal-content" >
        <div class="modal-body"  style="width:100%;height:100%;">
            
             <img class="pull-right" style="width:80px;height:80px; border-raduis:50px;" src="../images/logo1.png">
             <img class="pull-left" style="width:80px;height:80px; border-raduis:50px;" src="../images/logo.jpeg">
			 <div style="text-align:center;font-size:23px;">
				<span >وزارت تحصیلات عالی ا.ا.ا</span> <br>
				<span >پوهنتون پروان</span><br>
				<span >معاونیت  امور علمی</span><br>
				<span > آمریت تقرر و ترفیعات استادان</span> 
				<hr>
			 </div>
				<div style="text-align:right;" > 
						 <h5 style="text-align:center; margin-bottom:7px;">شهرت استاد</h5>
						 
						 <table style="width:100%;"  class="table  table-bordered">
								<tr>
									<td rowspan="5" style="padding-left:-20px;"><img src="../teacher/images/<?php echo $row->Picture;?>" width="100" height="130"></td>
									 
									<td colspan="2" style="text-align:center;font-size:13px;padding:3px;font-weight:bold;">سکونت فعلی</td>
									 
									<td colspan="2" style="text-align:center;font-size:13px;padding:3px;font-weight:bold;">سکونت اصلی</td>
									<td style="text-align:center;font-size:13px;padding:3px;width:120px;"><?php  echo $row->Name;?></td>
									<td style="text-align:center;font-size:13px;padding:3px;font-weight:bold;"  > نام</td>
								</tr>
								<tr>
									 
									<td style="text-align:center;font-size:13px;padding:3px;width:160px;"><?php  echo $row->address1;?></td>
									<td style="text-align:center;font-size:13px;padding:3px;font-weight:bold">ولایت</td>
									<td style="text-align:center;font-size:13px;padding:3px;width:150px;"><?php  echo $row->Address;?></td>
									<td style="text-align:center;font-size:13px;padding:3px;font-weight:bold">ولایت</td>
									<td style="text-align:center;font-size:13px;padding:3px;width:120px;"><?php  echo $row->lname;?></td>
									<td style="text-align:center;font-size:13px;padding:3px;font-weight:bold;" > تخلص</td>
								</tr>
								<tr>
									 
									<td style="text-align:center;font-size:13px;padding:3px;width:160px;"><?php  echo $row->addressd1;?></td>
									<td style="text-align:center;font-size:12px;padding:3px;font-weight:bold">ولسوالی</td>
									<td style="text-align:center;font-size:13px;padding:3px;width:150px;"><?php  echo $row->addressd;?></td>
									<td style="text-align:center;font-size:12px;padding:3px;font-weight:bold">ولسوالی</td>
									<td style="text-align:center;font-size:13px;padding:3px;width:120px;"><?php  echo $row->fname;?></td>
									<td style="text-align:center;font-size:10px;padding:3px;font-weight:bold;" >نام پدر</td>
								</tr>
								<tr>  
									 
									<td style="text-align:center;font-size:13px;padding:3px;width:160px;"><?php  echo $row->addressa1;?></td>
									<td style="text-align:center;font-size:13px;padding:3px;font-weight:bold">قریه/ناحیه</td>
									<td style="text-align:center;font-size:13px;padding:3px;width:150px;"><?php  echo $row->addressa;?></td>
									<td style="text-align:center;font-size:13px;padding:3px;font-weight:bold">قریه/ناحیه</td>
									<td style="text-align:center;font-size:13px;padding:3px;width:120px;"><?php  echo $row->mobnum;?></td>
									<td style="text-align:center;font-size:13px;padding:3px;font-weight:bold;" >شماره</td>
								</tr>
								<tr>  
									 
									 
									<td colspan="5" style="text-align:center;font-size:13px;padding:5px;"><?php  echo $row->Email;?></td>
									<td style="text-align:center;font-size:13px;padding:5px;font-weight:bold;" >ایمل آدرس</td>
								</tr> 
						</table>
				</div>
				<br>
				<div style="text-align:right;" > 
						 <h5 style="text-align:center; margin-bottom:7px;">مشخصات علمی استاد</h5>
						 
						 <table style="width:100%;"  class="table  table-bordered">
								<tr>
									<td colspan="2" style="text-align:center;font-size:13px;padding:3px;font-weight:bold;">رشته های تحصیلی</td>
									<td style="text-align:center;font-size:13px;padding:3px;width:120px;"><?php  echo $row->faculty;?></td>
									<td style="text-align:center;font-size:13px;padding:3px;font-weight:bold;width:110px;"> پوهنځی استاد </td>
								</tr>
								<tr> 
									<td style="text-align:center;font-size:13px;padding:3px;width:150px;"><?php  echo $row->ls;?></td>
									<td style="text-align:center;font-size:13px;padding:3px;font-weight:bold;width:110px;">رشته تحصیلی لیسانس</td>
									<td style="text-align:center;font-size:13px;padding:3px;width:120px;"><?php  echo $row->mzf;?></td>
									<td style="text-align:center;font-size:13px;padding:3px;font-weight:bold;" > موقف ضمنی فعلی</td>
								</tr>
								<tr>
									 
									 
									<td style="text-align:center;font-size:13px;padding:3px;width:150px;"><?php  echo $row->ms;?></td>
									<td style="text-align:center;font-size:12px;padding:3px;font-weight:bold">رشته تحصیلی ماستری</td>
									<td style="text-align:center;font-size:13px;padding:3px;width:120px;"><?php  echo $row->mzm;?></td>
									<td style="text-align:center;font-size:10px;padding:3px;font-weight:bold;" >موقف ضمنی از لحاظ موجودیت</td>
								</tr>
								<tr>  
									  
									<td style="text-align:center;font-size:13px;padding:3px;width:150px;"><?php  echo $row->do;?></td>
									<td style="text-align:center;font-size:13px;padding:3px;font-weight:bold">رشته تحصیلی دکترا</td>
									<td style="text-align:center;font-size:13px;padding:3px;width:120px;">
										
										 <?php if($row->sciencer=='1'){ ?>  
										<option value="1">پوهاند 		</option>
										 <?php } else if($row->sciencer=='2'){ ?>
										<option value="2">پوهنوال</option>
										 <?php } else if($row->sciencer=='3'){ ?>  
										<option value="3">پوهندوی		</option>
										 <?php } else if($row->sciencer=='4'){ ?>  
										<option value="4">پوهنمل 		</option>
										 
										 <?php  } else if($row->sciencer=='5'){ ?>  
										<option value="5">پوهنیار		</option>
										 
										 <?php  } else if($row->sciencer=='6'){ ?>  
										<option value="6">نامزد پوهنیار </option>
										 
										 <?php  } else { ?>  
										<option value="7">پوهیالی       </option>
										 
										 <?php }  ?>
										
									</td>
									<td style="text-align:center;font-size:13px;padding:3px;font-weight:bold;" >رتبه علمی</td>
								</tr>
								 
						</table>
				</div>
				
				
				
				<div style="text-align:right;" > 
						 <table style="width:100%;"  class="table  table-bordered">
								<tr>
									<td colspan="2" style="text-align:center;font-size:13px;padding:3px;font-weight:bold;">مراجع تحصیلی</td>
									<td style="text-align:center;font-size:13px;padding:3px;width:120px;"><?php  echo $row->department;?></td>
									<td style="text-align:center;font-size:13px;padding:3px;font-weight:bold;width:110px;"> دیپارتمنت </td>
								</tr>
								<tr> 
									<td style="text-align:center;font-size:13px;padding:3px;width:150px;"><?php  echo $row->ls1;?></td>
									<td style="text-align:center;font-size:13px;padding:3px;font-weight:bold;width:110px;">لیسانس</td>
									<td style="text-align:center;font-size:13px;padding:3px;width:120px;"><?php  echo $row->degree;?></td>
									<td style="text-align:center;font-size:13px;padding:3px;font-weight:bold;" > رتبه علمی</td>
								</tr>
								<tr>
									 
									 
									<td style="text-align:center;font-size:13px;padding:3px;width:150px;"><?php  echo $row->ms1;?></td>
									<td style="text-align:center;font-size:12px;padding:3px;font-weight:bold">ماستری</td>
									<td style="text-align:center;font-size:13px;padding:3px;width:120px;"><?php  echo $row->JoiningDate;?></td>
									<td style="text-align:center;font-size:10px;padding:3px;font-weight:bold;" >تاریخ ثبت</td>
								</tr>
								<tr>  
									  
									<td style="text-align:center;font-size:13px;padding:3px;width:150px;"><?php  echo $row->do1;?></td>
									<td style="text-align:center;font-size:13px;padding:3px;font-weight:bold">دکترا</td>
									<td style="text-align:center;font-size:13px;padding:3px;width:120px;"><?php  echo $row->ljoiningdate;?></td>
									<td style="text-align:center;font-size:13px;padding:3px;font-weight:bold;" >تاریخ آخرین ترفع</td>
								</tr>
								<tr>  
									  
									<td colspan="2" style="text-align:center;font-size:13px;padding:3px;width:150px;"><?php  echo $row->teachingExp;?></td>
									 
									<td colspan="2" style="text-align:center;font-size:13px;padding:3px;font-weight:bold;" >مدت خدمت به صفت کادر علمی</td>
								</tr>
								 
						</table>
				</div>
				
				
				<div style="text-align:right;" > 
						 <table style="width:100%;"  class="table  table-bordered">
								 
								<tr> 
									 
									<td colspan="4" style="text-align:center;font-size:13px;padding:3px;font-weight:bold;" > مشخصات بیشتر استاد</td>
									
									
								</tr>
								
								<tr> 
									<td   style="font-size:16px;height:150px;" > <?php  echo $row-> description;?></td>
								</tr>
								
						</table> 
				</div>
				<
				<div class="text-center">
					<button onclick="(function(){
						var printContents = document.getElementById('addPostModal').innerHTML;
									var orgContents = document.body.innerHTML;
									
									document.body.innerHTML = printContents;
									alert(window.screen.width, printContents.width);
									alert(window.screen.width, printContents.width);
									//window.print();
									
									//document.body.innerHTML = orgContents;
					})()" class="btn btn-primary" id="print-btn">print</button>
				</div>
				 
      </div>
				
    </div>
  </div>
</div>

							
                            <script src="../vendors/jquery/dist/jquery.min.js"></script>
                            <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="../vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="../vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="../assets/js/main.js"></script>
</body>
</html>
<?php }  ?>
