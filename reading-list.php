        <?php
        $title = 'reading list';
        include('shared/nav-bar.php')
        ?>
    <main>
        <h1>Your Reading List</h1>
        <?php include('shared/db.php');
        $sql = "SELECT * FROM reading_record";
        $cmd = $db->prepare($sql);
        $cmd->execute();
        $readingRecords = $cmd->fetchAll();
        echo "<table><thead><tr><th>Author's First Name</th><th>Author's Last Name</th><th>Book Title</th><th>Genre ID</th><th>Progress</th><th>Completed</th></tr></thead>";
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
        echo '<ol>';
        foreach ($genreNames as $genreName){
            echo '<li>' . $genreName['name'] . '</li>';
        }
        echo '</ol>';
        $db = null;
        ?>
    </main>
    <?php include('shared/footer.php');?>