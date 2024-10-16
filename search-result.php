<?php include_once('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="fa">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>سیستم  مدیریتی استادان پوهنتون پروان</title>
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
 <?php include_once('includes/header.php');?>
            <!-- Header-->


            <!-- Blog preview section-->
            <section class="py-5">
                <div class="container px-3 my-3">
                    <form dir="rtl" method="post" action="search-result.php">
				<aside dir="rtl" class="bg-primary bg-gradient rounded-2 p-3 p-sm-3 mt-3">
                        <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                            <div class="mb-4 mb-xl-0">
                                <div class="fs-3 fw-bold text-white">جستجو استادان توسط نام یا پوهنځی</div>
                            </div>
                            <div class="ms-xl-4">
                                <div class="input-group mb-2">
                                    <input class="form-control" type="text" placeholder="جستجو توسط نام و پوهنځی..." aria-label="Email address..." aria-describedby="button-newsletter" name="searchinput" required style="width:350px;border-radius:0px;" />
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
	<?php     $searchdata=$_POST['searchinput'];?>

                                <h2 class="fw-bolder"><font color="red"><?php echo $searchdata;?></font></h2>
								<hr color="red" />
                            </div>
                        </div>
                    </div>
                    <div dir="rtl" class="row gx-5">
                                    <?php
$sql="SELECT * from tblteacher where (isPublic='1') and (Name  like '%$searchdata%'|| faculty like '%$searchdata%')";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>  

                        <div class="col-lg-3 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top h-100" src="teacher/images/<?php echo $row->Picture;?>" alt="<?php  echo htmlentities($row->Name);?>" />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2"><?php  echo htmlentities($row->faculty);?></div>
                                    <a class="text-decoration-none link-dark stretched-link" href="teacher-details.php?tid=<?php echo $row->ID;?>" target="_blank">
                                         <h5 class="card-title mb-3"><?php  echo htmlentities($row->Name);?>(<?php  echo htmlentities($row->lname);?>)</h5></a>
                                    <p class="card-text mb-0"><small><strong>وظیفه:</strong><?php  echo htmlentities($row->mzf);?></small></p>
                                </div>
                         
                            </div>
                        </div>
<?php }} else {?>
<h3 align="center" style="color:red;"> پیدا نشد دوباره کوشش کنید</h3>
<?php } ?>
                 
                    </div>
                    <!-- Call to action-->
             
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
