<?php

use Illuminate\Database\Seeder;
use App\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 1100; $i++) {
            $task = new Task();

            $lastTaskId = Task::orderBy('id', 'desc')->pluck('id')->first();
            $lastTaskId = ($lastTaskId == null ? 0 : $lastTaskId) + 1;

            $task->title       = 'Задача '   . $lastTaskId;
            $task->author      = 'Автор '    . $lastTaskId;
            $task->status      = 'Статус '   . $lastTaskId;
            $task->description = 'Описание ' . $lastTaskId;

            $nextDay = time() + ($lastTaskId * 60 * 60);
            $task->date = date('d.m.Y H:i', $nextDay);
            $task->save();
        }
    }
}
