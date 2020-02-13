<?php
// Get the category data
$name = filter_input(INPUT_POST, 'name');

// Validate input
if ($name == null) {
    $error = "Invalid category data. Check field and try again";
    include('error.php');
} else {
    require_once('database.php');

    // Add the category to the database
    $query = 'INSERT INTO categories
                (categoryName)
              VALUES
                (:categoryName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryName', $name);
    $statement->execute();
    $statement->closeCursor();

    // Display the Catagories Page
    include('category_list.php');
}
