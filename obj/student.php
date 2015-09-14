<?php

class Student {

     private $name = "";
     private $ezplan = 0;  //make obj
     private $username = "":
     private $coursesCompleted = 0; //makeobj
     private $email = "":


     function setName($name) {
          if(strlen($name) > 3)
               $this->name = $name;
     }

     function getName() {
          return $name;
     }
}

?>
