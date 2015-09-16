<?php

/**
 * Created by PhpStorm.
 * User: phillip
 * Date: 9/16/15
 * Time: 12:43 PM
 */
class CourseDBList
{
    private $con;

    /**
     * CourseDBList constructor.
     */
    public function __construct($conn)
    {
        $this->con = $conn;
    }

    public function getCourseById($id)
    {
        $sql = "Select * from courses where id=:id";

    }
}