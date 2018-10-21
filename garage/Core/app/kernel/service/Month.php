<?php
// name of project garage.
// Author :  lakhdar.
// Create in  2018-09-11 at 17:20:44.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// 

namespace app\kernel\service;
use app\kernel\service as service;
use app\kernel\db as db ;


class Month {

    public $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
    private $_months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    public $_month;
    public $_year;

    public function __construct(int $month = null, int $year = null){

        if($month === null || $month < 1 || $month > 12){

            $month = intval(date('m'));
        } 
        
        if($year === null ){

            $year = intval(date('Y'));
        }

        $this->_month = $month;
        $this->_year = $year;
    }

    public function getStartingDay() {

        return new \DateTime("{$this->_year}-{$this->_month}-01");
    }


    public function toString(){

        return $this->_months[$this->_month - 1]." ".$this->_year;
    }

    public function getWeeks() {

        $start = $this->getStartingDay();

        $end = (clone $start)->modify("+1 month -1 day");

        $weeks =  intval($end->format("W")) - intval($start->format("W")) + 1;

        if($weeks < 0){

            $weeks =  intval($end->format("W")) +4;
        }

        return $weeks;
    }

    public function withinMonth($date){

        return $this->getStartingDay()->format('Y-m') === $date->format('Y-m');
    }

    public function nextMonth(){

        $month = $this->_month + 1;
        $year = $this->_year;

        if($month > 12){

            $month = 1;
            $year += 1;
        }

        return new Month($month, $year);
    }

    public function previousMonth(){

        $month = $this->_month - 1;
        $year = $this->_year;

        if($month < 1){

            $month = 12;
            $year -= 1;
        }

        return new Month($month, $year);
    }
}