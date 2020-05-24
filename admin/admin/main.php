<?php 
include_once("functions/db.php");
include_once("functions/functions.php"); 
include('functions/classes/main.class.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Kasi Mall Admin</h4>
                <p class="card-category"> List of all Admins on Kasi Mall</p>
                <a class="btn btn-primary btn-round" href="admin.php?add">
                    <i class="material-icons">person</i> Add Admin
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary text-center">
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Username
                                </th>
                                <th>
                                    Admin Name
                                </th>
                                <th>
                                    Surname
                                </th>
                                <th>
                                    Edit
                                </th>
                                <th>
                                   Delete
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php
                while ($rs = $statement->fetch()) {
                    $id = $rs['id'];
                    $name = $rs['name'];
                    $surname = $rs['surname'];
                    $email = $rs['email'];
                    $username  = $rs['username'];
                    $cell = $rs['cell'];
                ?>
                            <tr>
                                <td>
                                <?php if (isset($id)) echo $id; ?>
                                </td>
                                <td>
                                <?php if (isset($username)) echo $username; ?>
                                </td>
                                <td>
                                <?php if (isset($name)) echo $name; ?>
                                </td>
                                <td>
                                <?php if (isset($surname)) echo $surname; ?>
                                
                                <td class="td-actions">
                                <a class="btn btn-success btn-round btn-block" href="admin.php?edit=<?php if (isset($id)) echo $id; ?>">
                                <i class="material-icons">edit</i> Edit
                </a>
                                </td>
                                <td class="td-actions">
                                <a class="btn btn-danger btn-round btn-block" href="admin.php?delete=<?php if (isset($id)) echo $id; ?>">
                                <i class="material-icons">close</i> Remove
                </a>
                                </td>
                            </tr>
                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>