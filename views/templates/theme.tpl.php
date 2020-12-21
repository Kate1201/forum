<?php
require 'models/database.php';
$id = $_SERVER['QUERY_STRING'];
$id = str_replace('id=', '', $id);
$db = new Database();
$posts = $db->getRows('post', 'theme_id', $id);
?>
<?php require 'base.php'?>
<title>Topics</title>
<?php require 'header.php'?>
<hr>
<h3>Select discussion</h3>
<h4>Can't find a discussion?<a href="/forum/index.php/theme/new-question/?id=<?php echo $id?>">Create new!</a> </h4>
<h4>Wrong topic?<a href="/forum/index.php/">Back</a></h4>
<hr>
<?php foreach ($posts as $post): ?>
<ul>
    <li>
        <a href="question/?id=<?php echo $post[0]?>"><?php echo $post[5]?></a>
    </li>
</ul>
<?php endforeach;?>
<hr>
<?php require 'views/templates/footer.php' ?>
