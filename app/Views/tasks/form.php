<h1><?= esc($heading) ?></h1>

<?php $errors = session()->getFlashdata('errors') ?? []; ?>
<?php if ($errors !== []): ?>
    <div class="error" role="alert">
        <?php foreach ($errors as $error): ?><p><?= esc($error) ?></p><?php endforeach; ?>
    </div>
<?php endif; ?>

<form method="post" action="<?= esc($action) ?>">
    <label for="title">Title</label>
    <input id="title" name="title" type="text" maxlength="150" required value="<?= esc(old('title', $task['title'] ?? '')) ?>">

    <label for="status">Status</label>
    <select id="status" name="status">
        <?php foreach (['Pending', 'In Progress', 'Completed'] as $status): ?>
            <option value="<?= esc($status) ?>" <?= old('status', $task['status'] ?? 'Pending') === $status ? 'selected' : '' ?>><?= esc($status) ?></option>
        <?php endforeach; ?>
    </select>

    <label for="task_date">Task date</label>
    <input id="task_date" name="task_date" type="date" required value="<?= esc(old('task_date', $task['task_date'] ?? '')) ?>">

    <button type="submit">Save task</button>
</form>
