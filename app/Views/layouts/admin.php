<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Panel</title>
    <link rel="stylesheet" href="/style/style-form.css" />
    <link rel="stylesheet" href="/style/style-main.css" />
</head>
<body>
    <h1>Admin Palnel</h1>
    <nav>
        <a href="/admin/dashboard">Dashbord</a>
        <a href="/admin/posts">Mange Post</a>
            <form action="/logout" method="POST">
                <?= csrf_token() ?>
                <button>Logout (<?= $user->email ?>)</button>
            </form>
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