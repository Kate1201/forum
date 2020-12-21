<?php require 'controllers/new-theme.ctrl.php'?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
	<title>New theme</title>

</head>
<body>
<div class="container">
    <h3>New theme</h3>
    <form action="/forum/index.php/new-theme/" method="POST">
        <div class="col-6">
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" type="text" name="name">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" name="submit" type="submit" value="Add">
            </div>
        </div>

    </form>
    <?php require 'views/templates/footer.php' ?>
