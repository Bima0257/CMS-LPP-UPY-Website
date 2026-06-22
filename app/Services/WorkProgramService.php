<?php

namespace App\Services;

use App\Models\WorkProgram;
use Illuminate\Support\Facades\Auth;

class WorkProgramService
{
    public function store(array $data): WorkProgram
    {
        return WorkProgram::create([
            'name' => $data['name'],
            'tgl_pelaksanaan' => $data['tgl_pelaksanaan'],
            'is_published' => $data['is_published'],
            'author_id' => Auth::id(),
        ]);
    }

    /**
     * Update Work Program
     */
    public function update(array $data, WorkProgram $workProgram): WorkProgram
    {
        // Cek akses
        if (Auth::user()->role !== 'superadmin' && $workProgram->author_id !== Auth::id()) {
            abort(403, 'Tidak memiliki izin.');
        }

        $workProgram->update([
            'name' => $data['name'],
            'tgl_pelaksanaan' => $data['tgl_pelaksanaan'],
            'is_published' => $data['is_published'],
        ]);

        return $workProgram;
    }

    /**
     * Delete Work Program
     */
    public function destroy(WorkProgram $workProgram): ?bool
    {
        if (Auth::user()->role !== 'superadmin' && $workProgram->author_id !== Auth::id()) {
            abort(403, 'Tidak memiliki izin.');
        }

        return $workProgram->delete();
    }
}
