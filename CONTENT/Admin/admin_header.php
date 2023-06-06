<html>
<head>
    <link rel="stylesheet" href="../../CSS/header_style.css">
	<link rel="stylesheet" href="../../CSS/admin.css">
    <style>
            .logo 
            {
                display: block;
                width: 60px;
                height: 60px;
                border-radius: 50%;
                font-size: 2rem;
                display: grid;
                place-items: center;
                font-family: 'Monoton', sans-serif;
                color: #FFF;
                grid-area: logo;
            }
    </style>
</head>
<body>

    <div class="site-wrapper">
        <header>
            <a href="admin_dashboard.php" class="logo">
                <img src="https://img07.shop-pro.jp/PA01326/341/PA01326341.jpg?cmsp_timestamp=20230509114623" style="max-width:90px;">
            </a>

            <nav class="site-nav">
                <ul>
                    <li><a href="admin_dashboard.php">📈Dashboard</a></li>
                    <li><a href="admin_court_list.php">Fruit & Vegetables</a></li>
                    <li><a href="admin_customer_list.php">Customer List</a></li>
					<li><a href="admin_log_out.php">Logout</a></li>
                </ul>
            </nav>
        </header>
    </div>

</body>
</html>