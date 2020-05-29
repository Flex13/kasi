<?php
include_once("functions/db.php");
include_once("functions/functions.php");
include('functions/classes/main.class.php');
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Amakasi</h4>
                <p class="card-category"> List of all Kasi's</p>
                <a class="btn btn-primary btn-round" href="amakasi.php?add"><i class="material-icons">place</i> Add Kasi</a>
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
                                    Name
                                </th>
                                <th>
                                    Province
                                </th>
                                <th>
                                    City
                                </th>
                                <th>
                                    Active
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            while ($rs = $statement->fetch()) {
                                $id = $rs['location_id'];
                                $province = $rs['province'];
                                $name = $rs['name'];
                                $alt_name = $rs['alt_name'];
                                $city = $rs['city'];
                                $image = $rs['image1'];
                               
                                $activated = $rs['activated'];
                            ?>

                                <tr>
                                    <td>
                                    <?php if (isset($id)) echo $id; ?>
                                    </td>
                                    <td>
                                    <?php if (isset($name)) echo $name; ?>
                                    </td>
                                    <td>
                                    <?php if (isset($province)) echo $province; ?>
                                    </td>
                                    <td>
                                    <?php if (isset($city)) echo $city; ?>
                                    </td>
                                    <td class="text-primary">
                                    <?php if ($activated == '1') :?>
                                        <i class='text-success material-icons'>public</i></div>
                                        <?php else : ?>
                                            <i class='text-danger material-icons'>public_off</i></div>
                                    <?php endif ?>
                                    </td>
                                    <td class="td-actions">
                                        <a class="btn btn-success btn-round btn-block" href="amakasi.php?view=<?php if (isset($id)) echo $id; ?>">
                                             View
                                        </a>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
