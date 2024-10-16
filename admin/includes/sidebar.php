
<html>
<head>
	<style type="text/css"> 
		 #dropdown1:hover{
			background-color:grey;
			border-radius:25px; 
			
		} 
		#dropdown2:hover{
			font-size:16px;
		}
		#fontsize{
			font-size:17px;
		}
		#fontsize:hover{
			font-size:19px;
		}
		
	</style>
</head>
</html>

<aside id="left-panel" class="left-panel" >
        <nav class="navbar navbar-expand-sm  ">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button> 
                <a class="navbar-brand" href="dashboard.php">دشبورد مدیر | </a> 
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse noprint">
                <ul class="nav navbar-nav">
                    <li id="dropdown1"  class="active">
                        <a id="fontsize" href="dashboard.php"  > <i class="menu-icon fa fa-dashboard"></i>دشبورد</a>
                    </li>
					<li  id="dropdown1" class="menu-item-has-children dropdown">
                        <a id="fontsize" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  > <i class="menu-icon fa fa-tasks"></i>پوهنحی</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-file-o"></i><a id="dropdown2" href="add-subjects.php">اضافه کردن پوهنحی</a></li>
                            <li><i class="menu-icon fa fa-file-o"></i><a id="dropdown2" href="manage-subjects.php">مدیریت پوهنحی</a></li>
                        </ul>
                    </li>
					<li id="dropdown1"  class="menu-item-has-children dropdown">
                        <a id="fontsize" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>دیپارتمنت</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-file-o"></i><a  id="dropdown2" href="add-department.php">اضافه کردن دیپارتمنت</a></li>
                             <li><i class="menu-icon fa fa-file-o"></i><a id="dropdown2"  href="manage-department.php">مدیریت دیپارتمنت</a></li>
                        </ul>
                    </li>
					<li id="dropdown1" class="menu-item-has-children dropdown">
                        <a id="fontsize" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  > <i class="menu-icon fa fa-tasks"></i><span id="setcolor">استادان</span></a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i  class="menu-icon fa fa-file-o"></i><a id="dropdown2" href="add-teacher.php">اضافه کردن استادان</a></li>
                            <li><i class="menu-icon fa fa-file-o"></i><a id="dropdown2" href="manage-teacher.php">مدیریت استادان</a></li>
                        </ul>
                    </li>
					
					<li  id="dropdown1" class="menu-item-has-children dropdown">
                        <a id="fontsize" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" > <i class="menu-icon fa fa-tasks"></i>حساب های استادان</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-file-o"></i><a id="dropdown2"  href="add-acount.php">اضافه کردن حساب</a></li>
                            <li><i class="menu-icon fa fa-file-o"></i><a id="dropdown2"  href="manage-acount.php">مدیریت کردن حساب</a></li>
                        </ul>
                    </li>
					


					<li id="dropdown1" class="menu-item-has-children dropdown">
                        <a  id="fontsize"  href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" > <i class="menu-icon fa fa-tasks"></i>راپور</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-file-o"></i><a id="dropdown2" href="bwdates-report-ds.php">راپور توسط تاریخ</a></li>
                           
                        </ul>
                    </li>
					
					<li id="dropdown1"  class="active">
                        <a id="fontsize" href="search.php"  > <i class="menu-icon fa fa-search" ></i>جستجو کردن </a>
                    </li>
					
					<li id="dropdown1"  class="active">
                        <a id="fontsize" href="logout.php"  > <i class="menu-icon fa fa-power-off" ></i>بیرون شدن از سیستم </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>