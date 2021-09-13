<form class="m-3" name="autorcontact" action="models/kontakt/sendMail.php" method="get" id="autorcontact" onsubmit="return checkForm()">
    <div class="row p-0 m-0">
        <div class="col-6">
            <label class="white-text" for="name">Your name:</label>
            <input id="name" class="white-text" type="text" placeholder="Insert Your name" name="name" required>
        </div>
        <div class="col-6">
            <label class="white-text" for="email">Email:</label><br/>
            <input id="email" class="white-text" type="email" placeholder="Insert Your email" name="email" required>
        </div>
    </div>
    <br/>
    <div class="row p-0 m-0">
        <div class="col-6">
        <label class="white-text" for="brand">Brand:</label>
            <div id="formBrand">
                <?php 
                include "views/parts/showBrandInForm.php";
                ?>
            </div>
        </div>
        <div class="col-6">
            <label class="white-text" for="model">Model:</label>
            <input id="model" class="white-text" type="text" placeholder="Model" name="model">
        </div>
    </div>
    <br/>
    <label class="white-text" for="message">Describe your problem:</label><br/>
    <textarea id="message" name="msg" class="white form-control black-text" rows="3"></textarea>
    <div class="center">
        <button id="sendMessage" type="submit" class="btn btn-dark btn-md white-text mt-1">Send</button>
    </div>
</form>

