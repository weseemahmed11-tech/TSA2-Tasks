<h1>Task List</h1>
<p>All tasks ordered by date.</p>

<table>
    <thead>
        <tr><th scope="col">Task</th><th scope="col">Status</th><th scope="col">Date</th><th scope="col">Created</th></tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= esc($task['title']) ?></td>
                <td><?= esc($task['status']) ?></td>
                <td><?= esc($task['task_date']) ?></td>
                <td><?= esc($task['created_at']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
