<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <title>Books</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/stylesheet.css">

    <link href='https://fonts.googleapis.com/css?family=Alkatra' rel='stylesheet'>

    <!-- GOOGLE ICONS STYLESHEET-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />




</head>

<body>

    <!--------HEADER------>
    <div id="header_container" class="header_container">
        <script src="js/header.js"> </script>
    </div>

    <div class="interm_banner" id="btn_banner">
     <a href="login.php"><button class="login_btn">Add Books</button></a>
    </div>
   




    <!--------DISPLAY BOOKS------>
    <?php

    // Connect to DB
    include_once 'php/db.php';

    //Interogation
    $query = "SELECT * FROM books";
    $result = mysqli_query($conn, $query);

    // Check Interogation result
    if (!$result) {
        die("Failed: " . mysqli_error($conn));
    }

    // Creating a table
    echo "<table>";
    echo "<tr>";
    ?>
    <th id="row_cover">Cover</th>
    <th id="row_title">Title</th>
    <th id="row_autor">Author</th>
    <th id="row_description">Descriptuion</th>
    <th id="row_isbn">ISBN</th>
    <th>PDF</th>
    <?php
    // Obtinerea numelor de coloane
    $fieldNames = mysqli_fetch_fields($result);

    /*
    foreach ($fieldNames as $field) {
    echo "<th>" . $field->name . "</th>";
    }
    */
    echo "</tr>";

    // Afisarea randurilor
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>"; ?>
        <td><img id="table_img" src="<?php echo $row['img_link']; ?>"></td>
        <td>
            <?php echo $row['title']; ?>
        </td>
        <td>
            <?php echo $row['author']; ?>
        </td>
        <td>
            <?php echo $row['description']; ?>
        </td>
        <td>
            <?php echo $row['isbn']; ?>
        </td>
        <td><a href="<?php echo $row['read_link']; ?>"><button class="btn">Read Here</button></a></td>
        <?php
        echo "</tr>";
    }

    echo "</table>";

    // Inchiderea conexiunii
    mysqli_free_result($result);
    mysqli_close($conn);

    ?>


    <!--------FOOTER------>
    <div id="footer" class="footer">
        <script src="js/footer.js">
        </script>
    </div>

    <script src="js/override.js"></script>

</body>