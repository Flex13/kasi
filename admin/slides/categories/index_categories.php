


<?php 
                //fetching all the categories from Database
                global $db;
                $sqlQuery1 = "SELECT * FROM category WHERE activated= :value";
                $stmt1 = $db->prepare($sqlQuery1);
                $stmt1->execute(array(':value' => '1'));

                 
                 while ($rs = $stmt1->fetch()) { 
                    $cat_id = $rs['cat_id'];
                    $m_id = $rs['m_id'];
                    $category_name = $rs['category_name'];
                    $sub_category_name = $rs['sub_category'];
                    $image = $rs['image'];

                
                ?>
                        <div>
                            <div class="card login-card">
                                <div class="card-body">
                                    <div class="card-banner">
                                        <div class="card-body" style="height:250px; background-image: url('admin/uploads/categories/<?php if (isset($image)) echo $image; ?>');">
                                        </div>
                                        <div class="text-bottom cat-banner">
                                            <a style="color: white;" href="">
                                                <h4 class="title mb-0"><?php if (isset($category_name)) echo   $category_name; ?></h4>
                                            </a>
                                            <a href="products.php?categories=<?php if (isset($category_name)) echo   $category_name; ?>" class="btn btn-primary-cat">Shop Now <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php }?>