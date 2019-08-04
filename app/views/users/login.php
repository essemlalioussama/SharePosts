<?php require APPROOT.'/views/inc/header.php'; ?>

<div class="row">

    <div class="col-sm-6 mx-auto">

        <div class="card card-body bg-light mt-5">

            <h1>Login</h1>
            <p>Please fill in your informations  to login in </p>
            <form action="<?php echo URLROOT; ?>/users/login" method="POST">

                <div class="form-group">
                    <label for="email"> Email : <sup>*</sup></label>
                    <input type="email" name="email" id="email"
                        class="form-control  form-control-lg <?php echo (!empty($data['email_err']) )? 'is-invalid' : ''; ?>"
                        placeholder="">
                    <span class="invalid-feedback"><?php echo $data['email_err'] ?></span>


                </div>

                <div class="form-group">
                    <label for="Password"> Password : <sup>*</sup></label>
                    <input type="Password" name="password" id="password"
                        class="form-control  form-control-lg <?php echo (!empty($data['password_err']) )? 'is-invalid' : '' ; ?>"
                        placeholder="">
                    <span class="invalid-feedback"><?php echo $data['password_err'] ?></span>


                </div>


                <div class="row">
                        <div class="col">

                        <input type="submit" value="Login" class="btn btn-success btn-block">
                        </div>
                        <div class="col">
                            <a href="<?php echo URLROOT ?>/users/Register" class="btn btn-light">Don't Have an account? Register</a>
                        </div>
                </div>
            </form>

        </div>

    </div>

</div>

<?php require APPROOT.'/views/inc/footer.php'; ?>