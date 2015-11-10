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
    case 3:
        Evil::breakpoint('With line + file', true, true, 5);
        break;
    default:
        Evil::breakpoint([1, 2, 3], true);
}

echo 'stop'.PHP_EOL;
