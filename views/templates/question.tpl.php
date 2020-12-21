<?php
include 'controllers/question.ctrl.php';
$id = $_GET['id'];
$post = getPost($id);
$comments = getComments($id);
?>
<?php require 'base.php'?>

    <title>Discussion</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
    <?php require 'header.php'?>
    <div class="post">
        <hr><small>Author: <?php echo $post[0][6] ?></small>
        <h3><?php echo $post[0][5] ?></h3><small><p><?php echo $post[0][4] ?></p></small>
        <p><?php echo $post[0][3] ?></p>
        <hr>
    </div>
    <div class="add_comment">
        <form action="/forum/index.php/theme/question/?id=<?php echo $id?>" method="POST">
            <input name="id" value="<?php echo $id?>" hidden>
            <div class="form-group col-10">
                <textarea name="body" id="body"></textarea>
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Send">
            </div>
        </form>
    </div>
    <p>Comments:</p>
    <div class="comments">
        <hr>

        <?php if (isset($comments)):?>
        <?php foreach ($comments as $com): ?>
            <p><?php echo $com[5] ?>: <?php echo $com[4] ?></p>
            <p><?php echo $com[3] ?></p>
            <hr>
        <?php endforeach; ?>
            <div class="add_comment">
                <form action="/forum/index.php/theme/question/?id=<?php echo $id?>" method="POST">
                    <input name="id" value="<?php echo $id?>" hidden>
                    <div class="form-group col-10">
                        <textarea name="body" id="body2"></textarea>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Send">
                    </div>
                </form>
            </div>
        <?php endif; ?>

    </div>

<script>
    ClassicEditor
        .create(document.querySelector('#body'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#body2'))
        .catch(error => {
            console.error(error);
        });
</script>
<?php include 'views/templates/footer.php' ?>
