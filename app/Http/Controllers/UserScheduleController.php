<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSchedule;
use App\Models\User;
use App\Models\Schedule;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;


class UserScheduleController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userSchedules = DB::select("SELECT 
            CONCAT(users.firstname,' ',users.lastname) as student_name,
            CONCAT(lecturers.firstname,' ',lecturers.lastname) as lecturer_name,
            user_schedules.user_id,
            user_schedules.schedule_id,
            schedules.start_date,
            schedules.end_date,
            subjects.name as subject_name
        FROM `user_schedules`
        INNER JOIN users ON user_schedules.user_id = users.id
        INNER JOIN schedules ON user_schedules.schedule_id = schedules.id
        INNER JOIN users as lecturers ON schedules.lecturer_user_id = lecturers.id
        INNER JOIN subjects ON schedules.subject_id = subjects.id");

        return view('userSchedules.index' , ['userSchedules' => $userSchedules]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schedules = DB::select("SELECT schedules.id, CONCAT(subjects.name,' ',schedules.start_date) as name FROM schedules INNER JOIN subjects ON schedules.subject_id = subjects.id");
        $students = User::where('user_type_id','1')->select('id',DB::raw('CONCAT(firstname," ",lastname) AS name'))->get();
        
        return view('userSchedules.create',['schedules' => $schedules, 'students' => $students]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $created = UserSchedule::create([
            'user_id' => $request->input('user_id'),
            'schedule_id' => $request->input('schedule_id'),
            'created_at' => date('Y-m-d H:i:s')
        ]);
        return redirect()->route('userSchedules.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$userId)
    {
        
        $schedules = DB::select("SELECT schedules.id, CONCAT(subjects.name,' ',schedules.start_date) as name FROM schedules INNER JOIN subjects ON schedules.subject_id = subjects.id");
        $student = User::find($userId);
        $schedule_id = $request->input('scheduleId');
        
        return view('userSchedules.edit',['schedules' => $schedules, 'student' => $student, 'schedule_id' => $schedule_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userSchedule = UserSchedule::where('user_id',$id)
                                    ->where('schedule_id',$request->input('old_schedule_id'))
                                    ->update(['schedule_id'=>$request->input('schedule_id')]);
        return redirect()->route('userSchedules.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $userSchedule = UserSchedule::where('user_id',$id)
                                    ->where('schedule_id',$request->input('scheduleId'))
                                    ->delete();
        return redirect()->route('userSchedules.index');
    }
}
