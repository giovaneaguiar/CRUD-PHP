<?php

require_once 'app/Core/Core.php';

$template = file_get_contents('app/template/estrutura.html');

$core = new Core;
$core->start($_GET);

echo $template;