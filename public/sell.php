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
        
        // stores symbol as uppercase string 
        $symbol = strtoupper($_POST["symbol"]);
        
        // lookup stock from Yahoo! 
        $stock = lookup($symbol);
        
        // perform selling of shares 
        $shares = query("SELECT shares FROM portfolio WHERE id = ? AND symbol = ?", $_SESSION["id"], $symbol);
        
        // calculate value of shares sold 
        $value = $stock["price"] * $shares[0]["shares"];
            
        // update cash with now known value
        query("UPDATE users SET cash = cash + ? WHERE id = ?", $value, $_SESSION["id"]);  
            
        // delete stock from a users portfolio 
        query("DELETE FROM portfolio WHERE id = ? AND symbol = ?", $_SESSION["id"], $symbol);  
        
        //update history
        query("INSERT INTO history (type, id, symbol, shares, price) VALUES(?, ?, ?, ?, ?)", 'SELL', $_SESSION["id"], 
        $symbol, $_POST["shares"], $value);
                      
        // redirect to index
        redirect("/");
    }
    
    else
    {
        // store in current stocks that are in the user's portfolio 
        $rows =	query("SELECT * FROM portfolio WHERE id = ?", $_SESSION["id"]);	
        
        // associative array to store stocks in portfolio 
        $stocks = [];
        
        foreach ($rows as $row)	
        {   
            $stock = $row["symbol"];
            $stocks[] = $stock;       
        }
            
        // else render form
        render("sell_form.php", ["title" => "sell form", "stocks" => $stocks]);
    }
    
?>
