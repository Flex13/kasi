<?php
include_once("functions/db.php");
include_once("functions/functions.php");
include('functions/classes/main.class.php');
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Kasi Mall Suppliers</h4>
                <p class="card-category"> List of all Suppliers on Kasi Mall</p>
                <a class="btn btn-primary btn-round" href="supplier.php?add"> Add Supplier</a>
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
                                    Shop Name
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
                                $shop_id = $rs['m_id'];
                                $shop_name = $rs['m_shop_name'];
                                $shop_province = $rs['shop_province'];
                                $shop_city = $rs['shop_city'];
                                $shop_kasi  = $rs['shop_kasi'];
                                $activated = $rs['activated'];
                            ?>

                                <tr>
                                    <td>
                                    <?php if (isset($shop_id)) echo $shop_id; ?>
                                    </td>
                                    <td>
                                    <?php if (isset($shop_name)) echo $shop_name; ?>
                                    </td>
                                    <td>
                                    <?php if (isset($shop_province)) echo $shop_province; ?>
                                    </td>
                                    <td>
                                    <?php if (isset($shop_city)) echo $shop_city; ?>
                                    </td>
                                    <td>
                                    <?php if (isset($shop_kasi)) echo $shop_kasi; ?>
                                    </td>
                                    <td class="text-primary">
                                    <?php if ($activated == '1') :?>
                                        <i class='text-success material-icons'>public</i></div>
                                        <?php else : ?>
                                            <i class='text-danger material-icons'>public_off</i></div>
                                    <?php endif ?>
                                    </td>
                                    <td class="td-actions">
                                        <a class="btn btn-success btn-round btn-block" href="supplier.php?view=<?php if (isset($shop_id)) echo $shop_id; ?>">
                                             View
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
