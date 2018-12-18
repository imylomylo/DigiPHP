<?php
$objects=glob(__DIR__.'/*.php');
foreach ($objects as $file) require_once($file);
