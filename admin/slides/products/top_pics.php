

<?php 
                //fetching all the categories from Database
                global $db;
                $sqlQuery1 = "SELECT * FROM products WHERE activated= :value";
                $stmt = $db->prepare($sqlQuery1);
                $stmt->execute(array(':value' => '1'));

                 
                 while ($rs = $stmt->fetch()) { 
                    $product_id = $rs['product_id'];
                    $shop_id = $rs['m_id'];
                    $cat_name = $rs['cat_name'];
                    $sub_cat_name = $rs['sub_cat_name'];
                    $product_name = $rs['product_name'];
                    $product_description = $rs['product_description'];
                    $product_price = $rs['product_price'];
                    $image = $rs['image'];
                    $likes = $rs['likes'];
                    $shop_date_joined = strftime("%b %d, %Y", strtotime($rs['reg_date']));


                 

                        if ((isset($_SESSION['id']))) {
                            $customer_id = $_SESSION['id'];                      
                    } else {
                        $customer_id = 'Guest';
                    }


                $sqlQuery2 = "SELECT * FROM saved_products WHERE product_id = :product_id AND customer_id = :id AND liked= '1'";
                $stmt2 = $db->prepare($sqlQuery2);
                $stmt2->execute(array(':product_id' => $product_id,':id' => $customer_id));

                 
                 while ($rs = $stmt2->fetch()) { 
                    $product_id2 = $rs['product_id'];
                    $customer_id2 = $rs['customer_id'];
                    $liked = $rs['liked'];
                }
                
                ?>

               
                 

<div class="col-md-3">
		<div href="#" class="card card-product-grid">
			<a href="#" class="img-wrap"> <img src="admin/uploads/products/<?php if (isset($image)) echo $image; ?>"> </a>
			<figcaption class="info-wrap">

				<a href="#" class="title"><b><?php if (isset($product_name)) echo $product_name; ?></b></a>


				<div class="rating-wrap">
					<span class="label-rating text-muted"> 34 reviws</span>
				</div>
				<div class="price mt-1">R<?php if (isset($product_price)) echo $product_price; ?></div> <!-- price-wrap.// -->


                <form id="regiration_form" novalidate action="" method="post">
                <input type="hidden" name="hidden_id" value="<?php if (isset($product_id)) echo $product_id; ?>"/>
            
                <?php if(isset($liked) == '1' && $product_id2 == $product_id) :?>
                <button type="submit" name="unlike" class="like float-right"><i onclick="myFunction(this)" class="fa fa-heart product-heart"></i> <?php if (isset($likes)) echo $likes; ?></button>
                <?php else : ?>
                    <button type="submit" name="like" class="like float-right"><i onclick="myFunction(this)" class="far fa-heart product-heart"></i> <?php if (isset($likes)) echo $likes; ?></button>
                <?php endif ?>


                 
                                </form>



			</figcaption>
            
		</div>
	</div> <!-- col.// -->

    <?php }?>