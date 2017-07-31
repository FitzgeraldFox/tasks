<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks_list = Task::orderBy('id', 'desc')
            ->take(1000)
            ->get();
        $jsonTasks = [];
        $tasks_list->each(function($item, $key) use (&$jsonTasks){
            $jsonTasks[$item->id] = [
                'date'  => $item->date,
                'title' => $item->title
            ];
        });
        return $jsonTasks;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'title'       => 'bail|required|max:500',
            'date'        => 'bail|required|max:30|date_format:d.m.Y H:i',
            'author'      => 'bail|required|max:100',
            'status'      => 'bail|required|max:100',
            'description' => 'bail|required'
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->date = $request->date;
        $task->author = $request->author;
        $task->status = $request->status;
        $task->description = $request->description;
        $task->save();

        return $task;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return $task;
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
        $this->validate($request, [
            'title'       => 'max:500',
            'date'        => 'max:30|date_format:d.m.Y H:i',
            'author'      => 'max:100',
            'status'      => 'max:100'
        ]);

        $task->update([
            'title'  => $request->title,
            'date'   => $request->date,
            'author' => $request->author,
            'status' => $request->status,
        ]);

        return $task;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        return $task->delete();
    }

    public function search(Request $request)
    {
        if (empty($request->str)) {
            return null;
        }

        $tasks = Task::search($request->str, null, true, true)->get();

        return $tasks;
    }

    public function getTasksTable(Request $request)
    {
        return response()->view('taskTable', ['tasks' => $this->search($request)]);
    }

    public function searchResultsPage(Request $request)
    {
        return response()->view('taskList', ['tasks' => $this->search($request), 'searchStr' => $request->str, 'searchTitle' => 'Результаты поиска', 'returnToMain' => true]);
    }
}
