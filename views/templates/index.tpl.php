<?php
require 'models/database.php';
$db = new Database();
$themes = $db->getAllRows('themes');
?>
<?php include 'base.php'?>
    <title>Welcome</title>
    <div class="bg">
    <style type="text/css">
        .marg {
            margin: 15px;
        }

        ul {
            font-size: 20px;
        }
    </style>

<?php include 'header.php'?>
<h2>Forum about animals</h2>
<hr>
<h3>Choose a topic</h3>
<a href="/forum/index.php/new-theme/">Or create a new one</a>
<p></p><hr>
<?php foreach ($themes as $theme):?>

    <p><li><a href="/forum/index.php/theme/?id=<?php echo $theme[0]?>"><?php echo $theme[1]?></a></li></p>

<?php endforeach; ?>

<hr>

<?php require 'views/templates/footer.php' ?>
