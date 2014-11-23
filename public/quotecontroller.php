<?php

    // configuration
    require("../includes/config.php");
    
    // if user reached page via POST (as by submitting a form via POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["symbol"]))
        {
            apologize("Enter a stock symbol!");
        }
        
        // lookup stock from Yahoo! 
        $stock = lookup($_POST["symbol"]);
        
        // if invalid stock symbol, apologize
        if ($stock === false)
        {
            apologize("Invalid stock symbol!");
        }

        // render quote.php
        render("quote.php", ["stock" => $stock]);
    }
    
    else
    {
        // else render form
        render("quote_form.php", ["title" => "Quote"]);
    }
    
?>
