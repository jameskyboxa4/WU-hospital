<?php session_start();
if (!isset($_SESSION['user_session'])) {
  header("Location: signin.php");
}

$folder = "/WU-hospital";
define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . $folder); //an example
include(ROOT_PATH  . "/server.php");

include_once(ROOT_PATH . '/models/users.php');
$db = new DB_Users();

$users = $db->fecth_users($_SESSION['user_session']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elegant Dashboard | Dashboard</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">

  <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
  <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- Custom styles -->
  <link rel="stylesheet" href="./css/style.css">
  <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
  <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
  <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
</head>

<script>
  console.log(<?= json_encode($users) ?>);
</script>

<body onload="">
  <div class="layer"></div>
  <!-- ! Body -->
  <a class="skip-link sr-only" href="#skip-target ">Skip to content</a>
  <div class="page-flex" style="background-color: #f8f9fd;">
    <!-- ! Sidebar -->
    <aside class="sidebar">
      <div class="sidebar-start">
        <div class="sidebar-head">
          <div class="categories-table-img">
            <center>
              <picture>

                <img src="./img/categories/wuhlogo.png" alt="category" width="120" height="auto">

              </picture>
            </center>
          </div>
        </div>
        <div class="sidebar-body">
          <ul class="sidebar-body-menu">
            <li>
              <a class="active" href="/"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
            </li>
            <li>
              <a class="show-cat-btn" href="##">
                <span class="icon document" aria-hidden="true"></span>Posts
                <span class="category__btn transparent-btn" title="Open list">
                  <span class="sr-only">Open list</span>
                  <span class="icon arrow-down" aria-hidden="true"></span>
                </span>
              </a>
              <ul class="cat-sub-menu">
                <li>
                  <a href="posts.html">All Posts</a>
                </li>
                <li>
                  <a href="new-post.html">Add new post</a>
                </li>
              </ul>
            </li>
            <li>
              <a class="show-cat-btn" href="##">
                <span class="icon folder" aria-hidden="true"></span>Categories
                <span class="category__btn transparent-btn" title="Open list">
                  <span class="sr-only">Open list</span>
                  <span class="icon arrow-down" aria-hidden="true"></span>
                </span>
              </a>
              <ul class="cat-sub-menu">
                <li>
                  <a href="categories.html">All categories</a>
                </li>
              </ul>
            </li>
            <li>
              <a class="show-cat-btn" href="##">
                <span class="icon image" aria-hidden="true"></span>Media
                <span class="category__btn transparent-btn" title="Open list">
                  <span class="sr-only">Open list</span>
                  <span class="icon arrow-down" aria-hidden="true"></span>
                </span>
              </a>
              <ul class="cat-sub-menu">
                <li>
                  <a href="media-01.html">Media-01</a>
                </li>
                <li>
                  <a href="media-02.html">Media-02</a>
                </li>
              </ul>
            </li>


          </ul>


        </div>
      </div>
      <div class="sidebar-footer">
        <a href="##" class="sidebar-user">


        </a>
      </div>
    </aside>
    <div class="main-wrapper">
      <!-- ! Main nav -->
      <nav class="main-nav--bg">
        <div class="container main-nav">
          <div class="main-nav-start">
            <div class="search-wrapper">
              <i data-feather="search" aria-hidden="true"></i>
              <input type="text" placeholder="Search ..." required>
            </div>
          </div>
          <div class="main-nav-end">
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
              <span class="sr-only">Toggle menu</span>
              <span class="icon menu-toggle--gray" aria-hidden="true"></span>
            </button>

            <button class="theme-switcher gray-circle-btn" type="button">
              <i class="icon message"></i>
            </button>
            <div class="notification-wrapper">
              <button class="gray-circle-btn dropdown-btn" title="To messages" type="button">
                <span class="sr-only">To messages</span>
                <span class="icon notification active" aria-hidden="true"></span>
              </button>
              <ul class="users-item-dropdown notification-dropdown dropdown">
                <li>
                  <a href="##">
                    <div class="notification-dropdown-icon info">
                      <i data-feather="check"></i>
                    </div>
                    <div class="notification-dropdown-text">
                      <span class="notification-dropdown__title">System just updated</span>
                      <span class="notification-dropdown__subtitle">The system has been successfully upgraded. Read more
                        here.</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="##">
                    <div class="notification-dropdown-icon danger">
                      <i data-feather="info" aria-hidden="true"></i>
                    </div>
                    <div class="notification-dropdown-text">
                      <span class="notification-dropdown__title">The cache is full!</span>
                      <span class="notification-dropdown__subtitle">Unnecessary caches take up a lot of memory space and
                        interfere ...</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="##">
                    <div class="notification-dropdown-icon info">
                      <i data-feather="check" aria-hidden="true"></i>
                    </div>
                    <div class="notification-dropdown-text">
                      <span class="notification-dropdown__title">New Subscriber here!</span>
                      <span class="notification-dropdown__subtitle">A new subscriber has subscribed.</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="link-to-page" href="##">Go to Notifications page</a>
                </li>
              </ul>
            </div>
            <b style=" bottom: 22px;"> <?= $users->user ?> </b>

            <div class="nav-user-wrapper">
              <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
                <span class="sr-only">My profile</span>
                <span class="nav-user-img">
                  <picture>
                    <source srcset="./img/avatar/avatar-illustrated-02.webp" type="image/webp"><img src="./img/avatar/avatar-illustrated-02.png" alt="User name">
                  </picture>
                </span>
              </button>
              <ul class="users-item-dropdown nav-user-dropdown dropdown">
                <li><a href="##">
                    <i data-feather="user" aria-hidden="true"></i>
                    <span>Profile</span>
                  </a></li>
                <li><a href="##">
                    <i data-feather="settings" aria-hidden="true"></i>
                    <span>Account settings</span>
                  </a></li>
                <li><a class="danger" href="##">
                    <i data-feather="log-out" aria-hidden="true"></i>
                    <span>Log out</span>
                  </a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <!-- ! Main -->
      <main class="main users chart-page" id="skip-target">
        <div class="container">
          <h2 class="main-title">Dashboard</h2>

          <div class="row stat-cards" style="margin-bottom: 50px;">

            <div class="col-md-4 col-xl-4 my-2">
              <article class="stat-cards-item">
                <div class="stat-cards-icon success">
                  <i class="icon checkmask"></i>
                </div>
                <div class="stat-cards-info m-2">

                  <p class="stat-cards-info__num" style="color: blue;">Negative present room</p>

                  <p class="mt-2"><b>Total &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span id="negative-total" class="Total_negative" style="text-align: center;">-</span> </b></p>
                  <p class="mt-2"><b>Online &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span id="negative-online" class="Total_negative" style="text-align: center;">-</span> </b></p>
                  <p class="mt-2"><b>Warning &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span id="negative-warning" class="Total_negative" style="text-align: center;">-</span> </b></p>

                </div>

              </article>
            </div>
            <div class="col-md-4 my-2 col-xl-4">
              <article class="stat-cards-item">
                <div class="stat-cards-icon warningg">
                  <i class="icon warning"></i>
                </div>
                <div class="stat-cards-info">

                  <p class="stat-cards-info__num" style="color: rgb(0, 255, 149);">Tempture monoing</p>
                  <p class="mt-2"><b>Total &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span id="tempturemonoing-total" class="Total_negative" style="text-align: center;">-</span> </b></p>
                  <p class="mt-2"><b>Online &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span id="tempturemonoing-online" class="Total_negative" style="text-align: center;">-</span> </b></p>
                  <p class="mt-2"><b>Warning &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span id="tempturemonoing-warning" class="Total_negative" style="text-align: center;">-</span> </b></p>

                </div>

              </article>
            </div>
            <div class="col-md-4 col-xl-4 my-2">
              <article class="stat-cards-item">
                <div class="stat-cards-icon success">
                  <i class="icon checkmask"></i>
                </div>
                <div class="stat-cards-info">

                  <p class="stat-cards-info__num" style="color: rgb(0, 255, 149);">WARD ROOM</p>
                  <p class="mt-2"><b>Total &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span id="wardroom-total" class="Total_negative " style="text-align: center;">-</span> </b></p>
                  <p class="mt-2"><b>Online &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span id="wardroom-online" class="Total_negative " style="text-align: center;">-</span> </b></p>
                  <p class="mt-2"><b>Warning &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span id="wardroom-warning" class="Total_negative " style="text-align: center;">-</span> </b></p>

                </div>

              </article>
            </div>
          </div>
          <div class="row ">
            <div class="col-lg-6 mb-3 mx-2">


              <div class="row " >

                <div class="stat-cards-item col-md-4 me-2 my-2 " style="background-color: #ffffff;" >
               <h4 class="my-3 py-2" style="color: blue;">Data/Time</h4>
               <h5><span id="datetime">-</span></h5>
                </div>
                <div class="stat-cards-item col-md-3 me-2 my-2" style="background-color:#ffffff;" >
               <h4 class="my-3 py-2" style="color: blue;">Temperture</h4>
               <h5><i class="icon temp"></i>&nbsp&nbsp <span id="temp">-</span> °C</h5>
                </div>

                <div class="stat-cards-item col-md-4 my-2" style="background-color:#ffffff;" >
               <h4 class="my-3 py-2" style="color: blue;">Relative Huminty</h4>
               <h5><i class="icon hum"></i>&nbsp&nbsp <span id="hum">-</span> %</h5>
                </div>
 
              </div>


            </div>
            <div class="col-lg-4 mx-2">
              <article class="stat-cards-item">
                <h1>Total system</h1>
                <div id="chartdiv" style="height: 300px;"></div>
              </article>

            </div>
          </div>
        </div>
      </main>
      <!-- ! Footer -->
      <footer class="footer">
        <div class="container footer--flex">
          <div class="footer-start">
            <p>2021 © Elegant Dashboard - <a href="elegant-dashboard.com" target="_blank" rel="noopener noreferrer">elegant-dashboard.com</a></p>
          </div>
          <ul class="footer-end">
            <li><a href="##">About</a></li>
            <li><a href="##">Support</a></li>
            <li><a href="##">Puchase</a></li>
          </ul>
        </div>
      </footer>
    </div>
  </div>
  <!-- Chart library -->
  <script src="./plugins/chart.min.js"></script>
  <!-- Icons library -->
  <script src="plugins/feather.min.js"></script>
  <!-- Custom scripts -->
  <script src="js/script.js"></script>
  <script>
    function ca() {
      const today = new Date();
      let h = today.getHours();
      let m = today.getMinutes();
      let s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      document.getElementById('txd').innerHTML = "&nbsp" + h + ":" + m + ":" + s;
      setTimeout(startTime, 1000);
    }

    function checkTime(i) {
      if (i < 10) {
        i = "0" + i
      }; // add zero in front of numbers < 10
      return i;
    }
  </script>
  <script>

setInterval(getDataAPI(), 1000);

    function getDataAPI(){
    // Make a GET request to the API
    fetch("<?= $base_url . 'json/demodata.json' ?>")
      .then(response => response.json()) // Parse the response as JSON
      .then(data => {
        // Update the DOM with the returned data
        console.log(data);
        console.log(data['Negative present room']['Total']);
        if (data['Negative present room'] != null) {
          if (data['Negative present room']['Total'] != null) {
            document.getElementById("negative-total").innerHTML = data['Negative present room']['Total'];
          }
          if (data['Negative present room']['Online'] != null) {
            document.getElementById("negative-online").innerHTML = data['Negative present room']['Online'];
          }
          if (data['Negative present room']['Warning'] != null) {
            document.getElementById("negative-warning").innerHTML = data['Negative present room']['Warning'];
          }
        }
        if (data['Tempturemonoing'] != null) {
          if (data['Tempturemonoing']['Total'] != null) {
            document.getElementById("tempturemonoing-total").innerHTML = data['Tempturemonoing']['Total'];
          }
          if (data['Tempturemonoing']['Online'] != null) {
            document.getElementById("tempturemonoing-online").innerHTML = data['Tempturemonoing']['Online'];
          }
          if (data['Tempturemonoing']['Warning'] != null) {
            document.getElementById("tempturemonoing-warning").innerHTML = data['Tempturemonoing']['Warning'];
          }
        }
        if (data['WARD ROOM'] != null) {
          if (data['WARD ROOM']['Total'] != null) {
            document.getElementById("wardroom-total").innerHTML = data['WARD ROOM']['Total'];
          }
          if (data['WARD ROOM']['Online'] != null) {
            document.getElementById("wardroom-online").innerHTML = data['WARD ROOM']['Online'];
          }
          if (data['WARD ROOM']['Warning'] != null) {
            document.getElementById("wardroom-warning").innerHTML = data['WARD ROOM']['Warning'];
          }
        }

        if (data['Temperature'] != null){
            document.getElementById("temp").innerHTML = data['Temperature'];
          }
          if (data['Relative Humidity'] != null) {
            document.getElementById("hum").innerHTML = data['Relative Humidity'];
          }
          if (data['Data/Time'] != null) {
            document.getElementById("datetime").innerHTML = data['Data/Time'];
          }
      })
      .catch(error => console.error(error)); // Handle any errors
    }


  </script>
</body>

</html>