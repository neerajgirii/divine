<h1>Add Article</h1>
    <form action="insertBlogPage.php" method="POST">
        <label for="title">Title:</label>
        <input type="text" name="title" required><br>

        <label for="content">Content:</label>
        <textarea name="content" rows="4" required></textarea><br>

        <label for="image_url">Image URL:</label>
        <input type="file" name="image_url" required><br>

        <label for="category">Category:</label>
        <input type="text" name="category" required><br>

        <label for="date">Date:</label>
        <input type="date" name="date" required><br>

        <label for="author">Author:</label>
        <input type="text" name="author" required><br>

        <input type="submit" value="Submit">
    </form>
   