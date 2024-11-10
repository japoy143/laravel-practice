<?php

namespace App\Models;

use Illuminate\Support\Arr;



class Job
{
    public static function  all(): array
    {
        return [
            [
                'id' => '1',
                'title' => 'Director',
                'salary' => '$50,000',
            ],
            [
                'id' => '2',
                'title' => 'Programmer',
                'salary' => '$80,000',
            ],
            [
                'id' => '3',
                'title' => 'Editor',
                'salary' => '$100,000',
            ]
        ];
    }


    public static function find($id): array
    {
        $job =  Arr::first(static::all(), fn($job) => $job['id'] == $id);

        // return !$job ? abort(404) : $job;

        //i preferred this for readability
        if (! $job) {
            abort(404);
        } else {
            return $job;
        }
    }
}
