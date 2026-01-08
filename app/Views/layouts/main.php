<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my blog</title>
    <link rel="stylesheet" href="/style-main.css" />
</head>
<body>
    <h1>my blog</h1>
    <nav>
        <a href="/">Home</a>
        <a href="/../post">Post</a>
    </nav>
    <main>
        <section>
            <p><?=$content ?></p>
        </section>
    </main>
    <footer>
        <p> &copy; <?= date('Y') ?> my blog </p>
    </footer>
</body>
</html>