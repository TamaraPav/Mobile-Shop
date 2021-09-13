<?php zabeleziPristupStranici(); ?>
<div class="container-fluid p-0 m-0" id="logovanje">
<div class="container-fluid blur">
    <div class="container">
        <div class="row p-0 m-0">
            <div class="col-md-6 col-sm-12 p-4">
                <h3>Log In</h3>
                <form id="login" action="models/log_reg/prijava.php" method="POST" class="text-left" onsubmit="return checkLog()">
                    <div class="form-group">
                        <label for="tbEmail">Email address</label>
                        <input id="tbEmail" type="text" class="form-control" name="tbEmail" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="tbPass">Password</label>
                        <input id="tbPass" type="password" class="form-control" name="tbPass" placeholder="Password">
                    </div>
                    <button id="logujSe" name="logButton" type="submit" class="btn btn-light right">Submit</button>
                </form>             
            </div>
            <div class="col-md-6 col-sm-12 p-4">
                <h3>Register</h3>
                <form id="register" action="models/log_reg/registracija.php" method="POST" class="text-left"  onsubmit="return checkReg()">
                    <div class="form-group">
                        <label for="tbFirstName">First Name</label>
                        <input id="tbFirstName" type="text" class="form-control" name="tbFirstName" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <label for="tbLastName">Last Name</label>
                        <input id="tbLastName" type="text" class="form-control" name="tbLastName" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <label for="tbAddress">Address</label>
                        <input id="tbAddress" type="text" class="form-control" name="tbAddress" placeholder="Enter your adress">
                    </div>
                    <div class="form-group">
                        <label for="tbEmail">Email address</label>
                        <input id="tbEmailReg" type="text" class="form-control" name="tbEmailReg" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="tbPass">Password</label>
                        <input id="tbPassReg" type="password" class="form-control" name="tbPassReg" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="tbPassAgain">Confirm Password</label>
                        <input id="tbPassAgain" type="password" class="form-control" name="tbPassAgain" placeholder="Password">
                    </div>
                    <button id="registrujSe" name="regButton" type="submit" class="btn btn-light right">Submit</button>
                </form>             
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="col-12 text-center" id="err"></div>
        </div>
        </div>
    </div>
</div>
