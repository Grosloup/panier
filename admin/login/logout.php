<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 05/03/14
 * Time: 16:02
 */
include_once "../php/bases.php";

$session->delete("user");

header("Location: /");
die();
