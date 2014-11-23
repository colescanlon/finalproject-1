<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // Checks that username and password are not empty 
        if (empty($_POST["username"]) || empty($_POST["password"]))
        {
            apologize("Enter both a username and password!");
        }
        // Checks that confirmation password is not empty 
        else if (empty($_POST["confirmation"]))
        {
            apologize("Enter confirmation password!");
        }
        // Checks that confirmation matches password 
        else if ($_POST["password"] != $_POST["confirmation"])
        {
            apologize("Make sure confirmation matches password!");
        } 
        
        // Makes sure username is unique 
        $check = query("INSERT INTO users (username, hash, cash) VALUES(?, ?, 10000.00)", $_POST["username"], crypt($_POST["password"]));
        if ($check === false)
        {
            apologize("That username is already taken!");
        }
        
        // insert id and start session
        $rows = query("SELECT LAST_INSERT_ID() AS id");
        $id = $rows[0]["id"];
        $_SESSION["id"] = $id;  
        
        // redirect to index.php
        redirect("index.php");  
    }
?>
