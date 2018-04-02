<?php
require_once('control/list.php');
$generationSingleton = ListSingleton::deleteGeneration($_GET['id'],$_GET['fid']);
header('Location: index.php')
?>