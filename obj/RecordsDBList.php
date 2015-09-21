<?php

/**
 * Created by PhpStorm.
 * User: phillip
 * Date: 9/16/15
 * Time: 1:10 PM
 */
class RecordsDBList
{
    private $con;
    private $clist;
    private $studentId;

    /**
     * RecordsDBList constructor.
     */
    public function __construct(PDO $con, $clist, $studentId)
    {
        $this->con = $con;
        $this->clist = $clist;
        $this->studentId = $studentId;
    }

    public function getRecordById($id){
        $sql = "Select * from course_records where id=:id and studentId=:sid";

        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":sid", $this->studentId);
        $stmt->execute();
        $result = $stmt->fetch();

        $course = $this->clist->getCourseById($result['courseId']);
        return new \obj\Record($result['id'], $result['studentID'], $course, $result['grade'], $result['year'], $result['reqId'],
            $result['type'], $result['proprosedReqId'], $result['semesterCode']);
    }
    
    public function getRecordsByCourseId($id) {
        $sql = "Select * from course_records where courseId=:id and studentId=:sid";
        
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":sid", $this->studentId);
        $stmt->execute();
        $results = $stmt->fetchAll();

        $ret = array();
        foreach ($results as $row) {
            $course = $this->clist->getCourseById($row['courseId']);
            $ret[]=new \obj\Record($row['id'], $row['studentID'], $course, $row['grade'], $row['year'], $row['reqId'], 
                $row['type'], $row['proprosedReqId'], $row['semesterCode']);
        }
        return $ret;

    }

    public function getAllRecords($planned=true) {
        $sql = "Select * from course_records where studentId=:id";
        if (!$planned) { $sql .= " and grade IS NOT NULL";}

        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(":sid", $this->studentId);
        $stmt->execute();
        $results = $stmt->fetchAll();

        $ret = array();
        foreach ($results as $row) {
            $course = $this->clist->getCourseById($row['courseId']);
            $ret[]=new \obj\Record($row['id'], $row['studentID'], $course, $row['grade'], $row['year'], $row['reqId'],
                $row['type'], $row['proprosedReqId'], $row['semesterCode']);
        }
        return $ret;
    }
}