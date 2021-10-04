<?php
$branch = $argv[1] ?? 'main';

shell_exec("git add .");
echo 'Escribe el mensaje:'.PHP_EOL;
$message = function()
{
    $messageFa = readline();
    return $messageFa !== '' ? $messageFa : die('Commit cancelado');
};
shell_exec("git commit -m \"". $message()."\"");
shell_exec("git push origin ". $branch);


