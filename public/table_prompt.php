<?php

    // configuration
    require("../includes/config.php");
    
    // if user reached page via POST (as by submitting a form via POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["table"]))
        {
            apologize("");
        }   
    
        
        else
        {
            // perform buying of shares 
            query("INSERT INTO portfolio (id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE 
                shares = shares + VALUES(shares)", $_SESSION["id"], $symbol, $_POST["shares"]);
                
            // update cash, subtracting cost of purchase
            query("UPDATE users SET cash = cash - ? WHERE id = ?", $cost, $_SESSION["id"]);

            //update history
            query("INSERT INTO history (type, id, symbol, shares, price) VALUES(?, ?, ?, ?, ?)", "BUY", $_SESSION["id"], 
                $symbol, $_POST["shares"], $cost);       

            // redirect to index
            redirect("/");
        }
      }  
    
    else
    {       
        // else render form
        render("table_prompt_form.php", ["title" => "table prompt"]);
    }
    
?>
