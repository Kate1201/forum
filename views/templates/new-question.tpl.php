<?php
require 'controllers/new-question.ctrl.php';
$id = $_SERVER['QUERY_STRING'];
$id = str_replace('id=', '', $id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>New question</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>

    <style type="text/css">
        .marg {
            margin: 25% 0 0 0;
        }
    </style>
</head>
<body>
<div class="container">
    <form action="/forum/index.php/theme/new-question/?id=<?php echo $id?>" method="POST">
        <div class="col-5 form-group">
            <input class="form-control" type="text" name="name" placeholder="Discussion title">
        </div>
        <div class="form-group col-10">
            <textarea name="body" id="body"></textarea>
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Create">
        </div>
    </form>
<script>
    ClassicEditor
        .create(document.querySelector('#body'))
        .catch(error => {
            console.error(error);
        });
</script>
<?php require 'views/templates/footer.php' ?>
