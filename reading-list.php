<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="styles/normalize.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">
</head>
<body>
    <header>
        <?php include('shared/nav-bar.php')?>
    </header>
    <main>
        <?php include('shared/db.php');
        $sql = "SELECT * FROM reading_record";
        $cmd = $db->prepare($sql);
        $cmd->execute();
        $readingRecords = $cmd->fetchAll();
        echo "<table><caption>My Reading List</caption><thead><tr><th>Author's First Name</th><th>Author's Last Name</th><th>Book Title</th><th>Genre ID</th><th>Progress</th><th>Completed</th></tr></thead>";
        foreach ($readingRecords as $readingRecord) {
            echo '<tbody><tr>';
            echo '<td>'. $readingRecord['authorFirstName'] . '</td>';
            echo '<td>'. $readingRecord['authorLastName'] . '</td>';
            echo '<td>'. $readingRecord['bookTitle'] . '</td>';
            echo '<td>'. $readingRecord['genre_id'] . '</td>';
            echo '<td>'. $readingRecord['progress'] . "%" . '</td>';
            echo '<td>'. $readingRecord['completed'] . '</td>';
            echo '</tr></tbody>';
        }
        echo '</table>';
        // output the genre list
        $sql = "SELECT name FROM genre_list";
        $cmd = $db->prepare($sql);
        $cmd->execute();
        $genreNames = $cmd->fetchAll();
        echo '<h3>Genre List</h3>';
        echo '<ul>';
        foreach ($genreNames as $genreName){
            echo '<li>' . $genreName['name'] . '</li>';
        }
        echo '</ul>';
        $db = null;
        ?>
    </main>
    <footer>

    </footer>
</body>
</html>