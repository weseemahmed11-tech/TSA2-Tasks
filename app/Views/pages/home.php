<h1>Welcome to Tasks for Today</h1>
<p>Here are the tasks scheduled for today, <?= esc($today) ?>.</p>

<?php if ($tasks === []): ?>
    <p>No tasks are scheduled for today.</p>
<?php else: ?>
    <table>
        <thead>
            <tr><th scope="col">Task</th><th scope="col">Status</th><th scope="col">Date</th></tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= esc($task['title']) ?></td>
                    <td><?= esc($task['status']) ?></td>
                    <td><?= esc($task['task_date']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
