<?php

if ($_SERVER['DOCUMENT_ROOT']) {
  $base = dirname($_SERVER['DOCUMENT_ROOT']);
} else {
  $base = dirname(getcwd());
}

define('APP_BASE',$base);

include(APP_BASE . '/src/config.inc');


