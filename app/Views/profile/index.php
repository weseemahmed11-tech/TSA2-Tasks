<h1>Profile</h1>

<?php if ($user === null): ?>
    <p>No demo user is available.</p>
<?php else: ?>
    <dl>
        <dt>Username</dt><dd><?= esc($user['username']) ?></dd>
        <dt>Full name</dt><dd><?= esc($user['full_name']) ?></dd>
        <dt>Email</dt><dd><?= esc($user['email']) ?></dd>
    </dl>
<?php endif; ?>
