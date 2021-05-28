<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;

class SchedulesController extends Controller
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
        $schedules= Schedule::all();

        foreach ($schedules as $key => $schedule) {
            $schedules[$key]->subject_name = Subject::find($schedule->subject_id)->name;
            $lecturer = User::find($schedule->lecturer_user_id);
            $schedules[$key]->lecturer_name = $lecturer->firstname . " " . $lecturer->lastname;
            
        };
        
        return view('schedules.index',['schedules' => $schedules ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all(['id','name']);
        $lecturers = User::where('user_type_id','2')->select('id',DB::raw('CONCAT(firstname,lastname) AS name'))->get();
        return view('schedules.create',['subjects' => $subjects, 'lecturers' => $lecturers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $schedule = Schedule::create([
            'subject_id' => $request->input('subject_id'),
            'lecturer_user_id' => $request->input('lecturer_user_id'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'created_date' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route("schedules.index");
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
    public function edit(Request $request,$id)
    {
        $schedule = Schedule::find($id);
        $subjects = Subject::all(['id','name']);
        $lecturers = User::where('user_type_id','2')->select('id',DB::raw('CONCAT(firstname," ",lastname) AS name'))->get();
        $lecturer_id = $request->input('lecturerId');
        $subject_id = $request->input('subjectId');
        return view('schedules.edit',
        [
            'subjects' => $subjects, 
            'lecturers' => $lecturers,
            'lecturer_id' => $lecturer_id,
            'subject_id' => $subject_id,
            'schedule_id' => $id,
            'schedule' => $schedule,
        ]);
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
        $schedule = Schedule::find($id);
        $schedule->subject_id = $request->input('subject_id');
        $schedule->lecturer_user_id = $request->input('lecturer_user_id');
        $schedule->start_date = $request->input('start_date');
        $schedule->end_date = $request->input('end_date');

        $schedule->save();

        return redirect()->route('schedules.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule = Schedule::destroy($id);

        return redirect()->route('schedules.index');
    }

    public function viewUserSchedules($id)
    {
        $user = User::find($id);
        $schedules = $user->schedules;
        

        foreach ($schedules as $key => $schedule) {
            $schedules[$key]->subject_name = Subject::find($schedule->subject_id)->name;
            $lecturer = User::find($schedule->lecturer_user_id);
            $schedules[$key]->lecturer_name = $lecturer->firstname . " " . $lecturer->lastname;
            
        }
        return view('schedules.viewUserSchedules', ['user' => $user]);
    }
}

