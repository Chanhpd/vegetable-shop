<?php

include('./inc/header.php');
require_once('./DB/util.php');
require_once('./DB/dbhelper.php');

$id = getGet('id');
if ($id == null) {
  $id = 1;
}
$blog = executeResult('select * from blog where id = ' . $id, true);
if ($blog == null) {
  header('Location: index.php');
  die();
}

$sql = "select * from comments where blog_id = $id ORDER BY created_at DESC";
$list = executeResult($sql);
?>
<!-- END nav -->

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Blog</span></p>
        <h1 class="mb-0 bread">Blog</h1>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section ftco-degree-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 ftco-animate">
        <h2 class="mb-3"><?= $blog['title'] ?></h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, eius mollitia suscipit, quisquam doloremque distinctio perferendis et doloribus unde architecto optio laboriosam porro adipisci sapiente officiis nemo accusamus ad praesentium? Esse minima nisi et. Dolore perferendis, enim praesentium omnis, iste doloremque quia officia optio deserunt molestiae voluptates soluta architecto tempora.</p>
        <p>
          <img src="images/<?= $blog['thumbnail'] ?>" alt="" class="img-fluid blog">
        </p>
        <p>Molestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam voluptatem soluta illo eum ullam incidunt rem assumenda eveniet eaque sequi deleniti tenetur dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae suscipit!</p>
        <h2 class="mb-3 mt-5"> Creative WordPress Themes</h2>
        <p>Temporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in. Exercitationem atque quidem tempora maiores ex architecto voluptatum aut officia doloremque. Error dolore voluptas, omnis molestias odio dignissimos culpa ex earum nisi consequatur quos odit quasi repellat qui officiis reiciendis incidunt hic non? Debitis commodi aut, adipisci.</p>
        <!-- <p>
          <img src="images/image_2.jpg" alt="" class="img-fluid blog">
        </p> -->
        <p>Quisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo quod, est eos ipsum. Unde aut non tenetur tempore, nisi culpa voluptate maiores officiis quis vel ab consectetur suscipit veritatis nulla quos quia aspernatur perferendis, libero sint. Error, velit, porro. Deserunt minus, quibusdam iste enim veniam, modi rem maiores.</p>
        <p>Odit voluptatibus, eveniet vel nihil cum ullam dolores laborum, quo velit commodi rerum eum quidem pariatur! Quia fuga iste tenetur, ipsa vel nisi in dolorum consequatur, veritatis porro explicabo soluta commodi libero voluptatem similique id quidem? Blanditiis voluptates aperiam non magni. Reprehenderit nobis odit inventore, quia laboriosam harum excepturi ea.</p>
        <p>Adipisci vero culpa, eius nobis soluta. Dolore, maxime ullam ipsam quidem, dolor distinctio similique asperiores voluptas enim, exercitationem ratione aut adipisci modi quod quibusdam iusto, voluptates beatae iure nemo itaque laborum. Consequuntur et pariatur totam fuga eligendi vero dolorum provident. Voluptatibus, veritatis. Beatae numquam nam ab voluptatibus culpa, tenetur recusandae!</p>
        <p>Voluptas dolores dignissimos dolorum temporibus, autem aliquam ducimus at officia adipisci quasi nemo a perspiciatis provident magni laboriosam repudiandae iure iusto commodi debitis est blanditiis alias laborum sint dolore. Dolores, iure, reprehenderit. Error provident, pariatur cupiditate soluta doloremque aut ratione. Harum voluptates mollitia illo minus praesentium, rerum ipsa debitis, inventore?</p>
        <div class="tag-widget post-tag-container mb-5 mt-5">
          <div class="tagcloud">
            <a href="#" class="tag-cloud-link">Life</a>
            <a href="#" class="tag-cloud-link">Sport</a>
            <a href="#" class="tag-cloud-link">Tech</a>
            <a href="#" class="tag-cloud-link">Travel</a>
          </div>
        </div>

        <!-- <div class="about-author d-flex p-4 bg-light">
          <div class="bio align-self-md-center mr-4">
            <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
          </div>
          <div class="desc align-self-md-center">
            <h3>Lance Smith</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
          </div>
        </div> -->


        <div class="pt-5 mt-5">
          <h3 class="mb-5"><?= count($list) ?> Comments</h3>
          <ul class="comment-list" id="result">
            <?php
            foreach ($list as $item) {
              $tg = date_create($item['created_at']);
              echo '
                  <li class="comment">
                    <div class="vcard bio">
                      <img src="' . $item['thumb'] . '" alt="Image placeholder">
                    </div>
                    <div class="comment-body">
                      <h3>' . $item['name_user'] . '</h3>
                      <div class="meta">' . date_format($tg, "H:i:a M d, Y") . '</div>
                      <p>' . $item['content'] . '</p>
                    </div>
                  </li>
                ';
            }
            ?>
          </ul>
          <!-- END comment-list -->

          <div class="comment-form-wrap pt-5">
            <h3 class="mb-5">Leave a comment</h3>
            <?php
              if(isset($_SESSION['user'])){
                  echo '<form action="" method="post" class="p-5 bg-light">
                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="20" rows="5" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary button">
                  </div>
                </form>';
              }
              else {
                echo '<div class="p-5 bg-light">
                <div>
                  To comment on the artical , <a href="login/login.php"><b>login</b></a>
                </div>
              </div>';
              }
            ?>
            
          </div>
        </div>
      </div> <!-- .col-md-8 -->
      <div class="col-lg-4 sidebar ftco-animate">
        <div class="sidebar-box">
          <form action="#" class="search-form">
            <div class="form-group">
              <span class="icon ion-ios-search"></span>
              <input type="text" class="form-control" placeholder="Search...">
            </div>
          
        </div>
        <div class="sidebar-box ftco-animate">
          <h3 class="heading">Categories</h3>
          <ul class="categories">
            <li><a href="#">Vegetables <span>(12)</span></a></li>
            <li><a href="#">Fruits <span>(22)</span></a></li>
            <li><a href="#">Juice <span>(37)</span></a></li>
            <li><a href="#">Dries <span>(42)</span></a></li>
          </ul>
        </div>

        <div class="sidebar-box ftco-animate">
          <h3 class="heading">Recent Blog</h3>
          <?php
          $sql = "select * from blog limit 0,3";

          $bloglist = executeResult($sql);
          foreach ($bloglist as $blog) {
            $time = date_create($blog['create_at']);
            echo '<div class="block-21 mb-4 d-flex">
                    <a class="blog-img mr-4" style="background-image: url(images/' . $blog['thumbnail'] . ');"></a>
                    <div class="text">
                      <h3 class="heading-1"><a href="blog-single.php?id=' . $blog['id'] . '">' . $blog['title'] . '</a></h3>
                      <div class="meta">
                        <div><a href="#"><span class="icon-calendar"></span>' . date_format($time, "M d, Y") . '</a></div>
                        <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                        <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                      </div>
                    </div>
                  </div>';
          }
          ?>
        </div>

        <div class="sidebar-box ftco-animate">
          <h3 class="heading">Tag Cloud</h3>
          <div class="tagcloud">
            <a href="#" class="tag-cloud-link">fruits</a>
            <a href="#" class="tag-cloud-link">tomatoe</a>
            <a href="#" class="tag-cloud-link">mango</a>
            <a href="#" class="tag-cloud-link">apple</a>
            <a href="#" class="tag-cloud-link">carrots</a>
            <a href="#" class="tag-cloud-link">orange</a>
            <a href="#" class="tag-cloud-link">pepper</a>
            <a href="#" class="tag-cloud-link">eggplant</a>
          </div>
        </div>

        <div class="sidebar-box ftco-animate">
          <h3 class="heading">Paragraph</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
        </div>
      </div>

    </div>
  </div>
</section> <!-- .section -->

<?php
include_once('./inc/footer.php')
?>




<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
    <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
    <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
  </svg></div>


<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $('.button').click(function(e) {
      e.preventDefault();
      var $message = $('#message').val();

      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      var $blogId = urlParams.get('id');

      $.ajax({
        url: 'api/hanleComment.php',
        type: 'post',
        dataType: 'html',
        data: {
          message: $message,
          blogId: $blogId
        }
      }).done(function(rs) {
        $('#result').html(rs);
      })

    });
  });
</script>
</body>

</html>