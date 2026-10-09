<?php include ("header.php"); ?>
<?php include ("connect.php"); ?>

<button type="button" class="my-3" data-bs-toggle="modal" data-bs-target="#addUserModal" id="newUserButton"><i
        class="fa-solid fa-user-plus" style="color: #00000;"></i> New users</button>

<table class="table table-light table-borderless table-striped table-responsive align-middle">
    <thead class="table-dark fw-bold">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Gender</td>
            <td>Email</td>
            <td>Mobile</td>
            <td>Address</td>
            <td colspan="2">Operations</td>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php
        $sql = 'SELECT * FROM `users`';
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die('Query failed :' . mysqli_error($conn));
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['Name'] ?></td>
                    <td><?php echo $row['Gender'] ?></td>
                    <td><?php echo $row['Email'] ?></td>
                    <td><?php echo $row['Mobile'] ?></td>
                    <td><?php echo $row['Address'] ?></td>
                    <td><a href="update.php?id=<?php echo $row['id']; ?>" data-bs-toggle="tooltip" data-bs-title="Edit"><i
                                class="fa-solid fa-pen-to-square fa-lg" style="color: #000000;"
                                onmouseover="this.style.color='#3d3d3d'" onmouseout="this.style.color='#000000'"></i></a></td>
                    <td><a href="delete.php?id=<?php echo $row['id']; ?>" data-bs-toggle="tooltip" data-bs-title="Delete"><i
                                class="fa-solid fa-trash fa-lg" style="color: #ff0000;" onmouseover="this.style.color='#d90202'"
                                onmouseout="this.style.color='#ff0000'"></i></a></td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>


<?php
if (isset($_GET['message'])) {
    echo '<h5 class="text-center text-danger ">' . $_GET['message'] . '</h5>';
}
?>
<?php
if (isset($_GET['insert_message'])) {
    echo '<h5 class="text-center text-success ">' . $_GET['insert_message'] . '</h5>';
}
?>
<?php
if (isset($_GET['update_message'])) {
    echo '<h5 class="text-center text-success ">' . $_GET['update_message'] . '</h5>';
}
?>
<?php
if (isset($_GET['deletion_message'])) {
    echo '<h5 class="text-center text-danger">' . $_GET['deletion_message'] . '</h5>';
}
?>

<form action="insert.php" method="post" autocomplete="off">
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h1 class="modal-title fs-5" id="addUserModalLabel">Add new users</h1>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="username" class="col-sm-2 col-form-label"><b>Name</b></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" id="username" required>
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
                            <input name="useremail" type="email" class="form-control" id="useremail" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="usernumber" class="col-sm-2 col-form-label"><b>Mobile</b></label>
                        <div class="col-sm-10">
                            <input name="usernumber" type="tel" class="form-control" id="usernumber" minlength="10" maxlength="10" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="useraddress" class="col-sm-2 col-form-label"><b>Address</b></label>
                        <div class="col-sm-10">
                            <textarea name="useraddress" class="form-control" id="useraddress" required
                                style="height: 100px"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                    <button name="addBtn" type="submit" class="btn btn-outline-primary">Add changes</button>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div> -->

<?php
include ("footer.php");
?>