<?php include_once('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="fa"  style="font-family:times new roman;">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="سیستم معلوماتی استادان پوهنتون پروان" />
        <meta name="author" content="شریف" />
        <title> سیستم معلوماتی استادان پوهنتون پروان</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
			
		<link rel="stylesheet" href="images/style.css" type="text/css" />
		 <script type="text/javascript" src="images/jquery-2.2.2.min.js"></script>
	     <script type="text/javascript" src="images/jquery.cycle.all.js"></script>
				 <script type="text/javascript">
					  $('#slider').cycle({
						fx:    'fade',
						pager:  '#pager',
						timeout: 4000,
						speed:   3000
					  });
					   
				  </script>
				  
	<style type="text/css">
		 #award:hover{
			background-color:#ffff4d;
			border-radius:50px;
		}
		#award{
			border-radius:50px;
		}
	</style>
				  
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation --> 
 <?php include_once('includes/header.php');?>
            <!-- Header-->
            <header style="background-color:rgb(125,65,124)">
                <div class="container  ">
                    <div class=" row gx-4 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-8 col-xxl-5">
                            <div class="  text-center text-xl-start">
							<marquee>
                                <h2 class="display-9 fw-bolder text-white  " style="font-family:times new roman;"> سیستم معلوماتی آمریت تقرر و ترفیعات استادان پوهنتون پروان</h2>
                            </marquee>
                                <div   class="py-1 d-grid gap-5 d-sm-flex justify-content-sm-center  " > 
                                    <a id="award"   class="btn btn-outline-light btn-lg px-5" href="teacher/index.php">وارد شدن به سیستم</a>
                                </div>
                            </div>
                        </div>
						 
                        <div  class="col-xl-12 col-xxl-11 d-none d-xl-block text-center">
							 <div id="slider">
			
							<div class="item">
								<img src="images/1.jpg"> 	
							</div>
							
							<div class="item">
								<img src="images/2.jpg">
							</div>
							
							<div class="item">
							   <img src="images/3.jpg">
							</div>
							
							<div class="item">
							   <img src="images/4.jpg">
							</div>
							
							
							<div class="item">
							   <img src="images/5.jpg">
							</div>
							
						</div>

						</div>
						<!--
						<div id="galleray" style="height:300px;" >
							<img src="images/pic (1).jpg" class="img img-rounded" style="height:300px; width:100%;">
						</div>
						-->
                    </div>
                </div>
            </header>

            <!-- Blog preview section incorrect addresss here -->
            <section class="py-5">
                <div class="container px-3 my-3">

                    <form dir="rtl" method="post" action="search-result.php">
   <aside dir="rtl" class="bg-primary bg-gradient rounded-3 p-3 p-sm-3 mt-2">
                        <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                            <div class="mb-4 mb-xl-0">
                                <div class="fs-3 fw-bold text-white">جستجو استادان توسط نام یا پوهنحی</div>
                            </div>
                            <div dir="rtl" class="ms-xl-4">
                                <div class="input-group ">
                                    <input class="form-control" type="text" placeholder="جستجوی استاد توسط نام و مضمون" aria-label="Email address..." aria-describedby="button-newsletter" name="searchinput" required style="width:350px;border-radius:0px;" />
                                    <button class="btn btn-outline-light" id="button-newsletter" style="border-radius:0px;" type="submit">جستجو</button>
                                </div>
                            </div>
                        </div>
                    </aside>
                </form>
                    <hr />

                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <div class="text-center">
                                <h2 class="fw-bolder">لیست استادان</h2>
<hr color="red" />
                            </div>
                        </div>
                    </div>
                    <div dir="rtl" class="row gx-5">
                                    <?php
$sql="SELECT * from tblteacher where isPublic='1' limit 9";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $row)
{               	?>  

                        <div dir="rtl" class="col-lg-3 mb-5">
                            <div class="card h-100  shadow border-0">
                                <img class="card-img-top h-100"  src="teacher/images/<?php echo $row->Picture;?>" alt="<?php  echo htmlentities($row->Name);?>" />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2"><?php  echo htmlentities($row->faculty);?></div>
                                    <a class="text-decoration-none link-dark stretched-link" href="teacher-details.php?tid=<?php echo $row->ID;?>" target="_blank">
                                          <h5 class="card-title mb-3"><?php  echo htmlentities($row->Name);?>(<?php  echo htmlentities($row->lname);?>)</h5></a>
                                    <p class="card-text mb-0"><small><strong>وظیفه:</strong><?php  echo htmlentities($row->mzf);?></small></p>
                                </div>
                         
                            </div>
                        </div>
<?php }} else{?>
<h3 align="center" style="color:red;">استاد یافت نشد</h3>
<?php } ?>
                 
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
<?php include_once('includes/footer.php'); ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
