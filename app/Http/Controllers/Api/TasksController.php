<?php

namespace App\Http\Controllers\Api;

use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;

/**
 * @group Tasks management
 *
 * APIs for managing tasks
 */

class TasksController extends Controller
{
    /**
     * Display a listing of the tasks.
     * 
     * @authenticated
     * 
     * @responseFile responses/tasks.get.json
     * @responseFile 401 responses/401.json
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TaskResource::collection(auth()->user()->tasks()->with('creator')->latest()->paginate(4));
    }



    /**
     * Store a newly created resource in storage.
     * 
     * @authenticated
     * 
     * @bodyParam title string required title of the task. Example: my first task
     * @bodyParam description text description of the task
     * @bodyParam due string date string. Example: next friday
     * 
     * @responseFile responses/tasks.store.json
     * @responseFile 401 responses/401.json
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);

        $input = $request->all();

        if ($request->has('due')) {
            $input['due'] = Carbon::parse($request->due)->toDateTimeString();
        }

        $task = auth()->user()->tasks()->create($input);

        return new TaskResource($task->load('creator'));
    }

    /**
     * Display the specified task.
     * 
     * @authenticated
     * 
     * @urlParam task required id of the task
     * 
     * @response {"data":{"id":5,"user_id":1,"title":"sec task","description":"desc of sec task","due":"2019-12-15 00:00:00","created_at":"2019-12-10 23:57:19","updated_at":"2019-12-10 23:57:19","creator":{"id":1,"name":"hitesh","email":"hitesh@gmail.com","email_verified_at":null,"created_at":"2019-10-17 03:46:51","updated_at":"2019-10-17 03:46:51"}}}
     * @responseFile 401 responses/401.json
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return new TaskResource($task->load('creator'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);

        $input = $request->all();

        if ($request->has('due')) {
            $input['due'] = Carbon::parse($request->due)->toDateTimeString();
        }

        $task->update($input);

        return new TaskResource($task->load('creator'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return response(['message' => 'Deleted!']);
    }
}
