<?php 
require 'config.php';
require 'inc/db.php';
Db::connect();
require 'temp/header.php';

require 'temp/dashboard.php';

require 'temp/footer.php';
Db::close();