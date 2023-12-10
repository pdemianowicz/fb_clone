<?php

function renderComment($comment, $loginUser)
{
    include 'comment.php';

    if (!empty($comment['replies'])) {
        echo '<ul class="replies">';
        foreach ($comment['replies'] as $reply) {
            renderComment($reply, $loginUser);
        }
        echo '</ul>';
    }
}

foreach ($comments as $comment) {
    renderComment($comment, $loginUser);
}

?>
<div class="make-comment">
  <div class="make-comment__avatar"><img src="<?=$avatar?>" alt="..."></div>
  <div class="make-comment__content">
    <form action="/setComment" method="post" id="comment-form" enctype="multipart/form-data">
      <input type="hidden" name="postId" value="<?=$postId?>">
      <textarea id="js-make-comment" name="content" placeholder="Napisz komentarz..."></textarea>
      <div class="make-comment__wrap">
        <ul role="list">
          <li><img src="./img/emoji.png" alt="..."></li>
          <label class="make-comment__add-image">
            <input type="file" name="image" accept="image/*">
            <span><img src="./img/camera.png" alt="Add image"></span>
          </label>
          <li><img src="./img/gif.png" alt="..."></li>
        </ul>
        <button class="make-comment__submit" type="submit" name="commentSubmit" data-action="commentSubmit"></button>
      </div>
    </form>
    <div class="comment-error" id="comment-error"></div>
  </div>
</div>
<?php