<?php 
    require('header.php');
    echo "<div class='container'>";
    // grab the search term and display results 
    
    //grab the info 
    $submit = filter_input(INPUT_GET, 'submit');
    $search_term = filter_input(INPUT_GET, 'search');
    $name = filter_input(INPUT_GET, 'name');

    //connect to db
    require('connect.php');
    //create sql statement
    $query = "SELECT title FROM riskyjobs WHERE title = :search_term";
    //prepare
    $stmt = $db->prepare($query);
    //bind
    $stmt->bindParam(':search_term', $search_term);
    //execute
    $stmt->execute();

    echo"<div class='container'>";
    echo"<h1> The following job opportunities related to" . $search_term . " are available</h1>";
    echo"</ul>";

    //if we have a result, display results

    if($stmt->rowCount() >=1){
        
        while($result = $stmt->fetch()){
            echo "<li>" . $results['title'] . "</li>";
        }

    }
    else{
        echo"<p>No result were found! </p>";
    }
    echo "</div>";
    
    $stmt->closeCursor();

?>
