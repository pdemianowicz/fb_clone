<?php require 'partials/header.php'?>
<?php require 'partials/nav.php'?>


<div class="profile">
  <div class="profile__header">
    <div class="profile__cover" <?=$user['bg']?>>
      <?php if ($user['userId'] === $loginUser) {?>
        <a class="add-background-img" data-modal-id="update-bg"><img src="./img/rwe3.png" alt="...">Dodaj zdjęcie w tle</a>
        <div class="modal" id="update-bg" data-is-open="false">
          <form class="modal__wrap" action="/bg" method="post" enctype="multipart/form-data">
            <div class="modal__header">
              <h2 class="modal__title">Zaktualizuj zdjęcie w tle</h2>
              <button class="modal__close" type="button" data-close-modal><img src="./img/x.png" alt="close modal"></button>
            </div>
            <div class="modal__main">
              <label for="images" class="drop-container" id="dropcontainer">
                <span class="drop-title">Przciągnij plik tutaj</span>
                or
                <input id="images" type="file" name="image" accept="image/*" >
              </label>
              <button class="modal__btn modal__btn--actions" type="submit" name="delete_avatar">Usuń zdjęcie</button>
            </div>
            <div class="modal__footer">
              <button class="modal__btn" type="submit" name="submit">Opublikuj</button>
            </div>
          </form>
        </div>
      <?php }?>
    </div>
    <div class="profile__user">
      <div class="profile__avatar">
        <img src="<?=$user['avatar']?>" alt="...">
          <?php if ($user['userId'] === $loginUser) {?>
            <a class="add-profil-img" data-modal-id="update-avatar"><img src="./img/rwe3.png" alt="..."></a>
            <div class="modal" id="update-avatar" data-is-open="false">
              <form class="modal__wrap" action="/avatar" method="post" enctype="multipart/form-data">
                <div class="modal__header">
                  <h2 class="modal__title">Zaktualizuj zdjęcie profilowe</h2>
                  <button class="modal__close" type="button" data-close-modal><img src="./img/x.png" alt="close modal"></button>
                </div>
                <div class="modal__main">
                  <label class="modal__add-image modal__add-image--btn" aria-label="Zdjęcie" title="Dodaj zdjęcie">
                    <input type="file" id="imageInput" name="image" accept="image/*" >
                    <span>Dodaj zdjęcie</span>
                  </label>
                  <button class="modal__btn modal__btn--actions" type="submit" name="delete_avatar">Usuń zdjęcie</button>
                  <div class="imagePreview" id="imagePreview" style="margin: auto;"></div>
                </div>

                <div class="modal__footer">
                  <button class="modal__btn" type="submit" name="submit">Opublikuj</button>
                </div>
              </form>
            </div>
          <?php }?>
      </div>
      <div class="profile__name" ><?=$user['userName']?></div>
      <?php if ($user['userId'] === $loginUser) {?>
        <a class="profile__edit" data-modal-id="modal-profile-edit"><img src="./img/OR6SzrfoMFg.png" alt="...">Edytuj profil</a>
      <?php }?>
    </div>

    <span class="hr"></span>

    <ul role="list">
      <li class="active"><a href="#">Posty</a></li>
      <li><a href="#">Informacje</a></li>
      <li><a href="#">Znajomi</a></li>
      <li><a href="#">Zdjęcia</a></li>
      <li><a href="#">Filmy</a></li>
      <li><a href="#">Sport</a></li>
      <li><a href="#">Więcej</a></li>
    </ul>
  </div>
</div>

<div class="profile-wrapper">
  <div class="profile-main">
      <div class="profile-bio">
        <h2>Prezentacja</h2>
        <ul role="list">
          <li><img src="./img/jV4o8nAgIEh.png" alt="">Uczęszczał do: Nazwa szkoły</li>
          <li><img src="./img/VMZOiSIJIwn.png" alt="">Mieszka w: Białystok</li>
          <li><img src="./img/rodGQv9jZg5.png" alt="">Płeć: <?=$user['gender']?></li>
          <li><img src="./img/S0aTxIHuoYO.png" alt="">Zaręczony(a)</li>
          <li><img src="./img/8h5bbU4i43W.png" alt="">Urodziny: <?=$user['birthday']?></li>
          <li><img src="./img/mp_faH0qhrY.png" alt="">Data dołączenia: <?=$user['regDate']?></li>
          <li><img src="./img/LPnnw6HJjJT.png" alt="">Instagram: Loki22</li>
        </ul>
      </div>
      <div class="profile-picture">
      <h2>Zdjęcia</h2>
        <ul role="list">
          <li>Mieszka w: Białystok</li>
          <li>Data dołączenia: kwieceiń 2012</li>
          <li>Hobby: Bieganie i topienie się w rzece</li>
          <li>Mieszka w: Białystok</li>
        </ul>
      </div>
      <div class="profile-friends">
        <div class="profile-header">
          <a href="#"><h2>Znajomi</h2></a>
          <a href="#">Pokaż wszystkich znajomych</a>
        </div>
        <div class="profile-main">
          <div class="profile-main__item">
            <a href="#"><img src="./img/avatar.jpg" alt="avatar"></a>
            <a href="#">Damian Lokowski</a>
          </div>
          <div class="profile-main__item">
            <a href="#"><img src="./img/avatar.jpg" alt="avatar"></a>
            <a href="#">Rafal Jurkowski</a>
          </div>
          <div class="profile-main__item">
            <a href="#"><img src="./img/avatar.jpg" alt="avatar"></a>
            <a href="#">Natalia Bywalec</a>
          </div>
          <div class="profile-main__item">
            <a href="#"><img src="./img/avatar.jpg" alt="avatar"></a>
            <a href="#">Krystian Pawłowicz</a>
          </div>
          <div class="profile-main__item">
            <a href="#"><img src="./img/avatar.jpg" alt="avatar"></a>
            <a href="#">Monika Ostrówka</a>
          </div>
        </div>
      </div>
    </div>

    <div class="profile-feed">
      <?php require 'partials/post.php'?>
    </div>
  </div>

<div class="edit-profile modal" id="modal-profile-edit">
  <form action="includes/posts.inc.php" method="post">
    <div class="edit-profile__header">
      <h2>Edytuj profil</h2>
      <span class="edit-profile__x" ><img class="post_x" src="./img/x.png"  alt="x"></span>
    </div>
    <div class="edit-profile__main">
      <div class="edit-profile__avatar">
        <div>
          <h3>Zdjęcie profilowe</h3>
          <span data-modal="modal-update-avatar">Edytuj</span>
        </div>
        <img src="<?=$user['avatar']?>" alt="...">
      </div>
      <div class="edit-profile__bg">
        <div>
          <h3>Zdjęcie w tle</h3>
          <span>Edytuj</span>
        </div>
      </div>
      <div class="edit-profile__bio">
        <div>
          <h3>Biogram</h3>
          <span>Edytuj</span>
        </div>
        Napisz coś o sobie...
      </div>
      <div class="edit-profile__city">
        <div>
            <h3>Prezentacja</h3>
          </div>
          <ul role="list">
            <li>Mieszka w Białystok</li>
            <li>Data dołączenia: 29 kwietnia 2008</li>
            <li>Status związku: <input type="text" name="relationship" value="Wolny/a"></li>
          </ul>
        </div>
      </div>
      <div class="edit-profile__relationship"></div>
    </div>
  </form>
</div>

<?php require 'partials/footer.php'?>