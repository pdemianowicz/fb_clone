<?php

if (count($posts) > 0) {
    foreach ($posts as $post) {

        $userId = $post['userId'];
        $date = $post['date'];
        $postId = $post['postId'];
        $type = 'post';
        $avatar = "./uploads/" . $post['avatar'];

        $loginUser = $_SESSION['user']['id'];
        $userName = $post['firstName'] . " " . $post['lastName'];

        $postImage = $post['image'] ? '<img src="./uploads/' . $post["image"] . '" alt="Post Image" loading="lazy">' : '';

        ?>

<div class="post" data-post-id=<?=$postId?>>
  <div class="post-header">
    <a class="post-header__avatar" href="/profile?id=<?=$userId?>"><img src="<?=$avatar?>" alt="Avatar <?=$userName?>"></a>
    <a class="post-header__autor"  href="/profile?id=<?=$userId?>"><?=$userName?></a>
    <div class="post-header__publish-date">
      <span class="tooltip" data-tooltip="<?=date('j F Y \a\t H:i', strtotime($date));?>"><?=timeAgo($date)?></span>
      <svg fill="currentColor" viewBox="0 0 16 16" width="1em" height="1em" title="Grono odbiorców: Publiczne"><title>Grono odbiorców: Publiczne</title><g fill-rule="evenodd" transform="translate(-448 -544)"><g><path d="M109.5 408.5c0 3.23-2.04 5.983-4.903 7.036l.07-.036c1.167-1 1.814-2.967 2-3.834.214-1 .303-1.3-.5-1.96-.31-.253-.677-.196-1.04-.476-.246-.19-.356-.59-.606-.73-.594-.337-1.107.11-1.954.223a2.666 2.666 0 0 1-1.15-.123c-.007 0-.007 0-.013-.004l-.083-.03c-.164-.082-.077-.206.006-.36h-.006c.086-.17.086-.376-.05-.529-.19-.214-.54-.214-.804-.224-.106-.003-.21 0-.313.004l-.003-.004c-.04 0-.084.004-.124.004h-.037c-.323.007-.666-.034-.893-.314-.263-.353-.29-.733.097-1.09.28-.26.863-.8 1.807-.22.603.37 1.166.667 1.666.5.33-.11.48-.303.094-.87a1.128 1.128 0 0 1-.214-.73c.067-.776.687-.84 1.164-1.2.466-.356.68-.943.546-1.457-.106-.413-.51-.873-1.28-1.01a7.49 7.49 0 0 1 6.524 7.434" transform="translate(354 143.5)"></path><path d="M104.107 415.696A7.498 7.498 0 0 1 94.5 408.5a7.48 7.48 0 0 1 3.407-6.283 5.474 5.474 0 0 0-1.653 2.334c-.753 2.217-.217 4.075 2.29 4.075.833 0 1.4.561 1.333 2.375-.013.403.52 1.78 2.45 1.89.7.04 1.184 1.053 1.33 1.74.06.29.127.65.257.97a.174.174 0 0 0 .193.096" transform="translate(354 143.5)"></path><path fill-rule="nonzero" d="M110 408.5a8 8 0 1 1-16 0 8 8 0 0 1 16 0zm-1 0a7 7 0 1 0-14 0 7 7 0 0 0 14 0z" transform="translate(354 143.5)"></path></g></g></svg>
    </div>
    <div class="post-header__edit">
      <img class="" src="./img/....png" alt="...">
      <?php if ($userId === $loginUser) {?>
        <form method="POST" action="/deletePost?id=<?=$postId?>">
          <input type="hidden" name="_method" value="DELETE"/>
          <button title="Delete post!"><img class="post_x" src="./img/x.png" alt="x"></button>
        </form>
      <?php }?>
      <!-- <div class="postAction-modal" id="postAction-modal" data-is-open="false">
        <form class="postAction-modal__wrap" action="/postAction" method="post">
          <button type="submit" name="action" value="report">Zgłoś post</button>
          <button type="submit" name="action" value="edit">Edytuj post</button>
          <button type="submit" name="action" value="delete">Usuń post na zawsze</button>
        </form>
      </div> -->
    </div>
  </div>
  <div class="post-body">
    <div class="post-body__content"><div><?=$post["content"]?></div><?=$postImage?></div>
    <div class="post-body__likes"><?=$post['likes']?></div>
    <div class="post-body__comments" data-action="comment"><?=$post['commentsCount']?></div>
  </div>
  <span class="hr"></span>
  <div class="post-footer">
    <button class="post-footer__item" type="button" data-action="like" data-liked="<?=$post['userLiked']?>">Lubię to!</button>
    <button class="post-footer__item" type="submit" data-action="comment">Komentarz</button>
    <button class="post-footer__item" type="button" data-action="share">Udostępnij</button>
  </div>
  <ul class="comments" role="list">



  </ul>
</div>
<?php
}
} else {
    echo "Błąd lub brak postów do wyświetlenia!";
}
