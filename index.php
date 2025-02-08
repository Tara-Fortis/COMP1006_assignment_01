            <?php
            $title = 'Home';
            include('shared/nav-bar.php');
            ?>
        <main>
            <h1>My Reading Record</h1>
            <h2>Enter your book information here:</h2>
            <form method="post" action="saving.php">
                
                <!-- Author's first name  #fname-->
                <fieldset>
                    <label for="fname">Author First Name* </label>
                    <input 
                        type="text" 
                        id="fname" 
                        name="authorFirstName" 
                        placeholder="First Name" 
                        maxlength="25" 
                        required>
                <!-- Author's last name  #lname -->
                    <label for="lname">Author Last Name* </label>
                    <input 
                        type="text" 
                        id="lname" 
                        name="authorLastName" 
                        placeholder="Last Name" 
                        maxlength="25" 
                        required>
                </fieldset>
                <!-- Book title -->
                <fieldset>
                    <label for="Title">Book Title *</label>
                    <input 
                        type="text" 
                        name="bookTitle" 
                        id="Title"
                        placeholder="Title"
                        required>
                </fieldset>
                <!-- Genre -->
                <fieldset>
                    <label for="genre">Genre *</label>
                    <select 
                        id="genre" 
                        name="genre_id" 
                        required>
                        <?php
                        // connect
                            include('shared/db.php');
                            //fetch and store genre list from the database
                            $sql = "SELECT * FROM genre_list ORDER BY name";
                            $cmd = $db->prepare($sql);
                            $cmd->execute();
                            $genres = $cmd->fetchAll();
                            //add each genre to dropdown
                            echo '<option value="">Choose an option</option>';
                            foreach ($genres as $genre) {
                                echo '<option value="' . $genre['genre_id']  . '">' . $genre['name'] . '</option>';
                            }
                            //disconnect
                            $db = null;
                        ?>
                    </select>
                    
                </fieldset>
                <!-- Progress Bar-->
                <fieldset>
                    <label for="book-progress">Progress</label>
                    <input
                        type="range"
                        name="progress"
                        id="book-progress"
                        min="0"
                        max="100"
                        step="20">
                    <!--Progress bar value here-->
                    <output id="value"></output>
                </fieldset>
                <fieldset>
                    <label for="y_n">Completed</label>
                    <input 
                        type="checkbox" 
                        id="y_n" 
                        name="completed">
                    <br>
                    <button>Submit</button>
                </fieldset>
            </form>
           
        </main>
        <?php include('shared/footer.php');?>
