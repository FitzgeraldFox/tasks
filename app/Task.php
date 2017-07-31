<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Task extends Model
{
    use SearchableTrait; //Searchable is a trait for Laravel 4.2+ and Laravel 5.0 that adds a simple search function to Eloquent Models. (https://github.com/nicolaslopezj/searchable)
    public $timestamps = false;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'tasks.id'          => 10,
            'tasks.title'       => 8,
            'tasks.author'      => 6,
            'tasks.status'      => 4,
            'tasks.description' => 3,
            'tasks.date'        => 2
        ]
    ];
}
