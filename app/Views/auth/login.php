<h1>Login</h1>

<?php if ($message = session()->getFlashdata('message')): ?><p class="success"><?= esc($message) ?></p><?php endif; ?>
<?php if ($error = session()->getFlashdata('error')): ?><p class="error"><?= esc($error) ?></p><?php endif; ?>

<form method="post" action="<?= site_url('login') ?>">
    <label for="username">Username</label>
    <input id="username" name="username" type="text" required autocomplete="username" value="<?= esc(old('username')) ?>">

    <label for="password">Password</label>
    <input id="password" name="password" type="password" required autocomplete="current-password">

    <button type="submit">Login</button>
</form>
