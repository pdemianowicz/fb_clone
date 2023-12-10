<?php
// Comment
?>

<li class="comment" data-comment-id="<?=$comment['commentId']?>">
  <a class="comment__avatar" href="/profile?id=<?=$comment['userId']?>">
    <img src="<?=$comment['avatar']?>" alt="...">
  </a>
  <div class="comment__wrapper">
    <div class="comment__content">
      <a class="comment__autor" href="/profile?id=<?=$comment['userId']?>"><?=$comment['userName']?></a>
      <?=$comment['content']?>
    </div>
    <div class="comment__actions">
      <button class="" type="button" data-action="like-com" data-liked="<??>">Lubię to!</button>
      <button class="" type="button" data-action="reply">Odpowiedz</button>
      <span class="tooltip" data-tooltip="<?=date('j F Y \a\t H:i', strtotime($comment['createdAt']))?>"><?=timeAgo($comment['createdAt'])?></span>
      <?php if ($comment['userId'] === $loginUser) {?>
      <button class="" type="button" data-action="delete">Usuń</button>
      <?php }?>
    </div>
    <div class="comment__likes"><?getLikes($pdo, $comment['commentId'], "comment")?></div>
  </div>
</li>
