<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class AuditLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'super-admin') {
            abort(403, 'Unauthorized action.');
        }

        if ($request->ajax()) {
            $query = AuditLog::with('user')->orderBy('audit_logs.created_at', 'desc')->get();

            return DataTables::of($query)
                ->addColumn('user', fn($log) => $log->user ? $log->user->name : 'N/A')
                ->editColumn('created_at', fn($log) => $log->created_at->format('Y-m-d H:i:s'))
                ->rawColumns(['user', 'action', 'details'])
                ->make(true);
        }

        return view('auditlogs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AuditLog $auditLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AuditLog $auditLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AuditLog $auditLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AuditLog $auditLog)
    {
        //
    }
}
