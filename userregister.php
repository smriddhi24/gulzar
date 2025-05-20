<?php
include("header.php");
?>
<div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sign Up</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

	<div class="container my-5">
   
   <div class="card px-5 c1">
   <?php
	  if(isset($_GET['msg'])){
	  echo "<div class='alert alert-success'>".$_GET['msg']."</div>";
	  }
	  ?>
	  <h1 class="text-center my-3">Register</h1>
	  <form method="post"  >
		  <div class="row my-3">
			  <div class="col-md-2">
				  <label>Name</label>
			  </div>
			  <div class="col-md-10">
				  <input required class="form-control" type="text" name="name">
			  </div>
		  </div>
		  <div class="row my-3">
			  <div class="col-md-2">
				  <label>Contact</label>
			  </div>
			  <div class="col-md-10">
				  <input required class="form-control" type="number" name="contact">
			  </div>
		  </div>
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
		  <div class="row my-3">
			  <div class="col-md-2">
				  <label>Address</label>
			  </div>
			  <div class="col-md-10">
			  <input required class="form-control" type="text" name="address">
			  </div>
		  </div>
		  <button class="btn btn-primary d-block mx-auto my-3 w-50" name="btn" style="width:25%;">Register</button>
	  </form>
  </div>
</div>
<!--/adminlogin-->  
<?php
if(isset($_REQUEST['btn'])){
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $password=MD5($_REQUEST['password']);
    $address=$_REQUEST['address'];
    $contact=$_REQUEST['contact'];
    $query="INSERT into `user`(`name`, `email`, `password`, `address`, `contact`) VALUES ('$name','$email','$password','$address','$contact')";
    include('config.php');
    $result=mysqli_query($connect,$query);
    if($result>0){
        echo "<script>window.location.assign('userlogin.php?msg=Register Successful!!please login')</script>";
    }
    else{
        echo "<script>window.location.assign('userregister.php?msg=Error while registering')</script>";
    }
    }
?>
<?php
include("footer.php")
?>
 