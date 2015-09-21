<?php
/**
 * Created by PhpStorm.
 * User: phillip
 * Date: 9/20/15
 * Time: 8:17 PM
 */

namespace obj;


class Record
{
    /**
     * @var int
     */
    private $semesterCode;
    /**
     * @var int
     */
    private $id;
    /**
     * @var int
     */
    private $studentId;
    /**
     * @var null
     */
    private $course;
    /**
     * @var int
     */
    private $grade;
    /**
     * @var int
     */
    private $year;
    /**
     * @var int
     */
    private $reqId;
    /**
     * @var int
     */
    private $type;
    /**
     * @var int
     */
    private $proposedReqId;

    /**
     * Record constructor.
     * @param int $id : The id of the record
     * @param int $studentId : The id of the student who took the course
     * @param null $course : The course for this record
     * @param int $grade : The grade received
     * @param int $year : The year of the class took/will take place in
     * @param int $reqId : The requirement the record meets
     * @param int $type :
     * @param int $proposedReqId : The requirement the record should meet
     * @param int $semesterCode : The semester the class took/will take place in
     */
    public function __construct($id=0, $studentId=0, $course=null, $grade=0, $year=0, $reqId=0, $type=0,
                                $proposedReqId=0, $semesterCode=0)
    {
        $this->semesterCode = $semesterCode;
        $this->id = $id;
        $this->studentId = $studentId;
        $this->course = $course;
        $this->grade = $grade;
        $this->year = $year;
        $this->reqId = $reqId;
        $this->type = $type;
        $this->proposedReqId = $proposedReqId;
    }

    /**
     * @return int
     */
    public function getSemesterCode()
    {
        return $this->semesterCode;
    }

    /**
     * @param int $semesterCode
     */
    public function setSemesterCode($semesterCode)
    {
        $this->semesterCode = $semesterCode;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getStudentId()
    {
        return $this->studentId;
    }

    /**
     * @param int $studentId
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
    }

    /**
     * @return null
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * @param null $course
     */
    public function setCourse($course)
    {
        $this->course = $course;
    }

    /**
     * @return int
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * @param int $grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return int
     */
    public function getReqId()
    {
        return $this->reqId;
    }

    /**
     * @param int $reqId
     */
    public function setReqId($reqId)
    {
        $this->reqId = $reqId;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getProposedReqId()
    {
        return $this->proposedReqId;
    }

    /**
     * @param int $proposedReqId
     */
    public function setProposedReqId($proposedReqId)
    {
        $this->proposedReqId = $proposedReqId;
    }

}