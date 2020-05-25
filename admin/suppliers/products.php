<?php
include_once("functions/db.php");
include_once("functions/functions.php");
include('functions/classes/products.class.php');
?>
<div class="container">
<a class="btn btn-danger" href="supplier.php?view=<?php if (isset($_GET['v_products'])) echo $_GET['v_products']; ?>">
    <i class="material-icons">arrow_back</i> Back
</a>
</div>
   
<div class="site-slider-three px md-4">
    <div class="row slider-three">

        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header p-3" data-header-animation="true">
                    <img class="card-img-top" src="https://images.unsplash.com/photo-1517303650219-83c8b1788c4c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=bd4c162d27ea317ff8c67255e955e3c8&auto=format&fit=crop&w=2691&q=80" alt="Card image cap">
                </div>

                <div class="card-body">
                    <div class="card-actions">


                        <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="Delete Product">
                            <i class="material-icons">delete</i>
                        </button>
                        <a href="supplier.php?edit_product" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="Edit Product"><i class="material-icons">edit</i></a>

                    </div>
                    <h4 class="card-title">Braai Pack</h4>
                    <p class="card-category">R80.00</p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        Soweto, Muncheezz
                    </div>
                </div>
            </div>
        </div>


    </div>
 
</div>

