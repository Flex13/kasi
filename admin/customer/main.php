<?php
include_once("functions/db.php");
include_once("functions/functions.php");
include('functions/classes/main.class.php');
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Kasi Mall Customers</h4>
                <p class="card-category"> List of all Customers in Kasi Mall</p>
                <a class="btn btn-primary btn-round" href="customer.php?add"><i class="material-icons">person</i> Add Customer</a>
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
                                    Kasi
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
                                $id = $rs['id'];
                                $username = $rs['c_username'];
                                $email = $rs['c_email'];
                                $name = $rs['c_firstname'];
                                $surname  = $rs['c_surname'];
                                $contact  = $rs['c_contact'];
                                $gender  = $rs['c_gender'];
                                $country  = $rs['c_country'];
                                $province  = $rs['c_province'];
                                $city  = $rs['c_city'];
                                $kasi  = $rs['c_kasi'];
                                $street_address  = $rs['c_street_address'];
                                $zip  = $rs['c_zip'];
                                $image  = $rs['c_image'];
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
                                    <td>
                                    <?php if (isset($kasi)) echo $kasi; ?>
                                    </td>
                                    <td class="text-primary">
                                    <?php 
                                    if ($activated == '1') {
                                        echo "Active";
                                        }  else {
                                            echo "not-active";
                                            }; 
                                            ?>
                                    </td>
                                    <td class="td-actions">
                                        <a class="btn btn-success btn-round btn-block" href="supplier.php?view=<?php if (isset($id)) echo $id; ?>">
                                            <i class="material-icons">visibility</i> View
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
