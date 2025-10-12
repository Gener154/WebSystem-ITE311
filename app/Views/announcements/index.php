<!DOCTYPE html>
<html>
<head>
    <title>Announcements</title>
</head>
<body>
    <h2>Announcements</h2>
    <a href="/announcements/create">Add New Announcement</a>
    <br><br>

    <?php if(session()->getFlashdata('success')): ?>
        <p style="color:green;"><?= session()->getFlashdata('success'); ?></p>
    <?php endif; ?>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>

        <?php foreach($announcements as $a): ?>
        <tr>
            <td><?= $a['id'] ?></td>
            <td><?= $a['title'] ?></td>
            <td><?= $a['content'] ?></td>
            <td><?= $a['created_at'] ?></td>
            <td><a href="/announcements/delete/<?= $a['id'] ?>">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
