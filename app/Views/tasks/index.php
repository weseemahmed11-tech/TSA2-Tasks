<h1>Task List</h1>
<p>All tasks ordered by date.</p>

<?php if ($message = session()->getFlashdata('message')): ?><p class="success"><?= esc($message) ?></p><?php endif; ?>
<?php if ($tasks === []): ?><p>No active tasks are available.</p><?php endif; ?>

<table>
    <thead>
        <tr><th scope="col">Task</th><th scope="col">Status</th><th scope="col">Date</th><th scope="col">Created</th><th scope="col">Actions</th></tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= esc($task['title']) ?></td>
                <td><?= esc($task['status']) ?></td>
                <td><?= esc($task['task_date']) ?></td>
                <td><?= esc($task['created_at']) ?></td>
                <td>
                    <?php if (session()->get('isLoggedIn')): ?>
                        <a href="<?= site_url('tasks/' . $task['id'] . '/edit') ?>">Edit</a>
                        <form method="post" action="<?= site_url('tasks/' . $task['id'] . '/archive') ?>" class="inline-form">
                            <button type="submit">Archive</button>
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
