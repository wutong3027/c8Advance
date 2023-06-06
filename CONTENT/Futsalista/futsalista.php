<?php include '../../INCLUDE/header.php'; ?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="../../CSS/futsalista_style.css">
    <style>
        .login-page
        {
            padding: 8% 0 0;
            margin: auto;
        }

        .form
        {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        .form .register-form
        {
            display: none;
        }

        /* Button */
        .btn 
        {
            width: 100%;
            border-radius: 5px;
            padding: 15px 25px;
            font-size: 15px;
            text-decoration: none;
            margin: 20px 0px 3px 0px;
            color: #fff;
            position: relative;
            display: inline-block;
        }
        
        .btn:active 
        {
            transform: translate(0px, 5px);
            -webkit-transform: translate(0px, 5px);
            box-shadow: 0px 1px 0px 0px;
        }
        
        .blue 
        {
            background-color: #55acee;
            box-shadow: 0px 5px 0px 0px #3C93D5;
        }
        
        .blue:hover 
        {
            background-color: #6FC6FF;
        }
    </style>
</head>
<body>
    <div class="login-page">
        <div class="form">
            <h3>© WELCOME TO E-BANSAN HOME PAGE</h3>
            <form class="login-form">
                <a href="../../CONTENT/Admin/admin_log_in.html" class="btn blue">Admin</a>
                <a href="../../CONTENT/Customer/Login.php" class="btn blue">Customer</a>
            </form>
        </div>
    </div>
</body>

<?php include '../../INCLUDE/footer.php'; ?>