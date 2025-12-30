<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my blog</title>
    <link rel="stylesheet" href="/style.css" />
</head>
<body>
    <h1>my blog</h1>
    <nav>
        <a href="/">Home</a>
        <a href="/posts">Posts</a>
    </nav>
    <main>
        <?=$content ?>
    </main>
    <footer>
        <p> &copy; <?= date('Y') ?> my blog </p>
    </footer>
</body>
</html>