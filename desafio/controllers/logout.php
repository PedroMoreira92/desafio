<?php

require '../models/Auth.php';

$autenticar = new Auth(null);

$autenticar->logout();

header('Location:../index.php?pagina=login');
exit();