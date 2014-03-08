<?php

// db settings
define("DB_NAME", getenv("C4SA_MYSQL_DB"));
define("DB_USER", getenv("C4SA_MYSQL_USER"));
define("DB_PASSWORD", getenv("C4SA_MYSQL_PASSWORD"));
define("DB_HOST", getenv("C4SA_MYSQL_HOST"));

// other settins
define("VIEW_DIR", __DIR__."/../view/");
