<?php $this -> view("header", $info); ?>

    <div class="container-fluid rigester-container" dir="ltr">
        <div class="row row-form-container">
            <div class="form-container col-12 col-sm-10 col-md-12 col-lg-12 col-xl-12 col-xll-12">
                <div class="signup col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xll-2">
                    <form onsubmit="return false" id="signup_form">
                        <input type="text"   name="firstname_signup" placeholder="firstname" class="tr" key="firstname" id="firstname">
                        <input type="text"   name="lastname_signup"  placeholder="lastname"  class="tr" key="lastname"  id="lastname">
                        <input type="text"   name="username_signup"  placeholder="username"  class="tr" key="username"  id="username">
                        <input type="text"   name="email_signup"     placeholder="email"     class="tr" key="email"     id="email">
                        <input type="text"   name="password_signup"  placeholder="password"  class="tr" key="password"  id="password">
                        <input type="submit" name="submit_signup"    value="submit"          id="submit_signup">
                        <!-- <button type="submit" name="submit_signup" id="submit_signup">submit</button> -->
                    </form>
                </div>
                <div class="login col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xll-2">
                    <form onsubmit="return false" id="login_form">
                        <input type="text" name="email_login" placeholder="email" id="email">
                        <input type="text" name="password_login" placeholder="password" id="password">
                        <input type="submit" name="submit_login" value="submit" id="submit_login">
                        <!-- <a href="" onClick="return false">signup</a> -->
                    </form>
                </div>
            </div>
            <div id="data"></div>
            <!-- <div class="info-container col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xll-6">
                
            </div> -->
        </div>
    </div>
    <!-- <button id="anime-login">login</button>
    <button id="anime-signup">signup</button> -->
<?php $this -> view("footer"); ?>