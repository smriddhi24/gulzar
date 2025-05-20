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
                            <li class="breadcrumb-item active" aria-current="page">Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<div class="container my-5">
    <div class="row">
        <?php
        include("config.php");
        $query="Select * from `category`";
        $result=mysqli_query($connect,$query);
        while($data=mysqli_fetch_array($result)){

       ?>
        <div class="col-md-4 p-5">
            <div class="card " style="text-transform: capitalize;" >
            <img src="images/<?php echo $data['thumbnail']?>" class="card-img-top img-fluid w-100" alt="..." style="height:200px;width:100%;">
            <div class="card-body">
                <h1 class="card-title text-center my-3"><?php echo $data['category_name']?></h1>
              
                <a href="userproduct.php?name=<?php echo $data['category_name'] ?>" class="btn btn-primary d-block mx-auto my-3" name="submit_btn">View</a>
            </div>
            </div>
        </div>
        <?php
         }
         ?>
    </div>
</div>

<?php
(isset($_POST['submit_btn']))
?>
<?php
include("footer.php");
?>
