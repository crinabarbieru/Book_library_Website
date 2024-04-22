<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <title>Add Books</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/stylesheet.css">

    <link href='https://fonts.googleapis.com/css?family=Alkatra' rel='stylesheet'>

    <!-- GOOGLE ICONS STYLESHEET-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />



</head>

<body>
    <div class="header_container">
        <div class="logo_container">
            <span id="header_logo" class="material-symbols-outlined">
                local_library
            </span>
            <h1>BellBooks</h1>
        </div>
    </div>
    <script src="js/override.js"></script>

    <div class="interm_banner" id="btn_banner">
     <a href="logout.php"><button class="login_btn">Log Out</button></a>
    </div>
    <br>

    <div class="container">
        <form  method="post">

            <label for="isbn">ISBN</label>
            <input type="text" id="isbn" name="isbn" placeholder="ISBN...">

            <label for="title">Title</label>
            <input type="text" id="title" name="title" placeholder="The title of the book...">

            <label for="author">Author</label>
            <input type="text" id="author" name="author" placeholder="The author(s) of the book...">

            <label for="description">Description</label>
            <textarea id="subject" name="description" placeholder="Short description of the subject..."
                style="height:200px"></textarea>

            <label for="lname">Cover</label>
            <input type="text" id="cover" name="cover" placeholder="Paste a link to the cover... ">

            <label for="lname">Read</label>
            <input type="text" id="read" name="read" placeholder="Paste a link to the pdf... ">


            <input type="submit" name="submit" value="submit">

        </form>
    </div>



    <?php

    include_once 'php/db.php';
    if (isset($_POST['submit'])) {
        $isbn = $_POST["isbn"];
        $title = $_POST["title"];
        $author = $_POST["author"];
        $description = $_POST["description"];
        $cover = $_POST["cover"];
        $read = $_POST["read"];

        $sql = "INSERT INTO books (isbn, title, author, description, img_link, read_link) VALUES ('$isbn','$title','$author', '$description', '$cover','$read')";

        if (mysqli_query($conn, $sql)) {
            echo "<p>New record has been added successfully !</p>";
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }


    ?>
    <br>
    <div class="interm_banner" id="btn_banner">
     <a href="add_books.php"><button class="login_btn">Add Another Book</button></a>
    </div>



</body>