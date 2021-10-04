<?php
$comand = 'mysql -u root -p -h localhost < database/migrations/databases.sql';

shell_exec($comand);

shell_exec('cd public && php -S localhost:8000 && cd .. &');

// shell_exec(file_get_contents(__DIR__."/database/migrations/databases.sql"));
