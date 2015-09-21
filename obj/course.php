<?php
#
# CSCI 490 - Software Engineering
# Developer: Cameron Collins
# Team: No Clue
#
class Course {

    private $id;
    private $title;
    private $dept;
    private $num;
    private $difficulty;
    private $hours;
    private $description;
    private $prereq_groups;
    private $semestersOffered;


    function __construct($id=0, $name="", $department="", $number=0, $hours=0, $description="",
                         $prereq_groups="", $semestersOffered="", $difficulty=0) {
        $this->id = $id;
        $this->title = $name;
        $this->dept = $department;
        $this->num = $number;
        $this->difficulty = $difficulty;
        $this->hours = $hours;
        $this->description = $description;
        $this->prereq_groups = $prereq_groups;
        $this->semestersOffered = $semestersOffered;
    }

    /**
     * Parses a prereq expression into an array of arrays of integers
     *
     * @param $expr
     * @return array
     */
    public static function parsePrereqExpression($expr){
        //TODO: More sophisticated expression parsing might be needed
        $expr = strtoupper($expr); //Convert string to upper case

        //Uses the array map function to convert the expression to an array of arrays of integers
        // splitting on ORs then on ANDs
        return array_map(function($grp) { // See 1
            return array_map(function($id) { // See 2
                return (int)trim($id); //Strip white space and convert to integer
            }, explode('AND', $grp)); //2: Split the given string on ANDs
        }, explode('OR', $expr)); //1: Split the given string on ORs
    }

    /**
     * Converts a string of Y's and N's to an array of ints for the semesters offered
     *
     * @param $expr : A string of Y's and N's for semesters
     * @return array
     */
    public static function parseSemestersOffered($expr) {
        $chars = str_split($expr);
        $ret = array();
        for ($i=0; $i<count($chars); $i++ ) {
            if($chars[$i] == "Y") {$ret[] = $i;}
        }
        return $ret;
    }

    /**
     * Takes an indexable object (ex. a database row) and calls the course constructor with it using the idxspec
     * as a map. Before calling the constructor, a conversion for the semester and prereq arguments will be attempted using
     * parseSemestersOffered and parsePrereqExpression. The position in the array corresponds to the argument
     * for the constructor, and the value at that position is the index of $row to use as the value; symbolically:
     *      $args(i) = $row($idxspec(i))
     *
     * If $idxspec(i) is null, null will be passed to the constructor at that position
     *
     * @param $row : Any indexable variable
     * @param array $idxspec : An array that maps the index in the row to the constructor parameter
     * @param bool $convert : If true attempt to parse prereqs and semesters offered
     * @return Course
     */
    public static function courseFromRow($row, $idxspec=[0, 5, 1, 2, 4, 6, 3, 8, null], $convert=false) {
        $args = array();
        foreach ($idxspec as $col) {
            if ($col==null){
                $args[] = null;
            }
            $args[] = $row[$col];
        }
        if ($convert) {
            if ($args[6] != null) {
                $args[6] = Course::parsePrereqExpression($args[6]);
            }
            if ($args[7] != null) {
                $args[7] = Course::parseSemestersOffered($args[7]);
            }
        }
        return new Course(...$args);

    }


    #getters
    function getTitle() {
        return $this->title;
    }

    function getDept() {
        return $this->dept;
    }

    function getNum() {
        return $this->num;
    }

    function getDifficulty() {
        return $this->difficulty;
    }

    #setters
    function setTitle($title) {
        if(strlen($title) > 3)
             $this->title = $title;
    }

    function setDept($dept) {
        if(strlen($dept))
            $this->dept = $dept;
    }

    function setNum($num) {
        $this->num = $num;
    }

    function setDifficulty($difficulty) {
        $this->difficulty = $difficulty;
    }

    #comparison
    function compareTo(Course $other) {
        if ($this->getDifficulty() > $other->getDifficulty())
            return 1;
        elseif ($this->getDifficulty() < $other->getDifficulty())
            return -1;
        else
            return 0;
    }

    #String output 
    function toString() {
        $toString = "";
        $toString .= "Name: " . $this->title . "\n";
        $toString .= "Title: " . $this->dept . " " . $this->num . "\n";
        $toString .= "Difficulty: " . $this->difficulty . "\n";
        return $toString;
    }
}

?>
