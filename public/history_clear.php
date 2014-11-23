<?php

    // configuration
    require("../includes/config.php");
    
    // if user reached page via POST (as by submitting a form via POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // store in current stocks that are in the user's portfolio 
        $rows =	query("SELECT * FROM history WHERE id = ?", $_SESSION["id"]);	
        
        foreach ($rows as $row)	
        {   
            $symbol = $row["symbol"];
            // delete stock from a users portfolio 
            query("DELETE FROM history WHERE id = ? AND symbol = ?", $_SESSION["id"], $symbol);       
        }

        // render quote.php
        render("history_cleared.php");
    }
    
    else
    {
        // else render form
        render("history_clear_form.php", ["title" => "history clear"]);
    }
    
?>
