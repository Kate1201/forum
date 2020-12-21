</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <?php
        if (isset($_SESSION["loggedin"]) && $_SESSION['loggedin'] == 1){
            echo '<a>Forum: |</a>';
            echo ' <a href="/forum/index.php/ ">Welcome</a> |';
            echo ' <a href="/forum/index.php/logout">Logout</a></p> |';
        }
        else{
echo '<a>Forum: |</a>';
            echo ' <a href="/forum/index.php/ ">Welcome</a> |';
            echo ' <a href="/forum/index.php/register">Registration</a> |';
            echo ' <a href="/forum/index.php/login">Login</a></p> |';
        }
        ?>
    </nav>

