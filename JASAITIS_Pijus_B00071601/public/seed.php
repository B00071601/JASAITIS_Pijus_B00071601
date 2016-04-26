<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Itb\User;

define('DB_HOST','localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'gggdb');

$matt = new User();
$matt->setUsername('matt');
$matt->setPassword('smith');
$matt->setRole(User::ROLE_USER);
$matt->setProjectId('1');
$matt->setSupervisorId('1');

$pijus = new User();
$pijus->setUsername('pijus');
$pijus->setPassword('qwerty');
$pijus->setRole(User::ROLE_USER);
$pijus->setProjectId('1');
$pijus->setSupervisorId('1');

$admin = new User();
$admin->setUsername('admin');
$admin->setPassword('admin');
$admin->setRole(User::ROLE_ADMIN);
$admin->setProjectId('0');
$admin->setSupervisorId('0');
$admin->setImage('http://www.dnnhero.com/Portals/0/images/thumbs/admin-account-dnn7-1.png');

User::insert($matt);
User::insert($pijus);
User::insert($admin);

$users = User::getAll();

var_dump($users);