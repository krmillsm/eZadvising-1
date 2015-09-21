<?php
/**
 * Created by PhpStorm.
 * User: phillip
 * Date: 9/21/15
 * Time: 8:43 AM
 */

namespace obj;


class Requirment
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $category;
    /**
     * @var int
     */
    private $programid;
    /**
     * @var int
     */
    private $groupid;
    /**
     * @var int
     */
    private $hours;
    /**
     * @var int
     */
    private $minGrade;
    /**
     * @var int
     */
    private $catalogYear;


    /**
     * Requirment constructor.
     */
    public function __construct($id=0, $title="", $category="", $programid=0, $groupid=0, $hours=0, $minGrade=0,
                                $catalogYear=0)
    {

        $this->id = $id;
        $this->title = $title;
        $this->category = $category;
        $this->programid = $programid;
        $this->groupid = $groupid;
        $this->hours = $hours;
        $this->minGrade = $minGrade;
        $this->catalogYear = $catalogYear;

    }

    public function resolveSufficientRecords($records) {

    }
}