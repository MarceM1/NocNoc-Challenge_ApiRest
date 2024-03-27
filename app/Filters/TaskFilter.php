<?php

namespace App\Filters;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class TaskFilter extends ApiFilter{

    protected $safeParams = [
        'title'=>['eq'],
        'description'=>['eq'],
        'status'=>['eq'],
        'due_date'=>['eq', 'lte'],
    ];

    protected $columnMap = [
        'dueDate' => 'due_date'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
    ];
};