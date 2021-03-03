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
            require("connect.php");
            //set up sql query
            $sql = "SELECT title FROM riskyjobs;";
            //prepare that query
            $statement = $db->prepare($sql);
            //execute
            $statement->execute();

            $search_results = $statement->fetchAll()

            echo "<ul>"
            foreach($search_results as result){
            echo "<li>" . $result['title' . "</li>";
            }
            echo"</ul>";

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

