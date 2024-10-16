
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

<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default" style="font-size:20px;">
 
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button> 
                <a  class="navbar-brand" href="dashboard.php" style="font-size:20px;">دشبورد استاد</a>
                
            </div>

            <div   id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li id="dropdown1" class="active">
                        <a id="fontsize" href="dashboard.php"  > <i class="menu-icon fa fa-dashboard"></i>دشبورد </a>
                    </li>
					<li id="dropdown1" class="active">
                        <a id="fontsize" href="queries.php"> <i class="menu-icon fa fa-files-o"></i>سوالات  </a>
                    </li>
					<li id="dropdown1" class="active">
                        <a id="fontsize" href="profile.php"> <i class="menu-icon fa fa-user"></i>پروفایل  </a>
                    </li>
                      <li id="dropdown1" class="active">
                        <a id="fontsize" href="change-password.php"> <i class="menu-icon fa fa-cog"></i> تبدیل پسورد </a>
                    </li>
                      <li id="dropdown1" class="active">
                        <a id="fontsize" href="logout.php"> <i class="menu-icon fa fa-power-off"></i>خروج </a>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>