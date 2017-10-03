<?php
// Entity/User.php
 
namespace Entity;

class User
{
   private $name;
   private $gender;

   public function __construct($name, $gender)
   {
       $this->name = $name;
       $this->gender = $gender;
   }

   public function getName()
   {
       return $this->name;
   }

   private function getGender()
   {
       return $this->gender;
   }
}

