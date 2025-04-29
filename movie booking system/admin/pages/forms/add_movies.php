<?php include '../../connection.php' ?>
<?php 

  $genre_query = "SELECT * FROM `genre`";
  $genre_prepare = $connection->prepare($genre_query);
  $genre_prepare->execute();
  $gernres = $genre_prepare->fetchAll(PDO::FETCH_ASSOC);


  if(isset($_POST['movieBtn']))
  {
    $movieInput = $_POST['movieInput'];
    $genreInput = $_POST['genreInput'];
    $releaseYear = $_POST['releaseYear'];
    $runningTime = $_POST['runningTime'];
    $countryInput = $_POST['countryInput'];
    $descriptionInput = $_POST['descriptionInput'];
    $imageInput = $_FILES['imageInput']['name'];
    $imageTempName = $_FILES['imageInput']['tmp_name'];
    $movieTrailer = $_POST['movieTrailer']; 
    $rating = $_POST['rating']; 





    // for image
    $imageExtension = explode(".",$imageInput);
    // print_r($imageExtension);
    $imageExtension = strtolower(end($imageExtension));

    $uniqueImageName = uniqid();

    $uniqueImageName .= ".".$imageExtension;






    $add_movie = "INSERT INTO `add_product`(`prod_image`, `Title`, `category`, `Release_year`, `duration`, `industry`, `description`, `video`, `rating`) VALUES (:uniqueImageName, :movieInput, :genreInput, :releaseYear, :runningTime, :countryInput, :descriptionInput, :movieTrailer, :rating)";

    $add_movie_prepare = $connection->prepare($add_movie);
    $add_movie_prepare->bindParam(':uniqueImageName', $uniqueImageName);
    $add_movie_prepare->bindParam(':movieInput', $movieInput);
    $add_movie_prepare->bindParam(':genreInput', $genreInput);
    $add_movie_prepare->bindParam(':releaseYear', $releaseYear);
    $add_movie_prepare->bindParam(':runningTime', $runningTime);
    $add_movie_prepare->bindParam(':countryInput', $countryInput);
    $add_movie_prepare->bindParam(':descriptionInput', $descriptionInput);
    $add_movie_prepare->bindParam(':movieTrailer', $movieTrailer);
    $add_movie_prepare->bindParam(':rating', $rating);

    $add_movie_prepare->execute();


    move_uploaded_file($imageTempName, "../../../userSide/img/covers/" . $uniqueImageName);


    // echo "<script>alert('Movie added successfully!')</script>";

    











  }



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../../vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php include '../../partials/_navbar.php' ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 fw-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="../../images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <?php include '../../partials/_sidebar.php' ?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Movies</h4>
                  
                  <form action="add_movies.php" method="post" class="forms-sample" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="theaterInput">Movie</label>
                      <input type="text" class="form-control" name="movieInput" placeholder="Enter Movie Name">
                    </div>
                    <div class="form-group">
                      <label for="theaterInput">Genre</label>
                      <select class="form-control" name="genreInput">
                        <option value="" selected disabled>Select Movie Genre</option>  
                      <?php foreach($gernres as $genre){ ?>
                        <option value="<?= $genre['genre_id'] ?>"><?= $genre['genre_name'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="theaterInput">Release Year</label>
                      <input type="text" class="form-control" name="releaseYear" placeholder="Enter Release year">
                    </div>
                    <div class="form-group">
                      <label for="theaterInput">Running Time</label>
                      <input type="text" class="form-control" name="runningTime" placeholder="Enter Running time">
                    </div>
                    <div class="form-group">
                      <label for="theaterInput">Country</label>
                      <input type="text" class="form-control" name="countryInput" placeholder="Enter Country Name">
                    </div>
                    <div class="form-group">
                      <label for="theaterInput">Add Description</label>
                      <input type="text" class="form-control" name="descriptionInput" placeholder="Enter Description">
                    </div>
                    <div class="form-group">
                      <label for="theaterInput">Add Rating</label>
                      <input type="text" class="form-control" name="rating" placeholder="Enter Rating">
                    </div>
                    <div class="form-group">
                      <label for="theaterInput">Image</label>
                      <input type="file" class="form-control" name="imageInput">
                    </div>
                    <div class="form-group">
                      <label for="theaterInput">Movie Trailer</label>
                      <input type="text" class="form-control" name="movieTrailer">
                    </div>
                  
                  
                
         
                    <button type="submit" class="btn btn-primary me-2" name='movieBtn'>Add Movie</button>
                    <!-- <button class="btn btn-light">Cancel</button> -->
                  </form>
                </div>
              </div>
            </div>
         
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../vendors/select2/select2.min.js"></script>
  <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->
  
  <!-- Jquery js for this page-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- End Jquery js for this page-->

  <script>


        // $(document).ready(()=>{


        //   let theatreBtn =document.getElementById('theatreBtn');


        //   theatreBtn.addEventListener('click',(e)=>{
        //     e.preventDefault();

        //     let theaterInput = document.getElementById('theaterInput').value;

        //     let movieInput = document.getElementById('movieInput');
        //     let genreInput = document.getElementById('genreInput');
        //     let releaseYear = document.getElementById('releaseYear');
        //     let runningTime = document.getElementById('runningTime');
        //     let countryInput = document.getElementById('countryInput');
        //     let descriptionInput = document.getElementById('descriptionInput');
        //     let imageInput = document.getElementById('imageInput');
        //     let movieTrailer = document.getElementById('movieTrailer');

        //     console.log(theaterInput);




        //     $.ajax({
        //       url:'query/moviesQuery.php',
        //       type: 'POST',
        //       data: {
        //         theaterInput:theaterInput
        //       },
        //       success: ()=>{

        //       }
        //     })


        //   })


        // })




  </script>





</body>

</html>
