<?php

namespace App\Imports;

use App\Task;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TaskImportFromCSV implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row) {
            // dd($row);
            if($row['parent_id'] == "null") {
                $row['parent_id'] = null;
            }
                $task = Task::create([
                "parent_id" => null,
                "task_name" => $row['task_name'],
                "description" => $row['description'],
                "priority" => $row['priority'],
                "taskCreatedBy" => $row['taskcreatedby'],
                "created_date" => $row['created_date'],
                "due_date" => $row['due_date'],
                "created_at" => $row['created_at'],
                "updated_at" => $row['updated_at']
            ]);

        }
    }
}
