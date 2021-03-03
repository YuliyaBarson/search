<?php require('header.php'); ?>
    <div class="container">
        <div class="bg-light">
            <div class="row">
            <div class="col heading">
            <h1> Current Opportunities</h1>
            </div>
            <div class="col">
            <!-- STEP ONE - display all risky job titles in a dynamic list   -->
            <?php
            /*grab the titles of the risky jobs from the table in 
            database and display in the browser right here :) */
            //connect to db 
            require('connect.php'); 
            //set up SQL query
            $sql = "SELECT title from riskyjobs;"; 
            //prepare the query 
            $statement = $db->prepare($sql); 
            //execute 
            $statement->execute(); 
            //fetchALL
            $search_results = $statement->fetchAll(); 
            //create a list of results 
            echo "<ul>"; 
            foreach($search_results as $result) {
                echo "<li>" . $result['title'] . "</li>"; 
            }
            //close some tags 
            echo "</ul>"; 
            echo "</div>";
            echo "</div>";
            echo "</div>";
            //close connection 
            $statement->closeCursor(); 
            ?>

        <h2> Search For Your New Career Here: </h2> 
        <form action="search_results.php" method="get">
            <div class="row">
                <div class="col">
                    <input type ="text" name="name" placeholder="My name is" class="form-control">
                </div>
                <div class="col">
                    <input type="text" name="search" placeholder="I'm searching for..." class="form-control">
                </div>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>