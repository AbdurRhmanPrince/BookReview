<?php

class session {
   public $user_id;
    public $loggedIn = false;

   public function __construct()
   {
    session_start();
    if(!empty($_SESSION["user_id"])) {
       $this->user_id = $_SESSION["user_id"];
       $this->loggedIn = true;
    }
   }


   public function login($id) {
    $_SESSION["user_id"] = $id;
     $this->user_id = $_SESSION["user_id"];
     $this->loggedIn = true;
   }

   public function logout() {
    unset($_SESSION["user_id"]);
    unset($this->user_id);
    unset($loggedIn);
   }


    
}

$session = new session();

?>