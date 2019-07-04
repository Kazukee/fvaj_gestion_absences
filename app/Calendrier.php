<?php
/**
 * Created by PhpStorm.
 * User: Admin-nuno
 * Date: 18.04.2019
 * Time: 11:35
 */

namespace App;



class Calendrier {

    /**
     * Constructor
     */
    public function __construct(){
        $this->naviHref = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    }

    /********************* PROPRIETES ********************/
    private $dayLabels = array("Lun","Mar","Mer","Jeu","Ven","Sam","Dim");

    private $currentYear=0;

    private $currentMonth=0;

    private $currentDay=0;

    private $currentDate=null;

    private $daysInMonth=0;

    private $naviHref= null;

    /********************* PUBLIC **********************/

    /**
     * print out the calendar
     */
    public function show() {

        if(isset($_GET['year'])){

            $year = $_GET['year'];

        }else {

            $year = date("Y",time());

        }

        if(isset($_GET['month'])){

            $month = $_GET['month'];

        }else {

            $month = date("F",time());

        }

        $this->currentYear=$year;

        $this->currentMonth=$month;

        $this->daysInMonth=$this->_daysInMonth($month,$year);

        $content='<div id="calendar">'.
            '<div class="box">'.
            $this->_createNavi().
            '</div>'.
            '<div class="box-content">'.
            '<ul class="label">'.$this->_createLabels().'</ul>';
        $content.='<div class="clear"></div>';
        $content.='<ul class="dates">';

        $weeksInMonth = $this->_weeksInMonth($month,$year);
        // Create weeks in a month
        for( $i=0; $i<$weeksInMonth; $i++ ){

            //Create days in a week
            for($j=1;$j<=7;$j++){
                $content.=$this->_showDay($i*7+$j);
            }
        }

        $content.='</ul>';

        $content.='<div class="clear"></div>';

        $content.='</div>';

        $content.='</div>';
        return $content;
    }

    /********************* PRIVATE **********************/
    /**
     * create the li element for ul
     */
    private function _showDay($cellNumber){

        if($this->currentDay==0){

            $firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));

            if(intval($cellNumber) == intval($firstDayOfTheWeek)){

                $this->currentDay=1;

            }
        }


        if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){

            $this->currentDate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));

            $cellContent = $this->currentDay;

            $this->currentDay++;

        }else{

            $this->currentDate =null;

            $cellContent=null;
        }


        return '<li id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
            ($cellContent==null?'mask':'').'">'.$cellContent.'</li>';
    }

    /**
     * create navigation
     */
    private function _createNavi(){
        switch ($this->currentMonth) {
            case "January" :
                $this->currentMonth = 1;
                break;
            case "February" :
                $this->currentMonth = 2;
                break;
            case "March" :
                $this->currentMonth = 3;
                break;
            case "April" :
                $this->currentMonth = 4;
                break;
            case "May" :
                $this->currentMonth = 5;
                break;
            case "June" :
                $this->currentMonth = 6;
                break;
            case "July" :
                $this->currentMonth = 7;
                break;
            case "August" :
                $this->currentMonth = 8;
                break;
            case "September" :
                $this->currentMonth = 9;
                break;
            case "October" :
                $this->currentMonth = 10;
                break;
            case "November" :
                $this->currentMonth = 11;
                break;
            case "December" :
                $this->currentMonth = 12;
                break;
        }

        if ($this->currentMonth == 12) {
            $nextYear = intval($this->currentYear) + 1;
            $nextMonth = 1;
        } else {
            $nextYear = $this->currentYear;
            $nextMonth = $this->currentMonth + 1;
        }

        if ($this->currentMonth == 1) {
            $preYear = intval($this->currentYear) - 1;
            $preMonth = 12;
        } else {
            $preYear = $this->currentYear;
            $preMonth = $this->currentMonth - 1;
        }

        return
            '<div class="header">'.
            '<a class="prev" href="'.$this->naviHref.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'">Prev</a>'.
            '<span class="title">'.date('F Y',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</span>'.
            '<a class="next" href="'.$this->naviHref.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'">Next</a>'.
            '</div>';
    }

    /**
     * create calendar week labels
     */
    private function _createLabels(){

        $content='';

        foreach($this->dayLabels as $index=>$label){

            $content.='<li class="'.($label==6?'end title':'start title').' title">'.$label.'</li>';

        }

        return $content;
    }



    /**
     * calculate number of weeks in a particular month
     */
    private function _weeksInMonth($month=null,$year=null){

        if( null==($year) ) {
            $year =  date("Y",time());
        }

        if(null==($month)) {
            $month = date("F",time());
        }

        // find number of days in this month
        $daysInMonths = $this->_daysInMonth($month,$year);

        $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);

        $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));

        $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));

        if($monthEndingDay<$monthStartDay){

            $numOfweeks++;

        }

        return $numOfweeks;
    }

    /**
     * calculate number of days in a particular month
     */
    private function _daysInMonth($month=null,$year=null){

        if(null==($year))
            $year =  date("Y",time());

        if(null==($month))
            $month = date("m",time());

        return date('t',strtotime($year.'-'.$month.'-01'));
    }

}
