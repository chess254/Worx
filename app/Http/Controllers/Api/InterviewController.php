<?php

namespace App\Http\Controllers\Api;

use App\utils\generateTimeSlots;
use App\EducationDetails;
use App\Interview;
use App\Application;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use \App\DateTime\DateTime;
use \DateTime;
use App\Carbon;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    // public static function makeFromApplication(Application $application): self
    // {
    //     // $application = Application::find($request->application_id)->first();
    //     return self::make([
    //         'job_id' => $applicatio->job_id,
    //         'application_id' => $application->id,
    //         'company_id' => $application->company_id,
    //     ]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EducationDetails  $educationDetails
     * @return \Illuminate\Http\Response
     */
    public function show(EducationDetails $educationDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EducationDetails  $educationDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(EducationDetails $educationDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EducationDetails  $educationDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EducationDetails $educationDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EducationDetails  $educationDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(EducationDetails $educationDetails)
    {
        //
    }

    // public function generateTimeSlots(DateTime $period_start, DateTime $period_end, DateInterval $interval, $occupied_slots){
    //     $pitchStart = new DateTime('2018-06-11 00:00');
    //     $pitchClose = new DateTime('2018-07-15 23:59');
    //     $startdate = clone $pitchStart;
    //     $enddate = clone $pitchClose->add(new DateInterval('P1D')); //addone day    

    //     //games changes to unavailable slots
    //     $games =  [{"start":"2020-10-20 00:00","end":"2020-10-20 07:00"},{"start":"2020-10-20 18:00","end":"2020-10-20 23:59"},{"start":"2020-10-21 00:00","end":"2020-10-21 07:00"},{"start":"2020-10-21 18:00","end":"2020-10-21 23:59"},{"start":"2020-10-22 00:00","end":"2020-10-22 07:00"},{"start":"2020-10-22 18:00","end":"2020-10-22 23:59"},{"start":"2020-10-23 00:00","end":"2020-10-23 07:00"},{"start":"2020-10-23 18:00","end":"2020-10-23 23:59"},{"start":"2020-10-24 00:00","end":"2020-10-24 07:00"},{"start":"2020-10-24 18:00","end":"2020-10-24 23:59"},{"start":"2020-10-25 00:00","end":"2020-10-25 07:00"},{"start":"2020-10-25 18:00","end":"2020-10-25 23:59"},{"start":"2020-10-26 00:00","end":"2020-10-26 07:00"},{"start":"2020-10-26 18:00","end":"2020-10-26 23:59"},{"start":"2020-10-27 00:00","end":"2020-10-27 07:00"},{"start":"2020-10-27 18:00","end":"2020-10-27 23:59"},{"start":"2020-10-28 00:00","end":"2020-10-28 07:00"},{"start":"2020-10-28 18:00","end":"2020-10-28 23:59"},{"start":"2020-10-29 00:00","end":"2020-10-29 07:00"},{"start":"2020-10-29 18:00","end":"2020-10-29 23:59"},{"start":"2020-10-30 00:00","end":"2020-10-30 07:00"},{"start":"2020-10-30 18:00","end":"2020-10-30 23:59"},{"start":"2020-10-31 00:00","end":"2020-10-31 07:00"},{"start":"2020-10-31 18:00","end":"2020-10-31 23:59"},{"start":"2020-11-01 00:00","end":"2020-11-01 07:00"},{"start":"2020-11-01 18:00","end":"2020-11-01 23:59"},{"start":"2020-11-02 00:00","end":"2020-11-02 07:00"},{"start":"2020-11-02 18:00","end":"2020-11-02 23:59"},{"start":"2020-11-03 00:00","end":"2020-11-03 07:00"},{"start":"2020-11-03 18:00","end":"2020-11-03 23:59"},{"start":"2020-11-04 00:00","end":"2020-11-04 07:00"},{"start":"2020-11-04 18:00","end":"2020-11-04 23:59"},{"start":"2020-11-05 00:00","end":"2020-11-05 07:00"},{"start":"2020-11-05 18:00","end":"2020-11-05 23:59"},{"start":"2020-11-06 00:00","end":"2020-11-06 07:00"},{"start":"2020-11-06 18:00","end":"2020-11-06 23:59"},{"start":"2020-11-07 00:00","end":"2020-11-07 07:00"},{"start":"2020-11-07 18:00","end":"2020-11-07 23:59"},{"start":"2020-11-08 00:00","end":"2020-11-08 07:00"},{"start":"2020-11-08 18:00","end":"2020-11-08 23:59"},{"start":"2020-11-09 00:00","end":"2020-11-09 07:00"},{"start":"2020-11-09 18:00","end":"2020-11-09 23:59"},{"start":"2020-11-10 00:00","end":"2020-11-10 07:00"},{"start":"2020-11-10 18:00","end":"2020-11-10 23:59"},{"start":"2020-11-11 00:00","end":"2020-11-11 07:00"},{"start":"2020-11-11 18:00","end":"2020-11-11 23:59"},{"start":"2020-11-12 00:00","end":"2020-11-12 07:00"},{"start":"2020-11-12 18:00","end":"2020-11-12 23:59"},{"start":"2020-11-13 00:00","end":"2020-11-13 07:00"},{"start":"2020-11-13 18:00","end":"2020-11-13 23:59"},{"start":"2020-11-14 00:00","end":"2020-11-14 07:00"},{"start":"2020-11-14 18:00","end":"2020-11-14 23:59"},{"start":"2020-11-15 00:00","end":"2020-11-15 07:00"},{"start":"2020-11-15 18:00","end":"2020-11-15 23:59"},{"start":"2020-11-16 00:00","end":"2020-11-16 07:00"},{"start":"2020-11-16 18:00","end":"2020-11-16 23:59"},{"start":"2020-11-17 00:00","end":"2020-11-17 07:00"},{"start":"2020-11-17 18:00","end":"2020-11-17 23:59"},{"start":"2020-11-18 00:00","end":"2020-11-18 07:00"},{"start":"2020-11-18 18:00","end":"2020-11-18 23:59"},{"start":"2020-11-19 00:00","end":"2020-11-19 07:00"},{"start":"2020-11-19 18:00","end":"2020-11-19 23:59"},{"start":"2020-11-20 00:00","end":"2020-11-20 07:00"},{"start":"2020-11-20 18:00","end":"2020-11-20 23:59"},{"start":"2020-11-21 00:00","end":"2020-11-21 07:00"},{"start":"2020-11-21 18:00","end":"2020-11-21 23:59"},{"start":"2020-11-22 00:00","end":"2020-11-22 07:00"},{"start":"2020-11-22 18:00","end":"2020-11-22 23:59"},{"start":"2020-11-23 00:00","end":"2020-11-23 07:00"},{"start":"2020-11-23 18:00","end":"2020-11-23 23:59"},{"start":"2020-11-24 00:00","end":"2020-11-24 07:00"},{"start":"2020-11-24 18:00","end":"2020-11-24 23:59"},{"start":"2020-11-25 00:00","end":"2020-11-25 07:00"},{"start":"2020-11-25 18:00","end":"2020-11-25 23:59"},{"start":"2020-11-26 00:00","end":"2020-11-26 07:00"},{"start":"2020-11-26 18:00","end":"2020-11-26 23:59"},{"start":"2020-11-27 00:00","end":"2020-11-27 07:00"},{"start":"2020-11-27 18:00","end":"2020-11-27 23:59"},{"start":"2020-11-28 00:00","end":"2020-11-28 07:00"},{"start":"2020-11-28 18:00","end":"2020-11-28 23:59"},{"start":"2020-11-29 00:00","end":"2020-11-29 07:00"},{"start":"2020-11-29 18:00","end":"2020-11-29 23:59"},{"start":"2020-11-30 00:00","end":"2020-11-30 07:00"},{"start":"2020-11-30 18:00","end":"2020-11-30 23:59"},{"start":"2020-12-01 00:00","end":"2020-12-01 07:00"},{"start":"2020-12-01 18:00","end":"2020-12-01 23:59"},{"start":"2020-12-02 00:00","end":"2020-12-02 07:00"},{"start":"2020-12-02 18:00","end":"2020-12-02 23:59"},{"start":"2020-12-03 00:00","end":"2020-12-03 07:00"},{"start":"2020-12-03 18:00","end":"2020-12-03 23:59"},{"start":"2020-12-04 00:00","end":"2020-12-04 07:00"},{"start":"2020-12-04 18:00","end":"2020-12-04 23:59"},{"start":"2020-12-05 00:00","end":"2020-12-05 07:00"},{"start":"2020-12-05 18:00","end":"2020-12-05 23:59"},{"start":"2020-12-06 00:00","end":"2020-12-06 07:00"},{"start":"2020-12-06 18:00","end":"2020-12-06 23:59"},{"start":"2020-12-07 00:00","end":"2020-12-07 07:00"},{"start":"2020-12-07 18:00","end":"2020-12-07 23:59"},{"start":"2020-12-08 00:00","end":"2020-12-08 07:00"},{"start":"2020-12-08 18:00","end":"2020-12-08 23:59"},{"start":"2020-12-09 00:00","end":"2020-12-09 07:00"},{"start":"2020-12-09 18:00","end":"2020-12-09 23:59"},{"start":"2020-12-10 00:00","end":"2020-12-10 07:00"},{"start":"2020-12-10 18:00","end":"2020-12-10 23:59"},{"start":"2020-12-11 00:00","end":"2020-12-11 07:00"},{"start":"2020-12-11 18:00","end":"2020-12-11 23:59"},{"start":"2020-12-12 00:00","end":"2020-12-12 07:00"},{"start":"2020-12-12 18:00","end":"2020-12-12 23:59"},{"start":"2020-12-13 00:00","end":"2020-12-13 07:00"},{"start":"2020-12-13 18:00","end":"2020-12-13 23:59"},{"start":"2020-12-14 00:00","end":"2020-12-14 07:00"},{"start":"2020-12-14 18:00","end":"2020-12-14 23:59"},{"start":"2020-12-15 00:00","end":"2020-12-15 07:00"},{"start":"2020-12-15 18:00","end":"2020-12-15 23:59"},{"start":"2020-12-16 00:00","end":"2020-12-16 07:00"},{"start":"2020-12-16 18:00","end":"2020-12-16 23:59"},{"start":"2020-12-17 00:00","end":"2020-12-17 07:00"},{"start":"2020-12-17 18:00","end":"2020-12-17 23:59"},{"start":"2020-12-18 00:00","end":"2020-12-18 07:00"},{"start":"2020-12-18 18:00","end":"2020-12-18 23:59"},{"start":"2020-12-19 00:00","end":"2020-12-19 07:00"},{"start":"2020-12-19 18:00","end":"2020-12-19 23:59"},{"start":"2020-12-20 00:00","end":"2020-12-20 07:00"},{"start":"2020-12-20 18:00","end":"2020-12-20 23:59"},{"start":"2020-12-21 00:00","end":"2020-12-21 07:00"},{"start":"2020-12-21 18:00","end":"2020-12-21 23:59"},{"start":"2020-12-22 00:00","end":"2020-12-22 07:00"},{"start":"2020-12-22 18:00","end":"2020-12-22 23:59"},{"start":"2020-12-23 00:00","end":"2020-12-23 07:00"},{"start":"2020-12-23 18:00","end":"2020-12-23 23:59"},{"start":"2020-12-24 00:00","end":"2020-12-24 07:00"},{"start":"2020-12-24 18:00","end":"2020-12-24 23:59"},{"start":"2020-12-25 00:00","end":"2020-12-25 07:00"},{"start":"2020-12-25 18:00","end":"2020-12-25 23:59"},{"start":"2020-12-26 00:00","end":"2020-12-26 07:00"},{"start":"2020-12-26 18:00","end":"2020-12-26 23:59"}]

    //     [
    //         [
    //             'start' => new DateTime('2018-06-11 15:00 '),
    //             'end' => new DateTime('2018-06-11 16:00 ')
    //         ],
    //         [
    //             'start' => new DateTime('2018-06-11 10:30 AM'),
    //             'end' => new DateTime('2018-06-11 10:43 AM')
    //         ],
    //         [
    //             'start' => new DateTime('2018-06-11 11:00 AM'),
    //             'end' => new DateTime('2018-06-11 11:55 AM')
    //         ]
    //     ];



    //     //This is the time slots interval, should change to interview duration
    //     $slot_interval = new DateInterval("PT60M"); //60 Minutes

    //     //Get all slots between $pitchStart and $pitchClose
    //     $all_slots = [];

    //     $slots_start = $pitchStart;
    //     $slots_end = $pitchClose;

    //     //This is how you can generate the intervals based on $pitchStart / $pitchClose and $slot_interval
    //     while($slots_start->getTimestamp() < $slots_end->getTimestamp()) {
    //         $all_slots[] = [
    //             'start' => clone $slots_start, 
    //             'end' => (clone $slots_start)->add($slot_interval)
    //         ];
    //         $slots_start->add($slot_interval);
    //     }

    //     function slots_used_by_game($slots, $games, $slot_interval) {
    //         $slots_taken = [];

    //         foreach($games as $game){
    //             $game_duration = $game['end']->diff($game['start']);
    //             $game_duration_in_minutes = (float)($game_duration->h * 60 + $game_duration->i);

    //             $number_of_slots = ceil($game_duration_in_minutes / $slot_interval);

    //             foreach($slots as $key => $slot) {
    //                 if($game['start'] <= $slot['start']) {
    //                     $slots_taken = array_merge($slots_taken, array_slice($slots, $key, $number_of_slots));
    //                     break;
    //                 }
    //             }
    //         }
    //         return $slots_taken;
    //     }

    //     $used_slots = slots_used_by_game($all_slots, $games, 60);

    //     //Print them all for testing
    //     foreach($all_slots as $slot) {
    //         echo $slot['start']->format('Y-m-d H:i'). ' - '.$slot['end']->format('Y-m-d H:i');
    //         echo ((in_array($slot, $used_slots)) ? ' ::NOT AVAILABLE' : ' ::AVAILABLE').PHP_EOL;
    //         // echo PHP_EOL;
    //     }


    //     //get an arrays of dates between two dates
    //     $period = new DatePeriod(
    //         $startdate,
    //         new DateInterval('P1D'),
    //         $enddate
    //     );
    //     foreach ($period as $key => $value) {
    //         echo ($value->format('Y-m-d H:i')).PHP_EOL;       
    //     }

    //     $closed_biz_hours = [];
    // }

    public function scheduleInterview(Request $request){
        $unavailable_slots = $request->unavailable_slots ? json_decode($request->unavailable_slots, true) : [];
        //find a way to make sure there are always applications to schedule, or provide feedback to user that there are no applications in selected for scheduling
        $applications = $request->applications ? explode(",", $request->applications) : [];
        $interview_duration = $request->duration;
        $closing_date = $request->closing_date;
        $opening_date = $request->opening_date;
        $opening_hour = $request->opening_hour;
        $closing_hour = $request->closing_hour;
        $job_id = $request->job_id;
        $available_slots = $request->available_slots ? json_decode($request->input('available_slots'), true) : [];

        $index=0;
        foreach($applications as $application){
            if($available_slots[$index]){
                Interview::createFromApplication(Application::find($application), new DateTime($available_slots[$index]['start']),  new DateTime($available_slots[$index]['end']));
                $index++;
            }
        }

        //generate available slots
        // $testslots = new generateTimeSlots($opening_date, $closing_date, $interview_duration, $unavailable_slots);
        // return response()->json($testslots);

        //if available slots< applicants selected for interview, return with error slots not enough? allocate more days/time for interview
        //assign each available slot to an application
        

        //send feedback, with slots assigned optionally send group email to applicants scheduled for interview with details of the interview

        // $status = $request->recepients;
        // $applicant_user_ids = ($status == "all") ? Job::find($job)->applications()->pluck('user_id') : Job::find($job)->applications()->where('status',$status)->pluck('user_id');

        return $available_slots[0]['start'];

    }
}
