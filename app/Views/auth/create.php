<h2>Login</h2>

<?php if(isset($error)): ?>
    <p style="color: red;"><?= $error ?></p>
<?php endif; ?>

<form action="/login" method="POST" class="form-login">
    <?= csrf_token() ?> 
    <input type="email" name="email" id="email" require placeholder="Email">
    <input type="password" name="password" id="password" require placeholder="Password">
    <label for="remember">
        Remember Me
        <input type="checkbox" name="remember" id="remember">
    </label>
    <button type="submit">Login</button>
</form>