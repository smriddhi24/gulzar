<?php
include("header.php");
?>


  <!-- slider section -->
  <section class="slider_section position-relative">
    <div class="slider_bg_box">
      <img src="images/slider-bg.jpg" alt="">
    </div>
    <div class="slider_bg"></div>
    <div class="container">
      <div class="col-md-9 col-lg-8">
        <div class="detail-box">
          <h1>
            Best Jewellery
            <br> Collection
          </h1>
          <p>
          Such a pretty, trendy, popular, beautiful, stunning, and gorgeous.
          </p>
         
        </div>
      </div>
    </div>
  </section>


  
  <!-- end slider section -->

  <!-- shop section -->
  <?php

    include("config.php");
    $query="Select * from `product` order by `id` desc limit 16";
include("config.php");
$result1=mysqli_query($connect,$query);

?>
 <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <p>Our latest releases,just for you!</p>
      </div>
      <div class="row">
      <?php
        
        while($data=mysqli_fetch_array($result1)){
       ?>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="single.php?id=<?php echo $data['id'] ?>">
              <div class="img-box">
                <img src="images/<?php echo $data['image']?>" alt="">
              </div>
              <div class="detail-box">
                <h6>
                <?php echo $data['productname']?>
                </h6>
                <h6>
                  Price
                  <span>
                  &#8377; <?php echo $data['price']?>
                  </span>
                </h6>
              </div>
              <div class="new">
                <span>
                  <?php echo $data['category_name']?>
                </span>
              </div>
            </a>
          </div>
        </div>
        <?php
         }
         ?>
      </div>
      
    </div>
  </section>
  

  <!-- end shop section -->

  <!-- about section -->

  <section class="about_section  ">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
        
        
          <h1>Luxury </h1><br>
          <div class="img-box">
            <img src="images/gold.jpeg" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
            <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/xneck.jpg" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
             

            <a href="userproduct.php" >
                View More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- offer section -->

  <section class="offer_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-7 px-0">
          <div class="box offer-box1">
            <img src="images/o1.jpg" alt="">
            <div class="detail-box">
              <h2>
                Upto 15% Off
              </h2>
              <a href="userproduct.php">
                Shop Now
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-5 px-0">
          <div class="box offer-box2">
            <img src="images/o2.jpg" alt="">
            <div class="detail-box">
              <h2>
                Upto 10% Off
              </h2>
              <a href="userproduct.php">
                Shop Now
              </a>
            </div>
          </div>
          <div class="box offer-box3">
            <img src="images/o3.jpg" alt="">
            <div class="detail-box">
              <h2>
                Upto 20% Off
              </h2>
              <a href="userproduct.php">
                Shop Now
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end offer section -->

  <!-- blog section -->

  <section class="blog_section ">
    <div class="container">
      <div class="heading_container">
        <h2>
          Coming Soon
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="img-box">
              <img src="images/m1.jpg" alt="">
              <h4 class="blog_date">
                Coming Soon!!!
              </h4>
            </div>
            <div class="detail-box">
              <h5>
              Ranihaar with Choker
              </h5>
              <p>
              Rani Haar jewellery is a traditional Indian necklace that has been worn by royalty for centuries. Rani Haars are typically made of gold or silver and are decorated with precious stones, such as diamonds, rubies, and emeralds
              </p>
              
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box">
            <div class="img-box">
              <img src="images/latest.jpeg" alt="">
              <h4 class="blog_date">
               
             Coming soon!!!
              </h4>
            </div>
            <div class="detail-box">
              <h5>
               Jewellery double digit
              </h5>
              <p>
             The ongoing mega-wedding season has to increasing demand for heavyweight, studded and festive jewellery, that remain hot favourites across various consumer cohorts.
             Jewellery retailers are confident that the demand momentum will continue to further accelerate till the mid of the july month.


              </p>
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end blog section -->

  <!-- client section -->

  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
         Clients
        </h2>
      </div>
      <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="images/c1.jpg" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <h6>
                        Vatsala
                      </h6>
                    </div>
                    <p>
                    They Have The Best Collection Of Jwellery And At Reasonable Prices. You Can Also Customise Your Jwellery As Per Your Need. They Also Were Very Much Polite And Have A Good Service Too. Even They Delivered The Jwellery To Me, When I Requested Them If They Could Deliver If Possible. Thank You So Much. Had A Very Good Experience!!


                    </p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="images/c2.jpeg" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <h6>
                        Shrishti
                      </h6>
                    </div>
                    <p>
                    Had A Very Good Experience Shopping From Your Site. The Necklace Was Awesome And The Price Was At Par With The Current Market Rates. Thank You GULZAR JEWELLERS.
                    </p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="images/c3.jpg" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <h6>
                       jasleen kaur
                      </h6>
                    </div>
                    <p>
                    I Came To GULZAR JEWELLERS For The First Time And Saw The Collection I Just Loved It, Do Visit Guys...!!
                    </p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn-container">
          <a class="carousel-control-prev" href="#carouselExample2Controls" role="button" data-slide="prev">
            <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExample2Controls" role="button" data-slide="next">
            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->

  <!-- info section -->
  <section class="info_section layout_padding2">
    <div class="container">
      <div class="row info_form_social_row">
        <div class="col-md-8 col-lg-9">
          <div class="info_form">
            <form action="">
              <input type="email" placeholder="Enter your email">
              <button>
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
              </button>
            </form>
          </div>
        </div>
        <div class="col-md-4 col-lg-3">

          <div class="social_box">
            <a href="">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="row info_main_row">
        <div class="col-md-6 col-lg-3">
          <div class="info_links">
            <h4>
              Menu
            </h4>
            <div class="info_links_menu">
              <a href="index.php">Home</a>
              <a href="about.php">About</a>
              <a href="contact.php">Contact</a>
              <a href="cart.php">Cart</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="info_insta">
            <h4>
              Instagram
            </h4>
            <div class="insta_box">
              <div class="img-box">
                <img src="images/p1.png" alt="">
              </div>
              <p>
                Follow us on
              </p>
            </div>
            <div class="insta_box">
              <div class="img-box">
                <img src="images/p2.png" alt="">
              </div>
              <p>
               Check out our jewellery
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="info_detail">
            <h4>
              About Us
            </h4>
            <p class="mb-0">
            My Jewellery Shop is an independent family jeweller with over 40 years' experience and expertise in the beautiful world of jewellery. We are passionate about offering the highest quality of service and our wealth of knowledge guarantees you and your precious jewellery will be exceptionally cared for.
           </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <h4>
            Contact Us
          </h4>
          <div class="info_contact">
            <a href="">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>
                Location: Palampur,Himachal Pradesh,176061
              </span>
            </a>
            <a href="">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>
                Call +91 7018033708
              </span>
            </a>
            <a href="">
              <i class="fa fa-envelope"></i>
              <span>
                tiaskanda@gmail.com
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->


  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://php.design/">Smriddhi Singh</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->


  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>

</body>

</html>