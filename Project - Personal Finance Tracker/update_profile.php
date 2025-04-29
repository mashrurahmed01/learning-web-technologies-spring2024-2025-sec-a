<?php
$errors = [];
$fname = $lname = $age = $gender = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty(trim($_POST["fname"]))) {
        $errors[] = "First name is required.";
    } else {
        $fname = htmlspecialchars(trim($_POST["fname"]));
    }

    if (empty(trim($_POST["lname"]))) {
        $errors[] = "Last name is required.";
    } else {
        $lname = htmlspecialchars(trim($_POST["lname"]));
    }

    if (empty(trim($_POST["age"]))) {
        $errors[] = "Age is required.";
    } elseif (!is_numeric(trim($_POST["age"])) || (int)$_POST["age"] <= 0) {
        $errors[] = "Please enter a valid age.";
    } else {
        $age = htmlspecialchars(trim($_POST["age"]));
    }


    if (empty($_POST["gender"])) {
        $errors[] = "Gender is required.";
    } else {
        $gender = htmlspecialchars(trim($_POST["gender"]));
    }

    
    if (empty($errors)) {
        
        echo "<h3>Profile Updated Successfully!</h3>";
        echo "<p>First Name: $fname</p>";
        echo "<p>Last Name: $lname</p>";
        echo "<p>Age: $age</p>";
        echo "<p>Gender: $gender</p>";
    } else {
    
        echo "<h3>Errors:</h3>";
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
?>