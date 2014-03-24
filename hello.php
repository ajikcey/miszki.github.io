<?php
if ($argc != 2) {
    echo "Использование: php hello.php [name].\n";
    exit(1);
}
$name = $argv[1];
echo "Привет, $name\n";
