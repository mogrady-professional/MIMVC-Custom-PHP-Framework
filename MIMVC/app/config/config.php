<?php

// DB Parameters
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'mimvc');






// App Root Parameters
//echo dirname(dirname(__FILE__)); // MIMVC\app
define('APPROOT', dirname(dirname(__FILE__))); // Access App Root from any file
// URL Root
define('URLROOT', 'http://localhost/2022/MIMVC-Custom-PHP-Framework/MIMVC'); // Access URL Root from any file
// Site Name
define('SITENAME', 'MIMVC Framework'); // Access Site Name from any file
// App Version
define('APPVERSION', '1.0.0'); // Access App Version from any file
?>