<?php

namespace App\Exports;

use App\Task;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TaskExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $all_tasks = Task::all();
        return $all_tasks;
    }

    public function headings(): array{
        return [
            "task_id",
            "parent_id",
            "task_name",
            "description",
            "priority",
            "taskCreatedBy",
            "created_date",
            "due_date",
            "created_at",
            "updated_at"
        ];
    }
}
