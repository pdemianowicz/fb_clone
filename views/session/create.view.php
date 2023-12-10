<?php require base_path('views/partials/header.php')?>

<div class="login">

<?php
if (isset($_SESSION['success'])) {
    echo '<p style="color: green;">' . $_SESSION['success'] . '</p>';
    unset($_SESSION['success']); //
}
?>

    <div class="login-wrap">
      <h1>facebook</h1>
      <p>Facebook pomaga kontaktować się z innymi osobami oraz udostępniać im różne informacje i materiały.</p>
    </div>
    <div class="form-wrap">
      <form action="/session" method="POST">

        <input type="text" name="email" placeholder="Adres e-mail lub numer telefonu" autofocus>
        <?php if (isset($errors['email'])): ?>
          <small class="error"><?=$errors['email']?></small>
        <?php endif;?>

        <input type="password" name="pwd" placeholder="Hasło">
        <?php if (isset($errors['password'])): ?>
          <small class="error"><?=$errors['password']?></small>
        <?php endif;?>

        <button type="submit" name="submit">Zaloguj się</button>
        <a class="recover-pwd" href="recover.php">Nie pamiętasz hasła?</a>
        <span class="hr"></span>
        <a class="sign-up" href="/register">Utwórz nowe konto</a>

      </form>
      <p><b><a>Utwórz stronę</a></b> dla gwiazdy, marki lub firmy.</p>
    </div>
  </div>

  <footer class="footer">
    <div class="container">
      <ul class="language-list" role="list">
        <li><a href="#">Polski</a></li>
        <li><a href="#">English (US)</a></li>
        <li><a href="#">ślōnskŏ gŏdka</a></li>
        <li><a href="#">Русский</a></li>
        <li><a href="#">Deutsch</a></li>
        <li><a href="#">Français (France)</a></li>
        <li><a href="#">Italiano</a></li>
        <li><a href="#">Українська</a></li>
        <li><a href="#">Español (España)</a></li>
        <li><a href="#">Português (Brasil)</a></li>
        <li><a href="#">العربية</a></li>
      </ul>
      <span class="hr"></span>
      <ul class="footer-links" role="list">
        <li><a href="#">Zarejestruj się</a></li>
        <li><a href="#">Zaloguj się</a></li>
        <li><a href="#">Messenger</a></li>
        <li><a href="#">Facebook Lite</a></li>
        <li><a href="#">Watch</a></li>
        <li><a href="#">Miejsca</a></li>
        <li><a href="#">Gry</a></li>
        <li><a href="#">Marketplace</a></li>
        <li><a href="#">Meta Pay</a></li>
        <li><a href="#">Sklep Meta</a></li>
        <li><a href="#">Meta Quest</a></li>
        <li><a href="#">Instagram</a></li>
        <li><a href="#">Zbiórki pieniędzy</a></li>
        <li><a href="#">Usługi</a></li>
        <li><a href="#">Centrum informacji o głosowaniu</a></li>
        <li><a href="#">Zasady ochrony prywatności</a></li>
        <li><a href="#">Centrum ochrony prywatności</a></li>
        <li><a href="#">Grupy</a></li>
        <li><a href="#">Informacje</a></li>
        <li><a href="#">Utwórz reklamę</a></li>
        <li><a href="#">Utwórz stronę</a></li>
        <li><a href="#">Twórcy aplikacji</a></li>
        <li><a href="#">Praca</a></li>
        <li><a href="#">Pliki cookie</a></li>
        <li><a href="#">Opcje wyświetlania reklam</a></li>
        <li><a href="#">Regulamin</a></li>
        <li><a href="#">Pomoc</a></li>
        <li><a href="#">Przesyłanie listy kontaktów i osób niebędących użytkownikami</a></li>
      </ul>
      <div class="copyright">Meta © 2023</div>
    </div>
  </footer>

<?php require base_path('views/partials/footer.php')?>