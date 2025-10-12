<!DOCTYPE html>
<html>
<head>
    <title>Add Announcement</title>
</head>
<body>
    <h2>Add New Announcement</h2>
    <form action="/announcements/store" method="post">
        <label>Title:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Content:</label><br>
        <textarea name="content" required></textarea><br><br>

        <button type="submit">Save</button>
    </form>

    <br>
    <a href="/announcements">Back</a>
</body>
</html>
