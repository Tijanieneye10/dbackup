<?php

namespace App\Http\Controllers;

use App\Http\Requests\BackupRequest;
use App\Models\Backup;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\View;


class BackupController extends Controller
{
    public function index(): view
    {
        $backups = Backup::all();
        return view('pages.backup.index', compact('backups'));
    }

    public function create(): view
    {
        return view('pages.backup.create');
    }

    public function store(BackupRequest $request): RedirectResponse
    {

        Backup::create([
            ...$request->validated(),
            'dbpass' => Crypt::encrypt($request->dbpass),
        ]);

        return to_route('backups.index');
    }


    public function toggleStatus(Backup $backup): RedirectResponse
    {
        $backup->status = !$backup->status;
        $backup->save();
        return back();
    }


    public function destroy(Backup $backup): RedirectResponse
    {
        $backup->delete();
        return back();
    }
}
