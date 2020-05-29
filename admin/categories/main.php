<?php
include_once("functions/db.php");
include_once("functions/functions.php");
include('functions/classes/main.class.php');
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Categories</h4>
                <p class="card-category"> List of all Categories</p>
                <a class="btn btn-primary btn-round" href="categories.php?add"> Add Category</a>
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
                                    Sub name
                                </th>
                                <th>
                                    Added by
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
                                $id = $rs['cat_id'];
                                $m_id = $rs['m_id'];
                                $name = $rs['category_name'];
                                $sub = $rs['sub_category'];
                                $image = $rs['image'];
                                $added_by = $rs['added_by'];
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
                                    <?php if (isset($sub)) echo $sub; ?>
                                    </td>
                                    <td>
                                    <?php if (isset($added_by)) echo $added_by; ?>
                                    </td>
                                    <td class="text-primary">
                                    <?php if ($activated == '1') :?>
                                        <i class='text-success material-icons'>public</i></div>
                                        <?php else : ?>
                                            <i class='text-danger material-icons'>public_off</i></div>
                                    <?php endif ?>
                                    </td>
                                    <td class="td-actions">
                                        <a class="btn btn-success btn-round btn-block" href="categories.php?view=<?php if (isset($id)) echo $id; ?>">
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
