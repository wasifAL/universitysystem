
<?php if (!isset($_SESSION)) session_start();$_SESSION['link'] = "adddepartment.php"; ?>

<div class="container">
    <form class="form-horizontal" action=" " method="post"  id="contact_form">
        <fieldset>
            <h1 class="text-center">New Department Details</h1> <br>
            <!-- Department Name input-->
            <div class="form-group">
                <label class="col-md-4 control-label">Department Name</label>  
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                        <input  name="departmentname" placeholder="Full Department Name" class="form-control"  type="text">
                    </div>
                </div>
            </div>
            <!--Department ID input-->
            <div class="form-group">
                <label class="col-md-4 control-label">Department ID</label>  
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                        <input  name="departmentid" placeholder="Department ID" class="form-control"  type="text">
                    </div>
                </div>
            </div>
            <!-- Contact No input-->
            <div class="form-group">
                <label class="col-md-4 control-label">Total Courses</label>  
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                        <input name="totaltcourses" placeholder="Number of courses" class="form-control" type="tel">
                    </div>
                </div>
            </div>
            <!-- Contact No input-->
            <div class="form-group">
                <label class="col-md-4 control-label">Total Credit Hour</label>  
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                        <input name="totaltcredithour" placeholder="Total Credit Hours" class="form-control" type="tel">
                    </div>
                </div>
            </div>



            <!-- Success message -->
            <!--<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>-->

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4"><br>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <button type="submit" class="btn btn-warning" name="submit" >
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
                </div>
            </div>

        </fieldset>
    </form>
</div>

<?php
if (isset($_POST['submit'])) {
    require '../dbcon.php';
   
    $deptid = $_POST['departmentid'];
    $deptname = $_POST['departmentname'];
    $totalcourses = $_POST['totaltcourses'];
    $credithour = $_POST['totaltcredithour'];

    $sql = "INSERT INTO `departments`(`deptid`, `deptname`, `totalcourses`, `totalcredithour`)
            VALUES ('$deptid','$deptname',$totalcourses,$credithour)";
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("New record created successfully")</script>';
    } else {

        echo '<script>alert("Error: ' . $sql . '<br>' . $conn->error . '")</script>';
    }
    $conn->close();
}
?>