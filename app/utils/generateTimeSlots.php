<?php
namespace App\utils;

use DateInterval;
use DateTime;
use DateTimeImmutable;
use Carbon\Carbon;
use Spatie\Period\Period;
use Spatie\Period\PeriodCollection;
use Spatie\Period\Precision;
use Spatie\Period\Visualizer;



class generateTimeSlots{
    public $start;
    public $stop;
    public $period;
    public $pitchStart; //= new DateTime('2018-06-11 00:00');
    public $pitchClose; // = new DateTime('2018-07-15 23:59');
    // public $startdate = clone $pitchStart;
    // public $enddate = clone $pitchClose->add(new DateInterval('P1D'));
    public $occupied =[]; //addone day  
    public $unoccupied =[];

    public $slot_interval;
    public $duration;
    public $all_slots;
    public $slots_taken;
    public $available_slots;
    public $unavailable_slots;
  
    function __construct($period_start, $period_end, $interval, $occupied_slots) {
        
        $this->pitchStart = new DateTimeImmutable($period_start);
        $this->pitchClose = new DateTimeImmutable($period_end);
        $this->start = new DateTime($period_start);
        $this->stop = new DateTime($period_end);
        $this->period = new Period($this->pitchStart, $this->pitchClose, Precision::MINUTE);
        // $this->period = Period::make('2018-01-01', '2018-01-31');
        // $this->period =$this->period->getStart();

        //set occupied
        self::generateOccupiedSlots($occupied_slots);

        //set unoccupied
        self::generateUnOccupiedSlots($this->occupied); 

    //   $this->games = $occupied_slots.map($slot=> [new DateTimeImmutable($slot[0]) );
    
    //   foreach($occupied_slots as $i){
    //       $games = [];
    //     array_map( function($slot){
    //         array_merge($games, new DateTimeImmutable($slot));
    //         return new DateTimeImmutable($slot);
    //     },$i);
    //   }
      $this->slot_interval = new DateInterval("PT60M");
      $this->duration = $interval;
      self::initializeAllSlots($this->pitchStart, $this->pitchClose , $this->duration);
      self::slots_used_by_game($this->all_slots, $this->games, $this->slot_interval);
      self::printSlots();
    }  

    function generateOccupiedSlots($occupied_slots){
        // $games=[];
        foreach($occupied_slots as $i){
            
        array_push($this->occupied,array_map( function($slot){
            //   array_push($this->games, [new DateTimeImmutable($slot)]);
            return new DateTimeImmutable($slot);
        },$i));
        }
        // $this->games = $games;
    }

    //generate unoccupied slots
    function generateUnOccupiedSlots($occupied){
        $occupied = collect($occupied);
        $event_periods = $occupied->map(function($event) {
            // return Period::make($event[0]->format("Y-m-d H:i:s"), $event[1]->format("Y-m-d H:i:s"));

            return Period::make($event[0]->format("Y-m-d H:i:s"), $event[1]->format("Y-m-d H:i:s"), Precision::MINUTE);
       });
        $collection =  new PeriodCollection(...$event_periods);
        $gaps = $collection->boundaries();
        $this->unoccupied = $gaps;
        // foreach ($occupied as $period) {
        //     // $this->unoccupied->push($period)
        //    $new = Period::make($period[0], $period[1], Precision::MINUTE);
        //     array_push($this->unoccupied, $new);
        // }
        // $this->unoccupied = $this->unoccupied->gaps();
        // $visualizer = new Visualizer(["width" => 10]);

        // $this->unoccupied = $visualizer->visualize(...$gaps);
    }

