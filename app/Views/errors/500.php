<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>oh, we have a problem!</h1>
    <p><?=htmlspecialchars($errorMessage);?></p>
    <?php if($isDebug): ?>
        <h2>stack trace:</h2>
        <pre><?=htmlspecialchars($trace); ?></pre>
        <?php endif; ?>

        <a href="/">Return to the home Page</a>
</body>
</html>