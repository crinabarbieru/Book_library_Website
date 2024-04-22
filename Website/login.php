<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Log In</title>
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
            
    <script src="js/override.js"></script>
        </div>
    </div>

    <br>
    <br>

    <div class="container">
        <form method="post">
            <div style="font-size: 20px;margin: 10px;color: #536949;">
                Login
            </div>
            <input id="text" type="text" name="username"><br><br>
            <input id="text" type="password" name="password"><br><br>
            <input id="button" type="submit" value="Login"><br><br>
        </form>
        <a href="http://localhost/WD_final_project/signup.html"><button class="login_btn">Click to Signup</button></a><br><br>
            <a href="http://localhost/WD_final_project/index.html"><button class="login_btn">Continue as Reader</button></a><br><br>
    </div>


    <?php
    session_start();
    include("php/db.php");
    include("php/functions.php");
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //something was posted
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (!empty($username) && !empty($password) && !is_numeric($username)) {
            //read from database
            $query = "select * from users where username = '$username' limit 1";
            $result = mysqli_query($conn, $query);
            if ($result) {
                if ($result && mysqli_num_rows($result) > 0) {
                    $user_data = mysqli_fetch_assoc($result);
                    if ($user_data['password'] === $password) {
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: add_books.php");
                        die;
                    }
                }
            }
            echo "Wrong username / password!";
        } else {
            echo "Wrong username / password!";
        }
    }
    ?>
</body>