<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackupController extends Controller
{
    public function create()
    {
        $backupFile = storage_path('app/backup-' . date('Y-m-d_H-i-s') . '.sql');

        exec("mysqldump --user=root --password= --host=localhost > $backupFile");

        return response()->download($backupFile)->deleteFileAfterSend(true);
    }
}
