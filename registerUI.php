<?php
/**
 * Created by PhpStorm.
 * User: robertkestel
 * Date: 30.01.17
 * Time: 00:50
 */
echo "Bitte geben Sie Ihre Kontaktdaten ein"
?>
<div class="container">
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                <form id="register-form" action="" method="post" role="form" >
                    <div class="form-group">
                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                    </div>
                    <div class="form-group">
                        <input type="text" name="anrede" id="anrede" tabindex="1" class="form-control" placeholder="Title" value="">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <input type="text" name="user_adress" id="user_adress" tabindex="3" class="form-control" placeholder="Street">
                    </div>
                    <div class="form-group">
                        <input type="text" name="plz" id="plz" tabindex="4" class="form-control" placeholder="Postalcode">
                    </div>
                    <div class="form-group">
                        <input type="text" name="city" id="city" tabindex="5" class="form-control" placeholder="City">
                    </div>
                    <div class="form-group">
                        <input type="text" name="firstname" id="firstname" tabindex="7" class="form-control" placeholder="Firstname">
                    </div>

                    <div class="form-group">
                        <input type="text" name="secret" id="secret" tabindex="6" class="form-control" placeholder="Name of your mother">
                    </div>
                    <div class="form-group">
                        <input type="text" name="lastname" id="lastname" tabindex="8" class="form-control" placeholder="Lastname">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="submit" name="register-submit" id="register-submit" tabindex="9" class="form-control btn btn-register" value="Register Now">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
