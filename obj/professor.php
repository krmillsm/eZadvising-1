<?php

/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 9/14/2015
 * Time: 7:25 PM
 */
class Professor
{
    private $name = "";
    private $dept = "";
    private $user = "";
    private $pass = "";
    private $courses = "";
    private $email = "";

    public function setName($name) { $this -> $name; }
    public function getName() { return $this -> $name; }
}