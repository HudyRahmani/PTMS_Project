<?php include_once('includes/dbconnection.php');


//Coding For query
if(isset($_POST['submit']))
{
$fname=$_POST['fname'];
$emailid=$_POST['emailid'];
$mobnum=$_POST['mobnum'];
$querymsg=$_POST['query'];
$teacherid=$_GET['tid'];
$sql="insert into tblquery(teacherId,fName,emailId,mobnum,Query)values(:teacherid,:fname,:emailid,:mobnum,:querymsg)";
$query=$dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':emailid',$emailid,PDO::PARAM_STR);
$query->bindParam(':mobnum',$mobnum,PDO::PARAM_STR);
$query->bindParam(':querymsg',$querymsg,PDO::PARAM_STR);
$query->bindParam(':teacherid',$teacherid,PDO::PARAM_STR);
$query->execute();
$LastInsertId=$dbh->lastInsertId();
if ($LastInsertId>0) {
echo '<script>alert("Message Sent Successfully.")</script>';
echo "<script>window.location.href ='index.php'</script>";
}else{
    echo '<script>alert("Something Went Wrong. Please try again")</script>';
   }}
?>
<!DOCTYPE html>
<html lang="fa">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>TRMS | Teachers Details</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
<?php include_once('includes/header.php'); ?>
            <!-- Page Content-->

<?php
$tid=intval($_GET['tid']);
$sql="SELECT * from tblteacher where isPublic='1' and ID='$tid'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?> 
            <section dir="rtl" class="py-0">
                <div class="container px-2 my-4">
                    <div class="text-center mb-4 bg-primary p-3 text-light">
                        <h2 class="fw-bolder">مشخصات 
					<?php if($row->sciencer=='1'){ ?>  
					 <td>پوهاند</td>
					 <?php } else if($row->sciencer=='2'){ ?>
					 
					<td>پوهنوال</td>
					 <?php } else if($row->sciencer=='3'){ ?>   
					<td>پوهندوی</td>
					 <?php } else if($row->sciencer=='4'){ ?>  
					
					<td>پوهنمل</td>
					 <?php  } else if($row->sciencer=='5'){ ?>  
					 
					<td>پوهنیار</td>
					 <?php  } else if($row->sciencer=='6'){ ?>   
					<td>نامزد پوهنیار </td>
					 <?php  } else { ?>   
					 <td>پوهیالی</td>
					 
					 <?php }  ?>
					 <?php  echo htmlentities($row->Name);?>"<?php echo htmlentities($row->lname);?>"
					 </h2>
					 
                        
                    </div>
                    <div class="row gx-5">
                        <div class="col-xl-8">
                            <!-- FAQ Accordion 1-->
                     <!--        <h2 class="fw-bolder mb-3">Persoanl Details </h2> -->
                            <div class="accordion mb-5  h-100" id="accordionExample">
                                <div class="accordion-item">
                                    <h1  class="accordion-header" id="headingOne"><button class="accordion-button" ><span style="font-size:18px;" >مشخصات شخصی</span></button></h1>
                                    <div class="accordion-collapse collapse show" id="collapseOne" >
                                        <div class="accordion-body">
											  <table class="table table-bordered">
												  
												<tr>
													  <th>عکس استاد</th>
													  <td  ><img src="teacher/images/<?php  echo htmlentities($row->Picture);?>" width="200"></td>
												  </tr>
												  <tr>
													  <th>نام</th>
													  <td><?php  echo htmlentities($row->Name);?>(<?php  echo htmlentities($row->lname);?>)</td>
												  </tr>

												  <tr>
													  <th>ایمل آدرس</th>
													  <td><?php  echo htmlentities($row->Email);?></td>
												  </tr>

												  <tr>
													  <th>شماره تماس </th>
													  <td><?php  echo htmlentities($row->mobnum);?></td>
												  </tr>
												  <tr>
													  <th>ولایت </th>
													  <td><?php  echo htmlentities($row->Address);?></td>
												  </tr>
												 
												  <tr>
                      <th>پوهنځی</th>
                      <td><?php  echo htmlentities($row->faculty);?></td>
                  </tr>
 
                  <tr>
                      <th>دیپارتمنت</th>
                      <td><?php  echo htmlentities($row->department);?></td>
                  </tr>
				  <tr>
                      <th>مدت خدمت به صفت کادر علمی</th>
                      <td><?php  echo htmlentities($row->teachingExp);?></td>
                  </tr>
                  <tr>
                      <th>درجه تحصیلی</th>
                     	 
					 <?php if($row->degree=='1'){ ?>  
					 <td>لیسانس</td>
					 
					 <?php } else if($row->degree=='2'){ ?>
					<td>ماستر</td>
					 
					 <?php } else if($row->degree=='3'){ ?>
					<td>دکتورا</td>
					 <?php } else { ?> 
						<td>مافوق دکتورا</td>
					 <?php } ?>
					 
					 
                  </tr>
				  
				   
				   <tr>
						<th>رتبه علمی</th>
						 
					 <?php if($row->sciencer=='1'){ ?>  
					 <td>پوهاند</td>
					 <?php } else if($row->sciencer=='2'){ ?>
					 
					<td>پوهنوال</td>
					 <?php } else if($row->sciencer=='3'){ ?>   
					<td>پوهندوی</td>
					 <?php } else if($row->sciencer=='4'){ ?>  
					
					<td>پوهنمل</td>
					 <?php  } else if($row->sciencer=='5'){ ?>  
					 
					<td>پوهنیار</td>
					 <?php  } else if($row->sciencer=='6'){ ?>   
					<td>نامزد پوهنیار </td>
					 <?php  } else { ?>   
					 <td>پوهیالی</td>
					 <?php }  ?>
					 
					</tr>
											  </table>
                                        </div>
                                    </div>
                                </div>
								</div>
                     
                            </div>
							
							 <div class="col-xl-4">
                            <div class="card border-0 h-100  mt-xl-1" style="background-color:#b3ffb3;">
                                <div class="card-body p-3 py-lg-4">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="text-center">
                                            <div class="h5 fw-bolder">اگر سوال دارید بفرمائید </div>
                                            <p class="text-muted mb-4">
                                                  با من ارتباط برقرار کنید 
                                                <br />
                                                <a href="#"><?php  echo htmlentities($row->Email);?></a>
                                            </p>
                                             
											<form method="post">
													 <p>  <input type="text" name="fname" placeholder="نام کامل خود را بنویسید" class="form-control" required></p>
													<p><input type="email" name="emailid" placeholder="ایمل آدرس خود را بنویسید" class="form-control" required></p>
													<p><input type="text" name="mobnum" placeholder="شماره تماس را بنویسید" class="form-control" pattern="[0-9]{10}" title="10 numeric characters only" required></p>
													<p><textarea class="form-control" rows="10"  name="query" placeholder="سوال / پیام / پشنهاد" required></textarea>
													</p>
													<input type="submit" class="btn btn-primary w-100" value="ارسال" name="submit">
											</form>

                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
							
							 
						
                    </div>
                </div>
            </section>
        <?php } } else{ ?>
<hr />
<h3 align="center" style="color:red;">چیزی ثبت نشده</h3>
        <?php } ?>
        </main>
        <!-- Footer-->
 <?php include_once('includes/footer.php'); ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
