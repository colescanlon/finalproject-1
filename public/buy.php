<?php

    // configuration
    require("../includes/config.php");
    
    // if user reached page via POST (as by submitting a form via POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["symbol"]) || empty($_POST["shares"]))
        {
            apologize("Stock symbol and shares cannot be empty!");
        }
        
        // stores symbol as uppercase string 
        $symbol = strtoupper($_POST["symbol"]);
        
        // lookup stock from Yahoo! 
        $stock = lookup($symbol);
        
        // if invalid stock symbol, apologize
        if ($stock === false)
        {
            apologize("Invalid stock symbol!");
        }
        
        if (preg_match("/^\d+$/", $_POST["shares"]) == false)
        {
            apologize("Shares can only be whole, positive integers!");
        }
        
        // calculates cost of purchase, which is price x shares purchased
        $cost = $stock["price"] * $_POST["shares"];
        
        // checks how much cash user has
        $cash =	query("SELECT cash, username FROM users WHERE id = ?", $_SESSION["id"]);
        
        // if there is not enough cash to purchase, apologize 
        if ($cost > $cash[0]["cash"])
        {
            apologize("You do not have enough cash to purchase this stock!");
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
        render("buy_form.php", ["title" => "buy form"]);
    }
    
?>
