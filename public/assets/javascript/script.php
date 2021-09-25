<script>
    // function googleTranslateElementInit() {
    //     new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    // }
    $("document").ready(function(){

// start of website translation code
        
        var translate = {
            ar : {
                home : 'الرئيسية',
                about : 'حول',
                register : 'التسجيل',
                dir : 'rtl',
                firstname : "الاسم الاول",
                lastname : "الاسم الاخير",
                username : "اسم المستخدم",
                email : "البريد الالكتروني",
                password : "كلمة المرور"
            },
            en : {
                home : 'Home',
                about : 'About',
                register : 'Register',
                dir : 'ltr',
                firstname : "Firstname",
                lastname : "Lastname",
                username : "Username",
                email : "Email",
                password : "Password"
            }
        };


        var tran = $(".lang-btn");

        tran.click(function () {
            var language = $(this).attr("id");
            // console.log( translate[language][$("body").attr("key")] );
            $("body").attr('dir', translate[language][$("body").attr("key")] );

            localStorage.setItem('language', language);

            $(".tr").each(function () {
                $(this).text( translate[language][$(this).attr("key")] );
            });
        });

        if ( localStorage.getItem('language') == 'ar' ) {
            $(".tr").each(function () {
                $("body").attr('dir', 'rtl');
                $(this).text( translate[ localStorage.getItem('language') ][ $(this).attr("key") ] );
            });
        }else if ( localStorage.getItem('language') == 'en' ) {
            $(".tr").each(function () {
                $("body").attr('dir', 'ltr');
                $(this).text( translate[ localStorage.getItem('language') ] [ $(this).attr("key") ] );
            });
        }
// end of website translation code

// font size responsive .. start
        window.addEventListener('resize', function () {
            if ( $("body").width() > 900 ) {
                $("a").css( "font-size",$("body").width() / 68.58 );
            }else if ( $("body").width() < 900 ) {
                $("a").css( "font-size","18px" );
            }
        });
// font size responsive .. end

// Ajax call for register .. start
        const submitinput_signup = $("#submit_signup");
        const warning = $("#data");
        var error = "none";
        submitinput_signup.click(function () {
            let formData = new FormData( $("#signup_form")[0] );
            formData.append('action', 'signup');
            fetch( "login", {
                method: "POST",
                body: formData
            }).then( res => res.text() ).then( data => {
                // console.log(data);
                error = data;
                // console.log(data);
                warning.text(error);
            });
        });
        const submitinput_login = $("#submit_login");
        submitinput_login.click(function () {
            let formData = new FormData( $("#login_form")[0] );
            formData.append('action', 'login');
            fetch( "login", {
                method: "POST",
                body: formData
            }).then( res => res.text() ).then( data => {
                error = data;
                console.log(error);
                warning.text(error);
            });
        });
// Ajax call for register .. end

// Register style .. start
        let login = $(".login");
        let signup = $(".signup");
        let loginForm = $("#login_form");
        let signupForm = $("#signup_form");
        let login_text_left = $(".login_text_container_left");
        let login_text_right = $(".login_text_container_right");
        let signup_text_left = $(".signup_text_container_left");
        let signup_text_right = $(".signup_text_container_right");
        var flage = true;

        function show_login_form () {
            if ( getComputedStyle(login[0]).zIndex === "0" && flage ) {
                flage = false;

                loginForm.animate( { opacity: 1 }, 500 );
                signupForm.animate( { opacity: 0 }, 500 );
                login.animate( { margin: "0px 1300px" }, 300, "linear") ;
                signup.animate( { margin: "0px 1300px" }, 300, "linear", () => {
                    login[0].style.zIndex = "1";
                    signup[0].style.zIndex = "0";
                    login.animate( { margin: "0px -150px" }, 300, "linear" );
                    signup.animate( { margin: "0px -150px" }, 300, "linear", () => { flage = true } );
                });
            }
        }
        function show_signup_form () {
            if ( getComputedStyle(signup[0]).zIndex === "0" && flage ) {
                flage = false;

                signupForm.animate( { opacity: 1 }, 500 );
                loginForm.animate( { opacity: 0 }, 500 );
                login.animate( { margin: "0px 1300px" }, 300, "linear" );
                signup.animate( { margin: "0px 1300px" }, 300, "linear", () => {
                    login[0].style.zIndex = "0";
                    signup[0].style.zIndex = "1";
                    login.animate( { margin: "0px -150px", }, 300, "linear" );
                    signup.animate( { margin: "0px -150px" }, 300, "linear", () => { flage = true });
                });
            }
        }

        login.on( 'click', () => { show_login_form () } );
        signup.on( 'click', () => { show_signup_form () } );

// Register style .. end









        // var gg;
        // async function tr (string) {
        //     var lol = await $.ajax({
        //         dataType: 'json',
        //         url: '../public/assets/json/lang2.json',
        //         data: {},
        //         success: function (data) {
        //             console.log(data);
        //         }
        //     });
        //     return lol;
        // }
        // tr("home");
    
    });
</script>