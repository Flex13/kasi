<?php
include("functions/main.php");
$page_title = 'Login - Kasi Mall Online';
include('includes/appheader.php');
include('functions/classes/loginapp.class.php');
?>


<section class="container login-section" style="margin-bottom: 100px;">

    <div class="container" align="center">
        <div class="col-12 logo-padding">
            <a href="index.php" class="brand-wrap"><img class="logo-login" src="images/kasilogo.jpg"></a>
        </div>
    </div>

   
        <div class="card-body">
            <h4 class="card-title mb-4">Payment</h4>
            <form role="form">
                <div class="form-group">
                    <label for="username">Name on card</label>
                    <input type="text" class="form-control" name="username" placeholder="Ex. John Smith" required="">
                </div> <!-- form-group.// -->

                <div class="form-group">
                    <label for="cardNumber">Card number</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="cardNumber" placeholder="">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fab fa-cc-visa"></i> &nbsp; <i class="fab fa-cc-amex"></i> &nbsp;
                                <i class="fab fa-cc-mastercard"></i>
                            </span>
                        </div>
                    </div> <!-- input-group.// -->
                </div> <!-- form-group.// -->

                <div class="row">
                    <div class="col-md flex-grow-0">
                        <div class="form-group">
                            <label><span class="hidden-xs">Expiration</span> </label>
                            <div class="form-inline" style="min-width: 220px">
                                <select class="form-control" style="width:100px">
                                    <option>MM</option>
                                    <option>01 - Janiary</option>
                                    <option>02 - February</option>
                                    <option>03 - February</option>
                                </select>
                                <span style="width:20px; text-align: center"> / </span>
                                <select class="form-control" style="width:100px">
                                    <option>YY</option>
                                    <option>2018</option>
                                    <option>2019</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label data-toggle="tooltip" title="" data-original-title="3 digits code on back side of the card">CVV <i class="fa fa-question-circle"></i></label>
                            <input class="form-control" required="" type="text">
                        </div> <!-- form-group.// -->
                    </div>
                </div> <!-- row.// -->

                <p class="alert alert-success"> <i class="fa fa-lock"></i> Some secureity information Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
                <button class="subscribe btn btn-primary btn-block" type="button"> Confirm </button>
            </form>
        </div> <!-- card-body.// -->
    


</section>



<?php include('includes/appfooter.php'); ?>