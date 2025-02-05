<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>saving your submission...</title>
    <link href="styles/normalize.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">
</head>
<body>
    <?php
    // form inputs into variables
    $authorFirstName = $_POST['authorFirstName'];
    $authorLastName = $_POST['authorLastName'];
    $bookTitle = $_POST['bookTitle'];
    $genre_id = $_POST['genre_id'];
    $progress = $_POST['progress'];
    $completed = $_POST['completed'];

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
    ?>

   
    
    <a href="reading-list.php">view reading list</a>
</body>
</html>