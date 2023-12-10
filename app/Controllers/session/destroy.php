<?php

session_destroy();
unset($_SESSION['user']['id']);

redirect('/login');
