<?php
$branch = $argv[1] ?? 'main';
#$message = $argv[1] ?? '';

#$comand = "git add . && git commit && git push origin ". $branch;  

shell_exec("git add .");
echo 'Escribe el mensaje:'.PHP_EOL;
$message = readline() ?? 'Pequeños cambios';

shell_exec("git commit -m \"". $message."\"");
shell_exec("git push origin ". $branch);

// shell_exec('cd public && php -S localhost:8000 && cd .. &');

