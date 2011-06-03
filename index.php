<?php

/*
 * 1, 2, 3, 4, 5, 6, 7, 8, 9
 * this project for abbas chakoshy
 * 
 */

require 'Application.php';
require 'BaseActions.php';

define('APPLICATION', 'frontend');

$app = new Application();
$app->init();
$app->start();