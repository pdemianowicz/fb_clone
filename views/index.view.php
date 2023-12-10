<?php require 'partials/header.php'?>
<?php require 'partials/nav.php'?>

<main class="flex">
  <div class="left">
    <div class="sticky_wrapper">
      <ul class="left_nav" role="list">
        <li><a  href="/profile?id=<?=$userId?>"><img src="<?=$avatar?>" alt="..."><?=$userName?></a></li>
        <li><a href="#"><img src="./img/friend.png" alt="friends">Znajomi</a></li>
        <li><a href="#"><img src="./img/eECk3ceTaHJ.png" alt="...">Aktualności</a></li>
        <li><a href="#"><img src="./img/grups.png" alt="...">Grupy</a></li>
        <li><a href="#"><img src="./img/market.png" alt="...">Marketplace</a></li>
        <li><a href="#"><img src="./img/watch.png" alt="...">Watch</a></li>
        <li><a href="#"><img src="./img/time.png" alt="...">Wspomnienia</a></li>
        <li><a href="#"><img src="./img/saved.png" alt="...">Zapisane</a></li>

      </ul>
      <div class="navigation_show-more">Zobacz więcej</div>
      <span class="hr"></span>
      <footer class="footer">
        <ul class="footer-links" role="list">
          <li><a href="#">Prywatność</a></li>
          <li><a href="#">Regulamin</a></li>
          <li><a href="#">Reklama</a></li>
          <li><a href="#">Opcje reklam</a></li>
          <li><a href="#">Pliki cookie</a></li>
          <li>Więcej</li>
          <li>Meta © 2023</li>
        </ul>
      </footer>
    </div>
  </div>
  <div class="main">

    <div class="relations">
      <ul class="relations__nav" role="list">
        <li><a>
          <svg fill="currentColor" viewBox="0 0 20 20" width="1em" height="1em" class="x1lliihq x1k90msu x2h7rmj x1qfuztq x1qq9wsj x1qx5ct2 xw4jnvo"><g fill-rule="evenodd" transform="translate(-446 -350)"><path d="M457 368.832a.5.5 0 0 0 .883.323l1.12-1.332a.876.876 0 0 1 .679-.323h3.522a2.793 2.793 0 0 0 2.796-2.784v-10.931a2.793 2.793 0 0 0-2.796-2.785h-3.454a2.75 2.75 0 0 0-2.75 2.75v15.082zm-1.5 0a.5.5 0 0 1-.883.323l-1.12-1.332a.876.876 0 0 0-.679-.323h-3.522a2.793 2.793 0 0 1-2.796-2.784v-10.931a2.793 2.793 0 0 1 2.796-2.785h3.454a2.75 2.75 0 0 1 2.75 2.75v15.082z"></path></g></svg>
          Relacje</a></li>
        <li><a>
          <svg fill="currentColor" viewBox="0 0 20 20" width="1em" height="1em" class="x1lliihq x1k90msu x2h7rmj x1qfuztq xcza8v6 x1qx5ct2 xw4jnvo"><g fill-rule="evenodd" transform="translate(-446 -350)"><path d="M454.59 355h4.18l-2.4-4h-3.28c-.22 0-.423.008-.624.017L454.59 355zm6.514 0h3.695c-.226-1.031-.65-1.79-1.326-2.489-1.061-1.025-2.248-1.488-4.392-1.511h-.379l2.401 4zm-8.78 0-1.942-3.64c-.73.247-1.315.63-1.868 1.165-.668.69-1.09 1.445-1.315 2.475h5.125zm7.043 7.989a.711.711 0 0 1-.22.202l-4.573 2.671-.05.027a.713.713 0 0 1-1.024-.643v-5.343l.002-.056a.714.714 0 0 1 1.072-.56l4.572 2.67.054.036a.714.714 0 0 1 .167.996zm-12.366-5.99V363.083l.001.03v.112l.005.048h.001c.05 2.02.513 3.176 1.506 4.203 1.102 1.066 2.324 1.525 4.577 1.525h5.99c2.144-.023 3.331-.486 4.392-1.511 1.005-1.04 1.467-2.198 1.517-4.217h.003c.003-.1.005-.1.006-.204l.001-.156V357h-18z"></path></g></svg>
          Rolki</a></li>
      </ul>
      <ul class="relations__content" role="list">
        <li><a class="relations__add">
          <img src="./img/avatar.jpg" alt="avatar">
          <svg fill="currentColor" viewBox="0 0 20 20" width="1em" height="1em" class="x1lliihq x1k90msu x2h7rmj x1qfuztq x14ctfv x1qx5ct2 xw4jnvo"><g fill-rule="evenodd" transform="translate(-446 -350)"><g fill-rule="nonzero"><path d="M95 201.5h13a1 1 0 1 0 0-2H95a1 1 0 1 0 0 2z" transform="translate(354.5 159.5)"></path><path d="M102.5 207v-13a1 1 0 1 0-2 0v13a1 1 0 1 0 2 0z" transform="translate(354.5 159.5)"></path></g></g></svg>
          <span>Utwórz relację</span>
        </a></li>
        <li><a>
          <img src="./img/mcdonalds.jpg" style="object-fit:cover;" alt="avatar">
          <span>McDonald's</span>
        </a></li>
        <!-- <li><a>Restauracja</a></li> -->
        <!-- <li><a>Mikołaj Kopernik</a></li>
        <li><a>Ola Michałowska</a></li> -->
      </ul>
    </div>

    <div class="create-post">
      <a class="create-post__avatar" href="/profile?id=<?=$userId?>"><img src="<?=$avatar?>" alt="Avatar <?=$userName?>"></a>
      <span class="create-post__content" data-modal-id="test">O czym myślisz, <?=$firstName?>?</span>
      <span class="hr"></span>
      <ul class="create-post__actions" role="list">
        <li><img src="./img/c0dWho49-X3.png" alt="...">Transmisja wideo na żywo</li>
        <li><img src="./img/Ivw7nhRtXyo.png" alt="...">Zdjęcie/film</li>
        <li><img src="./img/Y4mYLVOhTwq.png" alt="...">Nastrój/aktywność</li>
      </ul>
    </div>

    <div class="modal" id="test" data-is-open="false">
      <form class="modal__wrap" action="/setPost" method="post" enctype="multipart/form-data">
        <div class="modal__header">
          <h2 class="modal__title">Utwórz post</h2>
          <button class="modal__close" type="button" data-close-modal><img src="./img/x.png" alt="close modal"></button>
        </div>
        <div class="modal__main">
          <div class="modal__autor">
            <img src="<?=$avatar;?>" alt="...">
            <?=$userName;?>
          </div>
          <textarea name="content" placeholder="O czym myślisz, <?=$firstName?>?"></textarea>
          <div id="imagePreview" style="margin: auto;"></div>
          <div class="modal__actions">
            <span>Dodaj do posta</span>
            <label class="modal__add-image" aria-label="Zdjęcie/film" title="Dodaj zdjęcie/film">
              <input type="file" name="image" id="imageInput" accept="image/*">
              <span><img src="./img/Ivw7nhRtXyo.png" alt="..."></span>
            </label>
          </div>

        </div>
        <div class="modal__footer">
          <button class="modal__btn" type="submit" name="submit">Opublikuj</button>
        </div>
      </form>
    </div>

    <?php require 'partials/post.php'?>

  </div>
  <div class="right">
    <div class="sticky_wrapper">
      <div class="contacts">
        <div class="contacts__header">
          <span class="contacts__title">Kontakty</span>
          <div class="contacts__settings">
            <img src="./img/....png" alt="...">
          </div>
        </div>
        <ul class="contacts__items" role="list">
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Mikołaj Kopernik</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Ola Michałowska</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Bartłomiej Zaręba</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Anna Kowalska</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Jan Nowak</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Alicja Wiśniewska</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Marcin Szymański</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Karolina Nowacka</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Piotr Adamczyk</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Magdalena Woźniak</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Marta Lewandowska</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Krzysztof Jankowski</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Mikołaj Kopernik</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Ola Michałowska</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Bartłomiej Zaręba</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Anna Kowalska</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Jan Nowak</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Alicja Wiśniewska</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Marcin Szymański</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Karolina Nowacka</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Piotr Adamczyk</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Magdalena Woźniak</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Marta Lewandowska</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Krzysztof Jankowski</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Mikołaj Kopernik</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Ola Michałowska</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Bartłomiej Zaręba</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Anna Kowalska</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Jan Nowak</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Alicja Wiśniewska</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Marcin Szymański</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Karolina Nowacka</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Piotr Adamczyk</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Magdalena Woźniak</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Marta Lewandowska</a></li>
          <li class="contacts__item"><a href="#"><img src="./img/avatar.jpg" alt="avatar">Krzysztof Jankowski</a></li>
        </ul>
      </div>
    </div>
  </div>
</main>

<?php require 'partials/footer.php'?>