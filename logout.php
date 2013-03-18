<?php
require_once("header.php");
session_destroy();
header("Refresh: 0; url=index.php");
