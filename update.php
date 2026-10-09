<?php include ('header.php'); ?>
<?php include ('connect.php'); ?>


<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `users` WHERE `id` = '$id'";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed " . mysqli_error($conn));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}
?>


<?php
if (isset($_POST["updateBtn"])) {
    $username = $_POST['username'];
    $usergender = $_POST['usergender'];
    $useremail = $_POST['useremail'];
    $usernumber = $_POST['usernumber'];
    $useraddress = $_POST['useraddress'];

    if (isset($_GET['idNew'])) {
        $idNew = $_GET['idNew'];
    }

    $sqlUpdate = "UPDATE `users` SET 
                  `Name` = '$username',
                  `Gender` = '$usergender',
                  `Email` = '$useremail',
                  `Mobile` = '$usernumber',
                  `Address` = '$useraddress'
                  WHERE `id` = $idNew";

    $resultUpdate = mysqli_query($conn, $sqlUpdate);
    if (!$resultUpdate) {
        die("Query failed " . mysqli_error($conn));
    } else {
        header("location:index.php?update_message=Data successfully updated !!");
    }
}
?>


<form action="update.php?idNew=<?php echo $id ?>" method="post">
    <div class="mb-3 row">
        <label for="username" class="col-sm-2 col-form-label"><b>Name</b></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="username" id="username" value="<?php echo $row['Name'] ?>"
                required>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="usergender" class="col-sm-2 col-form-label"><b>Gender</b></label>
        <div class="col-sm-10">
            <select name="usergender" class="form-select form-control" id="usergender" required>
                <option>Select your gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="useremail" class="col-sm-2 col-form-label"><b>Email</b></label>
        <div class="col-sm-10">
            <input name="useremail" type="email" class="form-control" id="useremail"
                value="<?php echo $row['Email']; ?>" required>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="usernumber" class="col-sm-2 col-form-label"><b>Mobile</b></label>
        <div class="col-sm-10">
            <input name="usernumber" type="tel" class="form-control" id="usernumber" maxlength="10"
                value="<?php echo $row['Mobile'] ?>" required>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="useraddress" class="col-sm-2 col-form-label"><b>Address</b></label>
        <div class="col-sm-10">
            <textarea name="useraddress" class="form-control" id="useraddress" required
                style="height: 100px"><?php echo $row['Address'] ?></textarea>
        </div>
    </div>
    <button type="submit" name='updateBtn' class="btn btn-outline-primary btn-lg">Update</button>
</form>




<?php include ('footer.php') ?>