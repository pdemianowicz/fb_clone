<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }

    return true;
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}

function old($key, $default = '')
{
    return Core\Session::get('old')[$key] ?? $default;
}

function timeAgo($datetime, $full = false)
{
    date_default_timezone_set('Europe/Warsaw');

    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $string = array(
        'y' => array('rok', 'lata', 'lat'),
        'm' => array('miesiąc', 'miesiące', 'miesięcy'),
        'w' => array('tydzień', 'tygodnie', 'tygodni'),
        'd' => array('dzień', 'dni', 'dni'),
        'h' => array('godzina', 'godziny', 'godzin'),
        'i' => array('minuta', 'minuty', 'minut'),
        's' => array('sekunda', 'sekundy', 'sekund'),
    );

    foreach ($string as $k => &$v) {
        if (property_exists($diff, $k) && $diff->$k) {
            $int = $diff->$k;
            $indeks = ($int == 1) ? 0 : (($int % 10 >= 2 && $int % 10 <= 4 && ($int % 100 < 10 || $int % 100 >= 20)) ? 1 : 2);
            $v = $int . ' ' . $v[$indeks];
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) {
        $string = array_slice($string, 0, 1);
    }

    return $string ? implode(', ', $string) . ' temu' : 'teraz';
}
