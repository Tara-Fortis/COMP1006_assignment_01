<?php
        $title = 'saving your entry...';
        include('shared/nav-bar.php')
?>
<main> 
   <?php
        // form inputs into variables
        $authorFirstName = $_POST['authorFirstName'];
        $authorLastName = $_POST['authorLastName'];
        $bookTitle = $_POST['bookTitle'];
        $genre_id = $_POST['genre_id'];
        $progress = $_POST['progress'];
        $completed = $_POST['completed'];

        //validation statement
        $yes = true;

        if (empty($authorFirstName)){
            echo '<h3>Please add the Author\'s first name</h3>';
            echo '<a href="index.php">Back</a>';
            $yes = false;
        }
        else if (empty($authorLastName)){
            echo '<h3>Please add the Author\'s last name</h3>';
            echo '<a href="index.php">Back</a>';
            $yes = false;
        }
        else if (empty($bookTitle)){
            echo '<h3>Please add the name of your book</h3>';
            echo '<a href="index.php">Back</a>';
            $yes = false;
        }
        else if (empty($genre_id)){
            echo '<h3>Please choose a genre</h3>';
            echo '<a href="index.php">Back</a>';
            $yes = false;
        }
        else if (strlen($authorFirstName) > 25){
            echo '<h3>The author\'s first name is too long</h3>';
            echo '<a href="index.php">Back</a>';
            $yes = false;
        }
        else if (strlen($authorLastName) > 25){
            echo '<h3>The author\'s last name is too long</h3>';
            echo '<a href="index.php">Back</a>';
            $yes = false;
        }
        else if (strlen($bookTitle) > 25){
            echo '<h3>Book Title is too long</h3>';
            echo '<a href="index.php">Back</a>';
            $yes = false;
        }
        else if(!is_numeric($genre_id)){
            echo '<h3>Genre is invalid</h3>';
            echo '<a href="index.php">Back</a>';
            $yes = false;
        }
        else {
            $yes = true;
        }

        if ($yes === true){
            // db
            include('shared/db.php');

            // SQL INSERT statements

            $sql = "INSERT INTO reading_record (authorFirstName, authorLastName, bookTitle, genre_id, progress, completed) VALUES (:authorFirstName, :authorLastName, :bookTitle, :genre_id, :progress, :completed)";
            if (!empty($_POST['completed'])) {
                if ($_POST['completed'] == 'on') {
                    $completed = true;
                }
                else {
                    $completed = false;
                };
            }
            else {
                $completed = false;
            }

            //Safety: bind Parameters
            $cmd = $db->prepare($sql);
            $cmd->bindParam(':authorFirstName', $authorFirstName, PDO::PARAM_STR,25);
            $cmd->bindParam(':authorLastName', $authorLastName, PDO::PARAM_STR,25);
            $cmd->bindParam(':bookTitle', $bookTitle, PDO::PARAM_STR,70);
            $cmd->bindParam(':genre_id', $genre_id, PDO::PARAM_INT);
            $cmd->bindParam(':progress', $progress, PDO::PARAM_INT);
            $cmd->bindParam(':completed', $completed, PDO::PARAM_BOOL);

            $cmd->execute();

            $db = null;

            echo'Your book was saved';
        }
    ?>
    <p><a href="reading-list.php">view reading list</a></p>
</main>
<?php include('shared/footer.php');?>