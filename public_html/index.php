<?php

require __DIR__."/../vendor/autoload.php";
require __DIR__."/../config/config.php";

use RedBean_Facade as R;

$app = new \Slim\Slim(array(
    "templates.path" => VIEW_DIR,
));

$app->add(new \Slim\Middleware\SessionCookie);

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
    $app->flash("message", "add entry!");
    $app->redirect("/");
});

$app->post("/delete/:id", function ($id) use ($app) {
    $entry = R::load("board", $id);
    if ($entry) {
        R::trash($entry);
        $app->flash("message", "delete entry!");
        $app->redirect("/");
    }
});

$app->run();
