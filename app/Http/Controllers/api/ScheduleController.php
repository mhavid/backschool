<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Transformers\Json;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = [
            [
                'name' => 'X',
                'jam' => [
                    [
                        'status' => 0,
                        'jam' => '07.00'
                    ],[
                        'status' => 0,
                        'jam' => '08.00'
                    ],[
                        'status' => 1,
                        'jam' => '09.00'
                    ],[
                        'status' => 0,
                        'jam' => '10.00'
                    ]
                ]
            ],[
                'name' => 'X1',
                'jam' => [
                    [
                        'status' => 0,
                        'jam' => '07.00'
                    ],[
                        'status' => 0,
                        'jam' => '08.00'
                    ],[
                        'status' => 1,
                        'jam' => '09.00'
                    ],[
                        'status' => 0,
                        'jam' => '10.00'
                    ]
                ]
            ]
        ];

        dd($class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_school = decrypt($request->id_school);
        try {
            $schedule = Schedule::create([
                'id_school' => $id_school,
                'id_class' => $request->id_class,
                // 'id_course' => $request->id_course,
                // 'id_teacher' => $request->id_teacher,
                'day' => $request->day,
                'time_start' => $request->time_start,
                'time_end' => $request->time_end,
                'status' => $request->status ?? 0,
                'created_at' => now()
            ]);
            $data = Schedule::where('id_class', $request->id_class)
                            ->where('id_school', $id_school)
                            ->get();

            return Json::response($data);

        } catch (\Throwable $th) {
            if(env('APP_DEBUG') == true) return Json::response($th->getMessage());
            return Json::response([], 'Error Server', 500);
        }
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
