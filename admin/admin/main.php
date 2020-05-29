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
                     Add Admin
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
                    $email  = $rs['email'];
                    $username = $rs['username'];
                    $cell = $rs['cell'];
                    $reg_date = $rs['reg_date'];
                    $activated = $rs['activated'];
                    $user_type = $rs['user_type'];
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
                                <a class="btn btn-info btn-round btn-block" href="admin.php?edit=<?php if (isset($id)) echo $id; ?>">
                                 Edit
                </a>
                                </td>
                                <td class="td-actions">
                                <form id="regiration_form" novalidate action="" method="post">
                            <input type="hidden" name="hidden_id" value="<?php if (isset($id)) echo $id; ?>"/>
                                <?php
                                if ($activated == '1') : ?>
                                    <button type="submit" name="deactivate" class="btn btn-danger btn-round btn-block"><i class="material-icons">public</i> Deactivate</button>
                                <?php else : ?>
                                    <button type="submit" name="activate" class="btn btn-success btn-round btn-block"><i class="material-icons">public</i> Activate</button>
                                <?php endif ?>
                                </form>
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