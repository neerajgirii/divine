
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <link
      href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Poppins:400,600,700&display=swap"
      rel="stylesheet"
    />
    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="../css/responsive.css" rel="stylesheet" />   

    <!-- fonts style -->
    <link
      href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Poppins:400,600,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <style>
            .blog_section {
                margin: 100px;
            }
        </style>
        <body class="sub_page">
    <div class="hero_area">
      <!-- header section strats -->
      <header class="header_section">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="../index.php">
              <img src="../images/logo.png" alt="" />
              <span> Divine </span>
            </a>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <div
                class="d-flex ml-auto flex-column flex-lg-row align-items-center"
              >
                <ul class="navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="../index.php"
                      >Home</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../about.html"> About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../jewellery.html">Jewellery </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../contact.html">Contact us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <!-- end header section -->
    </div>

    <!-- contact section -->

    <section class="blog_section">
    <?php

    include "connectToDatabase.php";

    // Step 2: Retrieve and display articles, ordering them by the most recent date
    $sql = "SELECT * FROM articles ORDER BY date DESC"; // Order by date in descending order
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $counter = 0;
      $articles = [];

      while ($row = $result->fetch_assoc()) {
        $counter++;

        $articles[] = $row;
      }

      $numArticles = count($articles);

      // Initialize a variable to keep track of the latest article
      $latestArticle = $articles[0];

      // Display the latest article in the left column
      echo '<div class="row tm-row">';
      echo '<article class="col-12 col-md-6 tm-post">';
      echo '<hr class="tm-hr-primary">';
      echo '<a href="post.html" class="effect-lily tm-post-link tm-pt-60">';
      echo '<div class="tm-post-link-inner">';
      echo '<img src="' . $latestArticle["image_url"] . '" alt="Image" class="img-fluid">';
      echo '</div>';
      echo '<h2 class="tm-pt-30 tm-color-primary tm-post-title">' . $latestArticle["title"] . '</h2>';
      echo '</a>';
      echo '<p class="tm-pt-30">' . $latestArticle["content"] . '</p>';
      echo '<div class="d-flex justify-content-between tm-pt-45">';
      echo '<span class="tm-color-primary">' . $latestArticle["category"] . '</span>';
      echo '<span class="tm-color-primary">' . $latestArticle["date"] . '</span>';
      echo '</div>';
      echo '<hr>';
      echo '<div class="d-flex justify-content-between">';
      echo '<span>by ' . $latestArticle["author"] . '</span>';
      echo '</article>';

      // Display the remaining articles in two columns
      for ($i = 1; $i < $numArticles; $i++) {
        $article = $articles[$i];

        $isEven = ($i % 2 == 0);

        if ($isEven) {
          echo '</div><div class="row tm-row">';
        }

        echo '<article class="col-12 col-md-6 tm-post">';
        echo '<hr class="tm-hr-primary">';
        echo '<a href="post.html" class="effect-lily tm-post-link tm-pt-60">';
        echo '<div class="tm-post-link-inner">';
        echo '<img src="' . $article["image_url"] . '" alt="Image" class="img-fluid">';
        echo '</div>';
        echo '<h2 class="tm-pt-30 tm-color-primary tm-post-title">' . $article["title"] . '</h2>';
        echo '</a>';
        echo '<p class="tm-pt-30">' . $article["content"] . '</p>';
        echo '<div class="d-flex justify-content-between tm-pt-45">';
        echo '<span class="tm-color-primary">' . $article["category"] . '</span>';
        echo '<span class="tm-color-primary">' . $article["date"] . '</span>';
        echo '</div>';
        echo '<hr>';
        echo '<div class="d-flex justify-content-between">';
        echo '<span>by ' . $article["author"] . '</span>';
        echo '</article>';
      }

      // Close the last row if it's not already closed
      if ($numArticles % 2 != 0) {
        echo '</div>';
      }
    } else {
      echo "No articles found.";
    }

    ?>

    </section>

    <!-- end contact section -->

    <!-- info section -->
    <section class="info_section">
      <div class="container">
        <div class="info_container">
          <div class="row">
            <div class="col-md-3">
              <div class="info_logo">
                <a href="">
                  <img src="../images/logo.png" alt="" />
                  <span> Divine </span>
                </a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="info_contact">
                <a href="">
                  <img src="../images/location.png" alt="" />
                  <span> Address </span>
                </a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="info_contact">
                <a href="">
                  <img src="../images/phone.png" alt="" />
                  <span> +01 1234567890 </span>
                </a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="info_contact">
                <a href="">
                  <img src="../images/mail.png" alt="" />
                  <span> demo@gmail.com </span>
                </a>
              </div>
            </div>
          </div>
          <div class="info_social">
            <div class="d-flex justify-content-center">
              <h5 class="info_heading">Follow Us</h5>
            </div>
            <div class="social_box">
              <a href="">
                <img src="../images/fb.png" alt="" />
              </a>
              <a href="">
                <img src="../images/twitter.png" alt="" />
              </a>
              <a href="">
                <img src="../images/linkedin.png" alt="" />
              </a>
              <a href="">
                <img src="../images/insta.png" alt="" />
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- end blog_section -->

    <!-- footer section -->
    <section class="container-fluid footer_section">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Divine Mine & Gems</a>
      </p>
    </section>
    <!-- footer section -->

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: 27.67043621347555, lng: 85.30984850186114 },
          zoom: 19,
        });
        var marker = new google.maps.Marker({
          position: { lat: 27.67043621347555, lng: 85.30984850186114 },
          map: map,
          title: "Our Marker",
        });
      }
    </script>
  </body>
   