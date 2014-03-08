<?php

require __DIR__."/../vendor/autoload.php";
require __DIR__."/../config/config.php";

use RedBean_Facade as R;

$app = new \Slim\Slim(array(
    "templates.path" => VIEW_DIR,
));

R::setup(sprintf("mysql:host=%s;dbname=%s;charset=utf8", DB_HOST, DB_NAME), DB_USER, DB_PASSWORD);

$app->get('/', function () use ($app) {
    $board = R::findAll("board");

    $app->render("index_view.php", array("board" => $board));
});

$app->post("/new", function () use ($app) {
    $text = $app->request->post("text");
    $newEntry = R::dispense("board");
    $newEntry->text = $text;
    $newEntry->datetime = new \DateTime();

    R::store($newEntry);
    $app->redirect("/");
});

$app->run();
