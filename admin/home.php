<?php
require 'header.php';

if (!empty($_SESSION['role'])) {
    header('location:adminpanel.php');
} else {
    ?>


    <div class="container-fluid">
        <div class="container jumbotron">

            <h1 class="text-center">Admin Login Panel</h1>
            <form action="home.php" method="POST" >
                <div class="form-group">
                    <label for="username">UserName:</label>
                    <input type="text" class="form-control" name="username" id="username">
                </div>

                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" name="password" class="form-control" id="pwd">
                </div>               

                <button type="submit" class="btn btn-success" name="submit">Submit</button>

            </form>
        </div>
    </div>


    <br>
    <br>
    <br>
    <?php
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        require '../dbcon.php';

        $query = "SELECT * FROM administration WHERE username='" . $username . "' and password='" . $password . "'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['role'] = "admin";
            $_SESSION['user'] = $username;
            mysqli_close($conn);
            header('location:adminpanel.php');
        } else
            echo "user name and password not found";
    }
}
?>
<?php require 'footer.php'; ?>
