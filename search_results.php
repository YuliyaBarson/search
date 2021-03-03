<?php 
    session_start();
    require('header.php');
    echo "<div class='container'>";

    //grab the info from the form 
    $submit = filter_input(INPUT_GET, 'submit'); 
    $search_term = filter_input(INPUT_GET, 'search'); 
    $name = filter_input(INPUT_GET, 'name'); 

    //connect to the db 
    require('connect.php');
    $_SESSION['name'] = $name;
    //create the SQL statement 
    $query = "SELECT title FROM riskyjobs WHERE title LIKE :search_term;"; 
    //prepare
    $stmt = $db->prepare($query); 
    //bind
    //$stmt->bindParam(':search_term', $search_term);
    $stmt->bindValue(':search_term', '%'.$search_term.'%');

    //execute
    $stmt->execute(); 

    echo "<div class='container'>"; 
    echo "<h1> The following job opportunities related to " . $search_term . " are avaiable</h1>"; 
    echo "<ul>"; 
    
    //if we have a result, display the results 

    if($stmt->rowCount() >=1) {
        while($results = $stmt->fetch()) {
            echo "<li>" . $results['title'] . "</li>"; 
        }
    }
    else {
        echo "<p> No results found! </p>"; 
    }
    echo "</ul>";
    echo "<a href='moreinfo.php'>More Info</a>";
    echo "</div>";
    $stmt->closeCursor(); 
?>