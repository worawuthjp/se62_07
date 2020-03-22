<html lang="en" class="">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <title>Ku Login</title>
    <meta name="robots" content="noindex">
    <link rel="shortcut icon" type="image/x-icon"
        href="https://static.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico">
    <link rel="mask-icon" type=""
        href="https://static.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg"
        color="#111">
    <link rel="canonical" href="https://codepen.io/geoffreyrose/pen/HKDkB">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <script
        src="https://static.codepen.io/assets/editor/iframe/iframeConsoleRunner-dc0d50e60903d6825042d06159a8d5ac69a6c0e9bcef91e3380b17617061ce0f.js">
    </script>
    <script
        src="https://static.codepen.io/assets/editor/iframe/iframeRefreshCSS-d00a5a605474f5a5a14d7b43b6ba5eb7b3449f04226e06eb1b022c613eabc427.js">
    </script>
    <script
        src="https://static.codepen.io/assets/editor/iframe/iframeRuntimeErrors-29f059e28a3c6d3878960591ef98b1e303c1fe1935197dae7797c017a3ca1e82.js">
    </script>
    <style type="text/css" class="INLINE_PEN_STYLESHEET_ID">
    *,
    *:before,
    *:after {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    body,
    html,
    .login_form {
        height: 100%;
    }

    body {
        background-color: #006664;
    }

    .login_form {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-flex: center;
        -moz-box-flex: center;
        -webkit-flex: center;
        -ms-flex: center;
        flex: center;
        -webkit-justify-content: center;
        -moz-justify-content: center;
        justify-content: center;
        -webkit-box-pack: center;
        -moz-box-pack: center;
        -ms-flex-pack: center;
        -webkit-align-items: center;
        align-items: center;
    }

    .login-wrapper {
        max-width: 500px;
        width: 100%;
    }

    .logo {
        text-align: center;
    }

    .logo img {
        max-width: 200px;
        width: 100%;
        height: auto;
        margin: 1em auto 2em;
    }

    form {
        background: #000;
        padding: 2em 1em;
        font-family: helvetica, sans-serif;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
    }

    form label {
        color: #fff;
        margin: 0 3% .25em;
        display: block;
        font-family: helvetica, sans-serif;
    }

    form input {
        width: 94%;
        padding: .5em .25em;
        margin: 0 3% 1em;
        font-size: 1.2em;
        border: 2px solid #000;
        outline: none;
        -webkit-transition: all 0.25s;
        -moz-transition: all 0.25s;
        -ms-transition: all 0.25s;
        -o-transition: all 0.25s;
        transition: all 0.25s;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
    }

    form input.password {
        padding-right: 4rem;
    }

    form input:focus {
        border: 2px solid #1fd100;
    }

    form button {
        width: 94%;
        margin: 2em 3% 0;
        border: none;
        background: #1fd100;
        padding: 1em 0;
        font-size: 1.25em;
        clear: both;
        color: #000;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        outline: none;
        -webkit-transition: all 0.25s;
        -moz-transition: all 0.25s;
        -ms-transition: all 0.25s;
        -o-transition: all 0.25s;
        transition: all 0.25s;
        cursor: pointer;
    }

    form button:focus,
    form button:hover {
        background: #262626;
    }

    .hide-show {
        width: 94%;
        margin: -3.62em 3% 0 1.5%;
        position: relative;
        z-index: 5;
        display: none;
    }

    .hide-show span {
        background: #1fd100;
        font-size: 1em;
        padding: .5em;
        float: right;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        cursor: pointer;
    }
    </style>

    <script language="JavaScript">
    function ChkValid() {
        var v1 = document.userenter.form_account.value;
        var v2 = document.userenter.form_password.value;
        if (v1.length <= 0) {
            alert("Please enter all fields");
            return false;
        } else if (v2.length <= 0) {
            alert("Please enter all fields");
            return false;
        } else {
            return true;
        }
    }
    </script>

</head>

<body>
    <div class="login_form">
        <setion class="login-wrapper">
            <div class="logo">
                <a target="_blank" rel="noopener" href="https://unrealnavigation.com">
                    <img src="data:image/png;base64,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"
                        alt=""></a>
            </div>
            <form name="userenter" onSubmit="return ChkValid()" method="post" action="ldap.php">
                <label align="center">
                    <h2>ระบบยืม-คืนอุปกรณ์</h2>
                </label>
                <br>
                <label for="username">User Name</label>
                <input required="" name="username" type="text" autocapitalize="off" autocorrect="off">
                <label for="password">Password</label>
                <input class="password" required="" name="password" type="password">
                <div class="hide-show" style="display: block;">
                    <span class="show">Show</span>
                </div>

                <button type="submit" value="login">Sign In</button>

            </form>

        </setion>
    </div>
    <script
        src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script id="INLINE_PEN_JS_ID">
    $(function() {
        $('.hide-show').show();
        $('.hide-show span').addClass('show');

        $('.hide-show span').click(function() {
            if ($(this).hasClass('show')) {
                $(this).text('Hide');
                $('input[name="login[password]"]').attr('type', 'text');
                $(this).removeClass('show');
            } else {
                $(this).text('Show');
                $('input[name="login[password]"]').attr('type', 'password');
                $(this).addClass('show');
            }
        });

        $('form button[type="submit"]').on('click', function() {
            $('.hide-show span').text('Show').addClass('show');
            $('.hide-show').parent().find('input[name="login[password]"]').attr('type', 'password');
        });
    });
    //# sourceURL=pen.js
    </script>

</body>

</html>