    //games changes to unavailable slots
    //$games =  [{"start":"2020-10-20 00:00","end":"2020-10-20 07:00"},{"start":"2020-10-20 18:00","end":"2020-10-20 23:59"},{"start":"2020-10-21 00:00","end":"2020-10-21 07:00"},{"start":"2020-10-21 18:00","end":"2020-10-21 23:59"},{"start":"2020-10-22 00:00","end":"2020-10-22 07:00"},{"start":"2020-10-22 18:00","end":"2020-10-22 23:59"},{"start":"2020-10-23 00:00","end":"2020-10-23 07:00"},{"start":"2020-10-23 18:00","end":"2020-10-23 23:59"},{"start":"2020-10-24 00:00","end":"2020-10-24 07:00"},{"start":"2020-10-24 18:00","end":"2020-10-24 23:59"},{"start":"2020-10-25 00:00","end":"2020-10-25 07:00"},{"start":"2020-10-25 18:00","end":"2020-10-25 23:59"},{"start":"2020-10-26 00:00","end":"2020-10-26 07:00"},{"start":"2020-10-26 18:00","end":"2020-10-26 23:59"},{"start":"2020-10-27 00:00","end":"2020-10-27 07:00"},{"start":"2020-10-27 18:00","end":"2020-10-27 23:59"},{"start":"2020-10-28 00:00","end":"2020-10-28 07:00"},{"start":"2020-10-28 18:00","end":"2020-10-28 23:59"},{"start":"2020-10-29 00:00","end":"2020-10-29 07:00"},{"start":"2020-10-29 18:00","end":"2020-10-29 23:59"},{"start":"2020-10-30 00:00","end":"2020-10-30 07:00"},{"start":"2020-10-30 18:00","end":"2020-10-30 23:59"},{"start":"2020-10-31 00:00","end":"2020-10-31 07:00"},{"start":"2020-10-31 18:00","end":"2020-10-31 23:59"},{"start":"2020-11-01 00:00","end":"2020-11-01 07:00"},{"start":"2020-11-01 18:00","end":"2020-11-01 23:59"},{"start":"2020-11-02 00:00","end":"2020-11-02 07:00"},{"start":"2020-11-02 18:00","end":"2020-11-02 23:59"},{"start":"2020-11-03 00:00","end":"2020-11-03 07:00"},{"start":"2020-11-03 18:00","end":"2020-11-03 23:59"},{"start":"2020-11-04 00:00","end":"2020-11-04 07:00"},{"start":"2020-11-04 18:00","end":"2020-11-04 23:59"},{"start":"2020-11-05 00:00","end":"2020-11-05 07:00"},{"start":"2020-11-05 18:00","end":"2020-11-05 23:59"},{"start":"2020-11-06 00:00","end":"2020-11-06 07:00"},{"start":"2020-11-06 18:00","end":"2020-11-06 23:59"},{"start":"2020-11-07 00:00","end":"2020-11-07 07:00"},{"start":"2020-11-07 18:00","end":"2020-11-07 23:59"},{"start":"2020-11-08 00:00","end":"2020-11-08 07:00"},{"start":"2020-11-08 18:00","end":"2020-11-08 23:59"},{"start":"2020-11-09 00:00","end":"2020-11-09 07:00"},{"start":"2020-11-09 18:00","end":"2020-11-09 23:59"},{"start":"2020-11-10 00:00","end":"2020-11-10 07:00"},{"start":"2020-11-10 18:00","end":"2020-11-10 23:59"},{"start":"2020-11-11 00:00","end":"2020-11-11 07:00"},{"start":"2020-11-11 18:00","end":"2020-11-11 23:59"},{"start":"2020-11-12 00:00","end":"2020-11-12 07:00"},{"start":"2020-11-12 18:00","end":"2020-11-12 23:59"},{"start":"2020-11-13 00:00","end":"2020-11-13 07:00"},{"start":"2020-11-13 18:00","end":"2020-11-13 23:59"},{"start":"2020-11-14 00:00","end":"2020-11-14 07:00"},{"start":"2020-11-14 18:00","end":"2020-11-14 23:59"},{"start":"2020-11-15 00:00","end":"2020-11-15 07:00"},{"start":"2020-11-15 18:00","end":"2020-11-15 23:59"},{"start":"2020-11-16 00:00","end":"2020-11-16 07:00"},{"start":"2020-11-16 18:00","end":"2020-11-16 23:59"},{"start":"2020-11-17 00:00","end":"2020-11-17 07:00"},{"start":"2020-11-17 18:00","end":"2020-11-17 23:59"},{"start":"2020-11-18 00:00","end":"2020-11-18 07:00"},{"start":"2020-11-18 18:00","end":"2020-11-18 23:59"},{"start":"2020-11-19 00:00","end":"2020-11-19 07:00"},{"start":"2020-11-19 18:00","end":"2020-11-19 23:59"},{"start":"2020-11-20 00:00","end":"2020-11-20 07:00"},{"start":"2020-11-20 18:00","end":"2020-11-20 23:59"},{"start":"2020-11-21 00:00","end":"2020-11-21 07:00"},{"start":"2020-11-21 18:00","end":"2020-11-21 23:59"},{"start":"2020-11-22 00:00","end":"2020-11-22 07:00"},{"start":"2020-11-22 18:00","end":"2020-11-22 23:59"},{"start":"2020-11-23 00:00","end":"2020-11-23 07:00"},{"start":"2020-11-23 18:00","end":"2020-11-23 23:59"},{"start":"2020-11-24 00:00","end":"2020-11-24 07:00"},{"start":"2020-11-24 18:00","end":"2020-11-24 23:59"},{"start":"2020-11-25 00:00","end":"2020-11-25 07:00"},{"start":"2020-11-25 18:00","end":"2020-11-25 23:59"},{"start":"2020-11-26 00:00","end":"2020-11-26 07:00"},{"start":"2020-11-26 18:00","end":"2020-11-26 23:59"},{"start":"2020-11-27 00:00","end":"2020-11-27 07:00"},{"start":"2020-11-27 18:00","end":"2020-11-27 23:59"},{"start":"2020-11-28 00:00","end":"2020-11-28 07:00"},{"start":"2020-11-28 18:00","end":"2020-11-28 23:59"},{"start":"2020-11-29 00:00","end":"2020-11-29 07:00"},{"start":"2020-11-29 18:00","end":"2020-11-29 23:59"},{"start":"2020-11-30 00:00","end":"2020-11-30 07:00"},{"start":"2020-11-30 18:00","end":"2020-11-30 23:59"},{"start":"2020-12-01 00:00","end":"2020-12-01 07:00"},{"start":"2020-12-01 18:00","end":"2020-12-01 23:59"},{"start":"2020-12-02 00:00","end":"2020-12-02 07:00"},{"start":"2020-12-02 18:00","end":"2020-12-02 23:59"},{"start":"2020-12-03 00:00","end":"2020-12-03 07:00"},{"start":"2020-12-03 18:00","end":"2020-12-03 23:59"},{"start":"2020-12-04 00:00","end":"2020-12-04 07:00"},{"start":"2020-12-04 18:00","end":"2020-12-04 23:59"},{"start":"2020-12-05 00:00","end":"2020-12-05 07:00"},{"start":"2020-12-05 18:00","end":"2020-12-05 23:59"},{"start":"2020-12-06 00:00","end":"2020-12-06 07:00"},{"start":"2020-12-06 18:00","end":"2020-12-06 23:59"},{"start":"2020-12-07 00:00","end":"2020-12-07 07:00"},{"start":"2020-12-07 18:00","end":"2020-12-07 23:59"},{"start":"2020-12-08 00:00","end":"2020-12-08 07:00"},{"start":"2020-12-08 18:00","end":"2020-12-08 23:59"},{"start":"2020-12-09 00:00","end":"2020-12-09 07:00"},{"start":"2020-12-09 18:00","end":"2020-12-09 23:59"},{"start":"2020-12-10 00:00","end":"2020-12-10 07:00"},{"start":"2020-12-10 18:00","end":"2020-12-10 23:59"},{"start":"2020-12-11 00:00","end":"2020-12-11 07:00"},{"start":"2020-12-11 18:00","end":"2020-12-11 23:59"},{"start":"2020-12-12 00:00","end":"2020-12-12 07:00"},{"start":"2020-12-12 18:00","end":"2020-12-12 23:59"},{"start":"2020-12-13 00:00","end":"2020-12-13 07:00"},{"start":"2020-12-13 18:00","end":"2020-12-13 23:59"},{"start":"2020-12-14 00:00","end":"2020-12-14 07:00"},{"start":"2020-12-14 18:00","end":"2020-12-14 23:59"},{"start":"2020-12-15 00:00","end":"2020-12-15 07:00"},{"start":"2020-12-15 18:00","end":"2020-12-15 23:59"},{"start":"2020-12-16 00:00","end":"2020-12-16 07:00"},{"start":"2020-12-16 18:00","end":"2020-12-16 23:59"},{"start":"2020-12-17 00:00","end":"2020-12-17 07:00"},{"start":"2020-12-17 18:00","end":"2020-12-17 23:59"},{"start":"2020-12-18 00:00","end":"2020-12-18 07:00"},{"start":"2020-12-18 18:00","end":"2020-12-18 23:59"},{"start":"2020-12-19 00:00","end":"2020-12-19 07:00"},{"start":"2020-12-19 18:00","end":"2020-12-19 23:59"},{"start":"2020-12-20 00:00","end":"2020-12-20 07:00"},{"start":"2020-12-20 18:00","end":"2020-12-20 23:59"},{"start":"2020-12-21 00:00","end":"2020-12-21 07:00"},{"start":"2020-12-21 18:00","end":"2020-12-21 23:59"},{"start":"2020-12-22 00:00","end":"2020-12-22 07:00"},{"start":"2020-12-22 18:00","end":"2020-12-22 23:59"},{"start":"2020-12-23 00:00","end":"2020-12-23 07:00"},{"start":"2020-12-23 18:00","end":"2020-12-23 23:59"},{"start":"2020-12-24 00:00","end":"2020-12-24 07:00"},{"start":"2020-12-24 18:00","end":"2020-12-24 23:59"},{"start":"2020-12-25 00:00","end":"2020-12-25 07:00"},{"start":"2020-12-25 18:00","end":"2020-12-25 23:59"},{"start":"2020-12-26 00:00","end":"2020-12-26 07:00"},{"start":"2020-12-26 18:00","end":"2020-12-26 23:59"}]

