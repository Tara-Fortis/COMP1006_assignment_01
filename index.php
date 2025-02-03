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
                        <label for="authorname">Author *</label>
                        <input type="text" name="fname" id="authorname" placeholder="First Name" required>
                        <input type="text" name="lname" id="authorname" placeholder="Last Name" required>
                    </p>
                </fieldset>
                <!-- Book title -->
                <fieldset>
                    <p>
                        <label>Book Title *</label>
                        <input type="text" required>
                    </p>
                </fieldset>
                <!-- Genre -->
                <fieldset>
                    <p>
                        <label>Genre *</label>
                        <input type="text" required>
                    </p>
                </fieldset>
                <!-- Progress Bar-->
                <fieldset>
                    <p>
                        <label for="book-progress">Progress</label>
                        <br>
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
                        <input type="checkbox" name="completed">
                    
                    </p>
                    <button>Submit</button>
                </fieldset>
            </form>
           
        </main>
        <footer>
            
        </footer>
    </body>
</html>