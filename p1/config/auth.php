<?php
if ($auth->isLoggedIn()) {
    // Uuario válido
}
else {
    // Usuario no válido
    // Redirecciona al login
    header("Location: login.php");
    exit;
}

