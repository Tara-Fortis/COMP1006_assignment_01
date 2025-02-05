<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reading Record</title>
        <link href="styles/normalize.css" rel="stylesheet">
        <link href="styles/style.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <?php include('shared/nav-bar.php') ?>
        </header>
        <main>
            <h1>My Reading Record</h1>
            <form method="post" action="saving.php">
                <h1>
                    <legend>Enter your book information here:</legend>
                </h1>
                <!-- Author's name  #authorname-->
                <fieldset>
                    <p>
                        <label>Author *
                            <input type="text" id="fname" name="authorname" placeholder="First Name" required>
                            <input type="text" id="lname" name="authorname" placeholder="Last Name" required>
                        </label>
                    </p>
                </fieldset>
                <!-- Book title -->
                <fieldset>
                    <p>
                        <lable for="bookTitle">Book Title *</label>
                        <input type="text" name="bookTitle" required>
                    </p>
                </fieldset>
                <!-- Genre -->
                <fieldset>
                    <p>
                        <label for="genreId">Genre *</label>
                        <select name="genreId" required>
                            <?php
                            // connect
                                include('shared/db.php');
                                //fetch and store genre list from the database
                                $sql = "SELECT * FROM genre_list ORDER BY name";
                                $cmd = $db->prepare($sql);
                                $cmd->execute();
                                $genres = $cmd->fetchAll();
                                //add each genre to dropdown
                                foreach ($genres as $genre) {
                                    echo '<option value="' . $genre['genreId']  . '">' . $genre['name'] . '</option>';
                                }

                                //disconnect
                                $db = null;
                            ?>
                        </select>
                    </p>
                </fieldset>
                <!-- Progress Bar-->
                <fieldset>
                    <p>
                        <label for="book-progress">Progress <p id="pBar"></p></label>
                        <input
                            type="range"
                            name="book-progress"
                            id="book-progress"
                            min="0"
                            Max="100"
                            step="25">
                        <output for="book-progress"></output>
                        <!--Progress bar value here-->
                        <p id="progress-comment"></p>
                    </p>
                </fieldset>
                <fieldset>
                    <p>
                        <label for="completed">Completed</label>
                        <input type="checkbox" id="completed">
                    
                    </p>
                    <button>Submit</button>
                </fieldset>
            </form>
           
        </main>
        <footer>
            
        </footer>
    </body>
</html>