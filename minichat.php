<?php 
    /**
     * 
     * Simple minichat 
     * 
     */

    // Require database
    require_once 'config.php';

    // isset post pseudo and message
    if(isset($_POST['pseudo']) && isset($_POST['message'])){
        // If the pseudo is not empty and message not empty
        if(!empty($_POST['pseudo']) && !empty($_POST['message'])){
            // XSS patch
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $message = htmlspecialchars($_POST['message']);
            // Strlen pseudo
            if(strlen($pseudo) <= 100){

                // Insert into database messages
                $insert = $bdd->prepare('INSERT INTO chat(pseudo, message) VALUES (:pseudo, :message)');
                $insert->execute(array(
                    'pseudo' => $pseudo,
                    'message' => $message
                ));
                
                // Redirect
                header('Location:index.php?error=success');
                
                die();
            }else {header('Location:index.php?error=length'); die();} // redirect with error length
        }else {header('Location:index.php?error=empty'); die();} // redirect with error empty 
    }