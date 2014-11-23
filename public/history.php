<?php

    // configuration
    require("../includes/config.php"); 
        
    // query database for cash
    $history = query("SELECT * FROM history WHERE id = ?", $_SESSION["id"]);
   
    // render portfolio.php
    render("history_table.php", ["history" => $history]);
?>
