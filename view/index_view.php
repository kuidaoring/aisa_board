<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>aisa board</title>
</head>
<body>
<h1>aisa board</h1>
<?php if ($flash["message"]): ?>
<p><?php echo htmlspecialchars($flash["message"]); ?></p>
<?php endif; ?>
<form action="new" method="POST">
<input type="text" name="text">
<input type="submit" value="submit">
</form>
<hr>
<?php if (count($board) < 1): ?>
<p>no data</p>
<?php else: ?>
<ul>
<?php foreach ($board as $entry): ?>
<li>
<p><?php echo htmlspecialchars($entry["text"]) ?></p>
<p><?php echo htmlspecialchars($entry["datetime"]) ?></p>
<form action="delete/<?php echo htmlspecialchars($entry["id"]) ?>" method="POST">
<input type="submit" value="delete">
</form>
</li>
<?php endforeach ?>
</ul>
<?php endif ?>
</body>
</html>

