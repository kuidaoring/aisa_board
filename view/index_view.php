<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>aisa board</title>
</head>
<body>
<h1>aisa board</h1>
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
</li>
<?php endforeach ?>
</ul>
<?php endif ?>
</body>
</html>