    // [
    //     [
    //         'start' => new DateTime('2018-06-11 15:00 '),
    //         'end' => new DateTime('2018-06-11 16:00 ')
    //     ],
    //     [
    //         'start' => new DateTime('2018-06-11 10:30 AM'),
    //         'end' => new DateTime('2018-06-11 10:43 AM')
    //     ],
    //     [
    //         'start' => new DateTime('2018-06-11 11:00 AM'),
    //         'end' => new DateTime('2018-06-11 11:55 AM')
    //     ]
    // ];



    //This is the time slots interval, should change to interview duration
    //$slot_interval = new DateInterval("PT60M"); //60 Minutes

    //Get all slots between $pitchStart and $pitchClose

    function initializeAllSlots($start, $stop, $slot_interval){
        // $start = new DateTime($start);
        // $stop= new DateTime($stop);
        $all_slots = [];
        ini_set('memory_limit', '-1');
        while($start->getTimestamp() < $stop->getTimestamp()) {
            $all_slots[] = [
                'start' => clone $start, 
                'end' => (clone $start)->add(new DateInterval("PT60M"))
            ];
            $start->add(new DateInterval("PT60M"));
        }
         $this->all_slots = $all_slots;
    }
    

    // $slots_start = $pitchStart;
    // $slots_end = $pitchClose;

