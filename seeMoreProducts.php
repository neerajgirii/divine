
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <link
      href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Poppins:400,600,700&display=swap"
      rel="stylesheet"
    />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />


<section class="price_section layout_padding">
      <div class="container">
        <div class="heading_container">
          <h2>Our Jewellery Price</h2>
        </div>
        <div class="price_container">
        <?php
        include 'php/connectToDatabase.php';

        // Determine the current page number
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $itemsPerPage = 3; // Number of items to display per page
        $offset = ($page - 1) * $itemsPerPage;

        // Query to retrieve product data with pagination
        $sql = "SELECT * FROM currentProducts"; // Use the table you've created
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data for each product
            while ($row = $result->fetch_assoc()) {
                echo '<div class="box">';
                echo '<div class="name">';
                echo '<h6>' . $row["product_name"] . '</h6>';
                echo '</div>';
                echo '<div class="img-box">';
                echo '<img src="' . $row["image_url"] . '" alt="" />';
                echo '</div>';
                echo '<div class="detail-box">';
                echo '<h5>$<span>' . $row["price"] . '</span></h5>';
                echo '<a href="">Buy Now</a>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "No products found";
        }

        // Close the database connection
        $conn->close();
        ?>
        </div>
      </div>
    </section>