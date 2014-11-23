<?php

    // configuration
    require("../includes/config.php");
    
    // if user reached page via POST (as by submitting a form via POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["deposit"]))
        {
            apologize("Enter an amount to deposit!");
        }
        
        // stores deposit
        $deposit = $_POST["deposit"];
        
        // perform deposit
        $shares = query("UPDATE users SET cash = cash + ? WHERE id = ?", $deposit, $_SESSION["id"]);
        
        // redirect to index
        redirect("/");
    }
    
    else
    {       
        // else deposit form
        render("deposit_form.php", ["title" => "deposit form"]);
    }
    
?>
