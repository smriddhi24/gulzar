
<?php
include("adminheader.php");
if(!isset($_SESSION['email'])){
    echo "<script>window.location.assign('adminlogin.php?msg=Please Login!!')</script>";
}
?>
<style>
    .btn.btn-outline-dark {
    border: 0px ;
    background-color: #007bff;
    color:white;
    padding: 10px 20px; 
    font-size: 16px; /* Adjust font size as needed */
    cursor: pointer;
    float:right;
    transition: background-color 0.3s, color 0.3s; /* Smooth transition effect */
}

.btn.btn-outline-dark:hover {
    background-color: white;/* Dark background color on hover */
    color:#A78295;
}
.btn1{
    float:right;
    margin-top:-55px
}
</style>

<div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="adminindex.php"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Category</li>
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
	  <h1 class="text-center my-3">Add Category</h1>
      <div class="btn1">
        <a href="viewcategory.php">
      <button class="btn btn-outline-dark">Manage Category</button>
       </a>
    </div>
	  <form method="post" enctype="multipart/form-data">
		  <div class="row my-3">
			  <div class="col-md-2">
				  <label>Category Name</label>
			  </div>
			  <div class="col-md-10">
				  <input required class="form-control" type="text" name="cat_name">
			  </div>
		  </div>
		  <div class="row my-3">
			  <div class="col-md-2">
				  <label>Image</label>
			  </div>
			  <div class="col-md-10">
			  <input required class="form-control" type="file" name="cat_image">
			  </div>
		  </div>

		  <button class="btn btn-primary d-block mx-auto my-3 " name="submit_btn" style="width:25%;">Add</button>
	  </form>
  </div>
  </div>
<?php
    if(isset($_POST['submit_btn'])){
        $category=$_POST['cat_name'];
        $img_name=$_FILES['cat_image']['name'];
        $img_path=$_FILES['cat_image']['tmp_name'];
        $new_name=rand().$img_name;
        move_uploaded_file($img_path,"images/".$new_name);
        include("config.php");
        $query="INSERT into `category`(`category_name`,`thumbnail`)VALUES('$category','$new_name')";
        $result=mysqli_query($connect,$query);
        if($result>0){
            echo "<script>window.location.assign('addcategory.php?msg=Added Successfully!!')</script>";
        }
        else{
            echo "<script>window.location.assign('addcategory.php?msg=Error while adding!!')</script>";
        }

    }
    ?>
<?php
include("footer.php");
?>