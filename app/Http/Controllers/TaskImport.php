<?php

namespace App\Http\Controllers;

use App\Exports\TaskExport;
use App\Imports\TaskImportFromCSV;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TaskImport extends Controller
{
    public function importTask(Request $request)
    {
        $file = $request['file'];
        $filenamewithext = $file->getClientOriginalName();
        $filename = pathinfo($filenamewithext, PATHINFO_FILENAME);
        $ext = pathinfo($filenamewithext, PATHINFO_EXTENSION);
        $filenametostore = $filename . "_" . time() . "." . $ext;
        $path = $file->storeAs("public/files", $filenametostore);
        Excel::import(new TaskImportFromCSV, storage_path('app') . "/" . $path);

        return redirect('task-list');
    }

    public function exportTask(Request $request)
    {
        return Excel::download(new TaskExport, 'tasks.xlsx');
    }
}
