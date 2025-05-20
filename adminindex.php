<?php
include("adminheader.php");
?>
<?php
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
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<div class="container my-5">
<h1 class="text-center my-5">Welcome Admin</h1>
<div class="text-center">Recent Orders</div>

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
                <th>Order Number</th>
                <th>Order Date </th>
				<th>Total Price </th>
				<th>Shipping Details </th>
				<th>Status </th>
                <th>Action</th>
            </tr>
            <?php
                include("config.php");
                $query="SELECT * from `order` order by `id` desc limit 5";
                $result=mysqli_query($connect,$query);
                $sno=1;
               while($data=mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $sno;?></td>
                    <td><a href="order_details_admin.php?orderno=<?php echo $data['orderno']?>"><?php echo $data['orderno']?></a></td>
					<td><?php echo $data['orderdate']?></td>
                    <td>&#8377;<?php echo $data['totalprice']?></td>
                    <td><?php echo $data['name'].",".$data['address'].",<br> Contact-". $data['contact']?></td>
					<td><?php echo $data['status']?></td>
                    <td>
                        <form method="post">
                        <input type="hidden" name="id" value="<?php echo $data['id']?>">
                        <?php
                        if($data['status']=='pending' ||$data['status']=='Pending'){
                            ?>
                            <input type="hidden" name="status" value="Approve">
                            <button class="btn btn-success" name="btn">Approve</button>
                            <button class="btn btn-danger" name="decline">Decline</button>
                            <?php
                        }
                        else if($data['status']=='Approve'){
                            ?>
                            <input type="hidden" name="status" value="Packed">
                            <button class="btn btn-primary" name="btn">Packed</button>
                            <?php
                        }
                        else if($data['status']=='Packed'){
                            ?>
                            <input type="hidden" name="status" value="Shipped">
                            <button class="btn btn-primary" name="btn">Shipped</button>
                            <?php
                        }
                        else if($data['status']=='Shipped'){
                            ?>
                            <input type="hidden" name="status" value="Delivered">
                            <button class="btn btn-primary" name="btn">Delivered</button>
                            <?php
                        }
                        else{
                            echo $data['status'];
                        }
                        ?>
                        </form>
                    </td>
                </tr>
            <?php
            $sno++;
            }
            ?>
        </table>
        <a href="viewbooking.php" class="btn btn-primary my-3 d-block mx-auto w-25" >View All</a>
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

<?php
include("footer.php");
?>
