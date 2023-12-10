<?php
require '../app/Validator.php';
require_once '../app/Database.php';
require_once '../app/Models/User.php';

$database = new Database($config);
$userModel = new User($database);

$firstName = trim($_POST['firstName']);
$lastName = trim($_POST['lastName']);
$email = trim($_POST['email']);
$pwd = trim($_POST['pwd']);
$pwdRepeat = trim($_POST['pwdrepeat']);
$gender = trim($_POST['gender']);
$day = intval(trim($_POST['day']));
$month = intval(trim($_POST['month']));
$year = intval(trim($_POST['year']));
$birthday = "$year-$month-$day";
$bg = '';

// dd($_POST);

//Sanitize POST data
// $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); // stara funkcja
// $_POST = filter_var($_POST, FILTER_SANITIZE_STRING);

// $errors = [];
// foreach ($data as $key => $value) {
//     if (empty($value)) {
//         $errors[$key] = 'Pole ' . $key . ' nie może być puste!';
//     }
// }

if (empty($firstName) || empty($lastName) || empty($email) || empty($pwd) || empty($pwdRepeat) ||
    empty($gender) || empty($day) || empty($month) || empty($year)) {
    $errors['fields'] = "Pola nie mogą być puste!";
}

if (!preg_match("/^[a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ]*$/u", $firstName) || !preg_match("/^[a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ]*$/u", $lastName)) {
    $errors['name'] = "Możesz użyć tylko małych i wielkich liter.";
}

if (!Validator::email($email)) {
    $errors['email'] = "Adres e-mail jest niepoprawny.";
}

if (!Validator::string($pwd, 7, 255)) {
    $errors['pwd'] = 'Hasło musi mieć przynajmniej 7 znaków, 1 wielką literę i 1 znak specjalny.';
} else if ($pwd !== $pwdRepeat) {
    $errors['pwd'] = 'Hasła nie sią takie same!';
}

if (!checkdate($month, $day, $year)) {
    $errors['birthdate'] = 'Nieprawidłowa data urodzenia!';

} else {
    $dateOfBirth = new DateTime($birthday);
    $today = new DateTime();
    $age = $today->diff($dateOfBirth)->y;

    if ($age < 18) {
        $errors['birthdate'] = 'Musisz mieć co najmniej 18 lat, aby się zarejestrować.';
    }
}

if ($userModel->checkUserExists($email)) {
    $errors['user'] = "Istnieje już użytkownik o podanym adresie email!";
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors,
    ]);
}

$data = [
    'firstName' => $firstName,
    'lastName' => $lastName,
    'email' => $email,
    'pwd' => $pwd,
    'gender' => $gender,
    'birthday' => $birthday,
];

$registrationResult = $userModel->register($data);

if ($registrationResult) {
    $_SESSION['success'] = 'Rejestracja zakończona sukcesem. Możesz teraz się zalogować.';
    redirect('/login');
} else {
    return view('registration/create.view.php', [
        'errors' => $errors,
    ]);
}
