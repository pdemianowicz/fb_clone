<div class="account dropdown" id="account" data-is-open="false">
  <div class="dropdown__body"></div>
  <div class="profile">
    <a  href="/profile?id=<?=$userId?>"><img src="<?=$avatar?>" alt="..."><?=$userName?></a>
  </div>
  <ul role="list">
    <li><a href="#"><span><img src="./img/rge435.png" alt="..."></span>Ustawienia i prywatności</a></li>
    <li><a href="#"><span><img src="./img/w32452345.png" alt="..."></span>Pomoc i wsparcie</a></li>
    <li><a href="#"><span><img src="./img/erfaw34.png" alt="..."></span>Wyświetlanie i ułatwienia dostępu</a></li>
    <li><a href="#"><span><img src="./img/aw4234.png" alt="..."></span>Przekaż opinię</a></li>
    <li>
      <form method="POST" action="/session">
        <input type="hidden" name="_method" value="DELETE"/>

        <button><span><img src="./img/wr5w4r.png" alt="..."></span>Wyloguj się</button>
      </form>
    </li>


  </ul>
  <ul class="footer-links" role="list">
    <li><a href="#">Prywatność</a></li>
    <li><a href="#">Regulamin</a></li>
    <li><a href="#">Reklama</a></li>
    <li><a href="#">Opcje reklam</a></li>
    <li><a href="#">Pliki cookie</a></li>
    <li>Więcej</li>
    <li>Meta © 2023</li>
  </ul>
</div>