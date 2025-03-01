<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\LengthAwarePaginator;

class LogController extends Controller
{
    public function index()
    {
        $mainLogFile = storage_path('logs/laravel.log');
        $adminLogFile = storage_path('logs/admin/admin.log');

        $mainLogs = collect(file_exists($mainLogFile) ? array_reverse(file($mainLogFile)) : []);
        $adminLogs = collect(file_exists($adminLogFile) ? array_reverse(file($adminLogFile)) : []);

        $allLogs = $mainLogs->merge($adminLogs)->map(function ($line) {
            // Check if line starts with stack trace pattern (#number)
            if (preg_match('/^#\d+/', $line)) {
                return null;
            }

            $parts = explode(' ', $line, 4);

            // Only process lines that look like actual log entries
            if (count($parts) >= 3 && !empty($parts[0]) && !empty($parts[1])) {
                return [
                    'timestamp' => $parts[0] . ' ' . $parts[1],
                    'level' => trim($parts[2], '[]'),
                    'message' => isset($parts[3]) ? trim($parts[3]) : '',
                    'source' => strpos($line, '[admin]') !== false ? 'admin' : 'main'
                ];
            }
            return null;
        })->filter(); // Remove null entries

        $page = request()->get('page', 1);
        $perPage = 50;

        $paginatedLogs = new LengthAwarePaginator(
            $allLogs->forPage($page, $perPage),
            $allLogs->count(),
            $perPage,
            $page,
            ['path' => request()->url()]
        );

        return view('admin.logs.index', compact('paginatedLogs'));
    }




    public function logSpecificAction($data)
    {
        // Write to admin specific log
        Log::channel('admin')->info('Admin action performed', $data);

        // This will write to both main log and admin log due to stack configuration
        Log::info('Action logged in main file', $data);
    }
}
