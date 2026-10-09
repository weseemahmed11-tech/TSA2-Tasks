<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title) ?> | Tasks for Today</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <header>
        <nav aria-label="Main navigation">
            <a href="<?= site_url('/') ?>">Welcome</a>
            <a href="<?= site_url('tasks') ?>">Task List</a>
            <a href="<?= site_url('profile') ?>">Profile</a>
            <a href="<?= site_url('about') ?>">About</a>
            <?php if (session()->get('isLoggedIn')): ?>
                <a href="<?= site_url('tasks/new') ?>">New Task</a>
                <form method="post" action="<?= site_url('logout') ?>" class="nav-form">
                    <button type="submit">Logout</button>
                </form>
            <?php else: ?>
                <a href="<?= site_url('login') ?>">Login</a>
            <?php endif; ?>
        </nav>
    </header>
    <main>
