<?php
include("adminheader.php");
if(!isset($_SESSION['email'])){
    echo "<script>window.location.assign('adminlogin.php?msg=Please Login!!')</script>";
}
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
                            <li class="breadcrumb-item"><a href="adminindex.php"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Users</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

<div class="container my-5">
        <h1 class="text-center my-3">View Users</h1>
        <?php
        if(isset($_GET['msg'])){
          ?>
          <div class="alert alert-success"><?php echo $_GET['msg']?></div>
          <?php  
        }
        ?>
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <th>SNO</th>
                <th>Name</th>
                <th>Email</th>
				<th>Address </th>
				<th>Contact </th>
            </tr>
            <?php
                include("config.php");
                $query="SELECT * from `user`";
                $result=mysqli_query($connect,$query);
                $sno=1;
               while($data=mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $sno;?></td>
					<td><?php echo $data['name']?></td>
                    <td><?php echo $data['email']?></td>
                    <td><?php echo $data['address']?></td>
                    <td><?php echo $data['contact']?></td>
                    
                </tr>
            <?php
            $sno++;
            }
            ?>
        </table>
    </div>
    <?php
    if(isset($_REQUEST['btn'])){
        $status=$_REQUEST['status'];
        $id=$_REQUEST['id'];
   
     $query1="UPDATE `order` set `status`='$status' where `id`='$id'";
    include("config.php");
    $result1=mysqli_query($connect,$query1);
    if($result1>0){
        echo "<script>window.location.assign('viewbooking.php?msg=Order Status Updated Successfully!!')</script>";
    }
    else{
        echo "<script>window.location.assign('viewbooking.php?msg=Error while updating try again later!!')</script>";
    }
}
        if(isset($_REQUEST['decline'])){
            $status="Declined";
            $id=$_REQUEST['id'];
             $query1="UPDATE `order` set `status`='$status' where `id`='$id'";
            include("config.php");
            $result1=mysqli_query($connect,$query1);
            if($result1>0){
                echo "<script>window.location.assign('viewbooking.php?msg=Order Status Updated Successfully!!')</script>";
            }
            else{
                echo "<script>window.location.assign('viewbooking.php?msg=Error while updating try again later!!')</script>";
            }
        }
    ?>

<!--footer-->
<?php
include("footer.php")
?>