    //This is how you can generate the intervals based on $pitchStart / $pitchClose and $slot_interval
    // while($slots_start->getTimestamp() < $slots_end->getTimestamp()) {
    //     $all_slots[] = [
    //         'start' => clone $slots_start, 
    //         'end' => (clone $slots_start)->add($slot_interval)
    //     ];
    //     $slots_start->add($slot_interval);
    // }

    function slots_used_by_game($slots, $games, $slot_interval) {
        $slots_taken = [];

        foreach($games as $game){
            $game_duration = Carbon::parse($game[1])->diff(Carbon::parse($game[0]));
            // $game_duration = (int)$game->end->diff((int)$game->start);
            $game_duration_in_minutes = (float)($game_duration->h * 60 + $game_duration->i);

            $number_of_slots = ceil($game_duration_in_minutes / $this->duration);

            foreach($slots as $key => $slot) {
                if($game[0] <= $slot['start']) {
                    $slots_taken = array_merge($slots_taken, array_slice($slots, $key, $number_of_slots));
                    break;
                }
            }
        }
        // return $slots_taken;
        $this->slots_taken = $slots_taken;
    }

    // $used_slots = slots_used_by_game($all_slots, $games, 60);

    //Print them all for testing
    function printSlots(){
        $available = [];
        $unavailable = [];
        foreach($this->all_slots as $slot) {
            // echo $slot['start']->format('Y-m-d H:i'). ' - '.$slot['end']->format('Y-m-d H:i');
            // echo ((in_array($this->slot, $this->used_slots)) ? ' ::NOT AVAILABLE' : ' ::AVAILABLE').PHP_EOL;
            if(in_array($slot, $this->slots_taken)){
                array_push ($unavailable, $slot);
            }else{
                array_push($available, $slot);
            }
            // echo PHP_EOL;
        }
        $this->available_slots = $available;
        $this->unavailable_slots = $unavailable;
    }


