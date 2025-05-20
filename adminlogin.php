<?php
include("header.php");
?>
<!-- /banner_bottom_agile_info -->
<div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Login</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

<!--adminlogin-->
<div class="container my-5">
   
   <div class="card px-5 c1">
   <?php
	  if(isset($_GET['msg'])){
	  echo "<div class='alert alert-success'>".$_GET['msg']."</div>";
	  }
	  ?>
	  <h1 class="text-center my-3">Admin Login</h1>
	  <form method="post" action="adminsubmit.php" enctype="multipart/form-data">
		  <div class="row my-3">
			  <div class="col-md-2">
				  <label>Email</label>
			  </div>
			  <div class="col-md-10">
				  <input required class="form-control" type="email" name="email">
			  </div>
		  </div>
		  <div class="row my-3">
			  <div class="col-md-2">
				  <label>Password</label>
			  </div>
			  <div class="col-md-10">
			  <input required class="form-control" type="password" name="password">
			  </div>
		  </div>
		  <button class="btn btn-primary d-block mx-auto my-3 w-50" name="submit_btn" style="width:25%;">Login</button>
	  </form>
  </div>
  </div>

<?php
include("footer.php")
?>
 