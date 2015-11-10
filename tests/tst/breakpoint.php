<?php

use axy\evil\Evil;

require __DIR__.'/../../index.php';

echo 'start'.PHP_EOL;

switch (count($_SERVER['argv'])) {
    case 1:
        Evil::breakpoint('Without line');
        break;
    case 2:
        Evil::breakpoint('With line', true);
        break;
    default:
        Evil::breakpoint('With line + file', true, true, 5);
}

echo 'stop'.PHP_EOL;
