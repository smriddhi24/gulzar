<?php
include("header.php");
?>


  <div class="page-header d-flex align-items-center">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center"><br><br><br>
         <strong>
            <h1>ADD CATEGORY</h1></strong><br> <br>


          </div>
        </div>
      </div>
    </div>
<div class="container">
   
                <?php
               if(isset($_POST['msg'])){
                echo $_POST['msg']; 
               }
                ?>
                
                
                    <form  method="POST" enctype="multipart/form-data" >
                     
                                    <div class="col-md-6 offset-3">
                                    <div class="twice" >
                                        <input type="text" class="form-control" name="categoryname" id="categoryname" placeholder="Categoryname" required="">
                                    <br>    
                                        <input type="file" class="form-control" name="image" id="image" placeholder="Image" required="">
                                       <br>
                                 
                                        <input type="description" class="form-control" name="description" id="description" placeholder="Description" required="">
                                      
                                  
            </div></div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-style mt-4" name="submit_btn">Submit</button>
                        </div>
                    </form>
                </div>
</div>
<?php
    if(isset($_REQUEST["submit_btn"])){
       $categoryname= $_REQUEST["categoryname"];
        $image= $_FILES["image"];
        $description= $_REQUEST["description"];
       $image_name=$image["name"];
       $tmp_name=$image["tmp_name"];
       $new_name=rand().$image_name;
       move_uploaded_file($tmp_name,"category_images/".$new_name);
        //db connect
        include("config.php");
        $query="INSERT INTO `category`(`categoryname`, `image`, `description`) VALUES ('$categoryname','$new_name','$description')";
            //run
          $res=mysqli_query($conn,$query);
          if($res>0){
            echo "<script>window.location.assign('category.php?msg=Added successfully')</script>";
          }else{
            echo "<script>window.location.assign('category.php?msg=Error while registing')</script>";
          }
    }
?>
<?php
include("footer.php");
?>