    //get an arrays of dates between two dates
    // $period = new DatePeriod(
    //     $startdate,
    //     new DateInterval('P1D'),
    //     $enddate
    // );
    // foreach ($period as $key => $value) {
    //     echo ($value->format('Y-m-d H:i')).PHP_EOL;       
    // }

    // $closed_biz_hours = [];

    // foreach ($period as $key => $value) {
    //     echo ($value->format('Y-m-d H:i')).PHP_EOL;
    //     // $closed_biz_hours.push({})       
    // }


    // [{"start":"2020-10-20 00:00","end":"2020-10-20 07:00"},{"start":"2020-10-20 18:00","end":"2020-10-20 23:59"},{"start":"2020-10-21 00:00","end":"2020-10-21 07:00"},{"start":"2020-10-21 18:00","end":"2020-10-21 23:59"},{"start":"2020-10-22 00:00","end":"2020-10-22 07:00"},{"start":"2020-10-22 18:00","end":"2020-10-22 23:59"},{"start":"2020-10-23 00:00","end":"2020-10-23 07:00"},{"start":"2020-10-23 18:00","end":"2020-10-23 23:59"},{"start":"2020-10-24 00:00","end":"2020-10-24 07:00"},{"start":"2020-10-24 18:00","end":"2020-10-24 23:59"},{"start":"2020-10-25 00:00","end":"2020-10-25 07:00"},{"start":"2020-10-25 18:00","end":"2020-10-25 23:59"},{"start":"2020-10-26 00:00","end":"2020-10-26 07:00"},{"start":"2020-10-26 18:00","end":"2020-10-26 23:59"},{"start":"2020-10-27 00:00","end":"2020-10-27 07:00"},{"start":"2020-10-27 18:00","end":"2020-10-27 23:59"},{"start":"2020-10-28 00:00","end":"2020-10-28 07:00"},{"start":"2020-10-28 18:00","end":"2020-10-28 23:59"},{"start":"2020-10-29 00:00","end":"2020-10-29 07:00"},{"start":"2020-10-29 18:00","end":"2020-10-29 23:59"},{"start":"2020-10-30 00:00","end":"2020-10-30 07:00"},{"start":"2020-10-30 18:00","end":"2020-10-30 23:59"},{"start":"2020-10-31 00:00","end":"2020-10-31 07:00"},{"start":"2020-10-31 18:00","end":"2020-10-31 23:59"},{"start":"2020-11-01 00:00","end":"2020-11-01 07:00"},{"start":"2020-11-01 18:00","end":"2020-11-01 23:59"},{"start":"2020-11-02 00:00","end":"2020-11-02 07:00"},{"start":"2020-11-02 18:00","end":"2020-11-02 23:59"},{"start":"2020-11-03 00:00","end":"2020-11-03 07:00"},{"start":"2020-11-03 18:00","end":"2020-11-03 23:59"},{"start":"2020-11-04 00:00","end":"2020-11-04 07:00"},{"start":"2020-11-04 18:00","end":"2020-11-04 23:59"},{"start":"2020-11-05 00:00","end":"2020-11-05 07:00"},{"start":"2020-11-05 18:00","end":"2020-11-05 23:59"},{"start":"2020-11-06 00:00","end":"2020-11-06 07:00"},{"start":"2020-11-06 18:00","end":"2020-11-06 23:59"},{"start":"2020-11-07 00:00","end":"2020-11-07 07:00"},{"start":"2020-11-07 18:00","end":"2020-11-07 23:59"},{"start":"2020-11-08 00:00","end":"2020-11-08 07:00"},{"start":"2020-11-08 18:00","end":"2020-11-08 23:59"},{"start":"2020-11-09 00:00","end":"2020-11-09 07:00"},{"start":"2020-11-09 18:00","end":"2020-11-09 23:59"},{"start":"2020-11-10 00:00","end":"2020-11-10 07:00"},{"start":"2020-11-10 18:00","end":"2020-11-10 23:59"},{"start":"2020-11-11 00:00","end":"2020-11-11 07:00"},{"start":"2020-11-11 18:00","end":"2020-11-11 23:59"},{"start":"2020-11-12 00:00","end":"2020-11-12 07:00"},{"start":"2020-11-12 18:00","end":"2020-11-12 23:59"},{"start":"2020-11-13 00:00","end":"2020-11-13 07:00"},{"start":"2020-11-13 18:00","end":"2020-11-13 23:59"},{"start":"2020-11-14 00:00","end":"2020-11-14 07:00"},{"start":"2020-11-14 18:00","end":"2020-11-14 23:59"},{"start":"2020-11-15 00:00","end":"2020-11-15 07:00"},{"start":"2020-11-15 18:00","end":"2020-11-15 23:59"},{"start":"2020-11-16 00:00","end":"2020-11-16 07:00"},{"start":"2020-11-16 18:00","end":"2020-11-16 23:59"},{"start":"2020-11-17 00:00","end":"2020-11-17 07:00"},{"start":"2020-11-17 18:00","end":"2020-11-17 23:59"},{"start":"2020-11-18 00:00","end":"2020-11-18 07:00"},{"start":"2020-11-18 18:00","end":"2020-11-18 23:59"},{"start":"2020-11-19 00:00","end":"2020-11-19 07:00"},{"start":"2020-11-19 18:00","end":"2020-11-19 23:59"},{"start":"2020-11-20 00:00","end":"2020-11-20 07:00"},{"start":"2020-11-20 18:00","end":"2020-11-20 23:59"},{"start":"2020-11-21 00:00","end":"2020-11-21 07:00"},{"start":"2020-11-21 18:00","end":"2020-11-21 23:59"},{"start":"2020-11-22 00:00","end":"2020-11-22 07:00"},{"start":"2020-11-22 18:00","end":"2020-11-22 23:59"},{"start":"2020-11-23 00:00","end":"2020-11-23 07:00"},{"start":"2020-11-23 18:00","end":"2020-11-23 23:59"},{"start":"2020-11-24 00:00","end":"2020-11-24 07:00"},{"start":"2020-11-24 18:00","end":"2020-11-24 23:59"},{"start":"2020-11-25 00:00","end":"2020-11-25 07:00"},{"start":"2020-11-25 18:00","end":"2020-11-25 23:59"},{"start":"2020-11-26 00:00","end":"2020-11-26 07:00"},{"start":"2020-11-26 18:00","end":"2020-11-26 23:59"},{"start":"2020-11-27 00:00","end":"2020-11-27 07:00"},{"start":"2020-11-27 18:00","end":"2020-11-27 23:59"},{"start":"2020-11-28 00:00","end":"2020-11-28 07:00"},{"start":"2020-11-28 18:00","end":"2020-11-28 23:59"},{"start":"2020-11-29 00:00","end":"2020-11-29 07:00"},{"start":"2020-11-29 18:00","end":"2020-11-29 23:59"},{"start":"2020-11-30 00:00","end":"2020-11-30 07:00"},{"start":"2020-11-30 18:00","end":"2020-11-30 23:59"},{"start":"2020-12-01 00:00","end":"2020-12-01 07:00"},{"start":"2020-12-01 18:00","end":"2020-12-01 23:59"},{"start":"2020-12-02 00:00","end":"2020-12-02 07:00"},{"start":"2020-12-02 18:00","end":"2020-12-02 23:59"},{"start":"2020-12-03 00:00","end":"2020-12-03 07:00"},{"start":"2020-12-03 18:00","end":"2020-12-03 23:59"},{"start":"2020-12-04 00:00","end":"2020-12-04 07:00"},{"start":"2020-12-04 18:00","end":"2020-12-04 23:59"},{"start":"2020-12-05 00:00","end":"2020-12-05 07:00"},{"start":"2020-12-05 18:00","end":"2020-12-05 23:59"},{"start":"2020-12-06 00:00","end":"2020-12-06 07:00"},{"start":"2020-12-06 18:00","end":"2020-12-06 23:59"},{"start":"2020-12-07 00:00","end":"2020-12-07 07:00"},{"start":"2020-12-07 18:00","end":"2020-12-07 23:59"},{"start":"2020-12-08 00:00","end":"2020-12-08 07:00"},{"start":"2020-12-08 18:00","end":"2020-12-08 23:59"},{"start":"2020-12-09 00:00","end":"2020-12-09 07:00"},{"start":"2020-12-09 18:00","end":"2020-12-09 23:59"},{"start":"2020-12-10 00:00","end":"2020-12-10 07:00"},{"start":"2020-12-10 18:00","end":"2020-12-10 23:59"},{"start":"2020-12-11 00:00","end":"2020-12-11 07:00"},{"start":"2020-12-11 18:00","end":"2020-12-11 23:59"},{"start":"2020-12-12 00:00","end":"2020-12-12 07:00"},{"start":"2020-12-12 18:00","end":"2020-12-12 23:59"},{"start":"2020-12-13 00:00","end":"2020-12-13 07:00"},{"start":"2020-12-13 18:00","end":"2020-12-13 23:59"},{"start":"2020-12-14 00:00","end":"2020-12-14 07:00"},{"start":"2020-12-14 18:00","end":"2020-12-14 23:59"},{"start":"2020-12-15 00:00","end":"2020-12-15 07:00"},{"start":"2020-12-15 18:00","end":"2020-12-15 23:59"},{"start":"2020-12-16 00:00","end":"2020-12-16 07:00"},{"start":"2020-12-16 18:00","end":"2020-12-16 23:59"},{"start":"2020-12-17 00:00","end":"2020-12-17 07:00"},{"start":"2020-12-17 18:00","end":"2020-12-17 23:59"},{"start":"2020-12-18 00:00","end":"2020-12-18 07:00"},{"start":"2020-12-18 18:00","end":"2020-12-18 23:59"},{"start":"2020-12-19 00:00","end":"2020-12-19 07:00"},{"start":"2020-12-19 18:00","end":"2020-12-19 23:59"},{"start":"2020-12-20 00:00","end":"2020-12-20 07:00"},{"start":"2020-12-20 18:00","end":"2020-12-20 23:59"},{"start":"2020-12-21 00:00","end":"2020-12-21 07:00"},{"start":"2020-12-21 18:00","end":"2020-12-21 23:59"},{"start":"2020-12-22 00:00","end":"2020-12-22 07:00"},{"start":"2020-12-22 18:00","end":"2020-12-22 23:59"},{"start":"2020-12-23 00:00","end":"2020-12-23 07:00"},{"start":"2020-12-23 18:00","end":"2020-12-23 23:59"},{"start":"2020-12-24 00:00","end":"2020-12-24 07:00"},{"start":"2020-12-24 18:00","end":"2020-12-24 23:59"},{"start":"2020-12-25 00:00","end":"2020-12-25 07:00"},{"start":"2020-12-25 18:00","end":"2020-12-25 23:59"},{"start":"2020-12-26 00:00","end":"2020-12-26 07:00"},{"start":"2020-12-26 18:00","end":"2020-12-26 23:59"}]
}