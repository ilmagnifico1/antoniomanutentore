<?php
$scriptDir = str_replace("\\", "/", dirname($_SERVER["SCRIPT_NAME"] ?? ""));
$basePath = $scriptDir === "/" ? "" : rtrim($scriptDir, "/");

include "view/top.php";
include "view/header.php";
include "view/section.php";
include "view/widget.php";
include "view/footer.php";
