<?php require base_path('views/partials/header.php')?>

<div class="form-register">
  <div class="form-register__heading">
    <h2>Zarejestruj się</h2>
    <p>To szybkie i proste.</p>
  </div>

  <form action="/register" method="post" novalidate>

    <?php if (isset($errors)): ?>
        <?php foreach ($errors as $error): ?>
            <small class="error"><?=$error?></small><br>
        <?php endforeach;?>
    <?php endif;?>

    <div class="fullname">
      <input type="text" name="firstName" placeholder="Imię" autofocus>
      <input type="text" name="lastName" placeholder="Nazwisko">
    </div>
    <input type="email" name="email" placeholder="Numer telefonu komórkowego lub e-mail">
    <input type="password" name="pwd" placeholder="Nowe hasło">
    <input type="password" name="pwdrepeat" placeholder="Powtórz hasło">

    <div class="birthday">
      <small>Data urodzenia</small>
      <input type="tel" name="day" placeholder="Dzień" maxlength="2">
      <select title="Miesiąc" name="month">
        <option value="1">Styczeń</option>
        <option value="2">Luty</option>
        <option value="3">Marzec</option>
        <option value="4">Kwiecień</option>
        <option value="5">Maj</option>
        <option value="6">Czerwiec</option>
        <option value="7">Lipiec</option>
        <option value="8">Sierpień</option>
        <option value="9">Wrzesień</option>
        <option value="10">Październik</option>
        <option value="11">Listopad</option>
        <option value="12">Grudzień</option>
      </select>
      <input type="tel" name="year" placeholder="Rok" minlength="4" maxlength="4">
    </div>

    <div class="gender" data-type="radio">
      <small>Płeć</small>
      <label>
        Kobieta
        <input type="radio" name="gender" value="Kobieta" checked>
      </label>
      <label>
        Mężczyzna
        <input type="radio" name="gender" value="Mężczyzna">
      </label>
    </div>

    <p>Osoby korzystające z naszej usługi mogły przesłać Twoje dane kontaktowe do Facebooka. <a href="#">Dowiedz się więcej</a>.</p>
    <p>Klikając przycisk Zarejestruj się, akceptujesz nasz <a href="#">Regulamin</a>. <a href="#">Zasady ochrony
      prywatności</a> informują, w jaki sposób gromadzimy, użytkujemy i udostępniamy
      dane użytkowników, a <a href="#">Zasady dotyczące plików cookie</a> informują jak korzystamy
      z plików cookie i podobnych technologii. Możesz otrzymywać powiadomienia SMS
      z Facebooka, z których możesz zrezygnować w dowolnej chwili.</p>
    <button type="submit" name="submit">Zarejestruj się</button>

  </form>
</div>

<?php require base_path('views/partials/footer.php')?>