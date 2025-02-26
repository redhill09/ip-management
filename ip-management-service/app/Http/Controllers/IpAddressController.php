<?php

namespace App\Http\Controllers;

use App\Models\IpAddress;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;


class IpAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $ips = IpAddress::query();
            return DataTables::of($ips)
                ->addColumn('actions', function ($ip) {
                    $buttons = '<a href="/ipaddress/edit/' . $ip->id . '" class="btn btn-success btn-sm">Edit</a>';
                    if (Auth::user()->role == 'super-admin') {
                        $buttons .= ' <a href="/ipaddress/delete/' . $ip->id . '" class="btn btn-danger btn-sm">Delete</a>';
                    }
                    return $buttons;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('ipaddress.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("ipaddress.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $ipAddress = new IpAddress();

        $data = $request->validate([
            'ip' => ['required', 'ip', Rule::unique('ip_addresses', 'ip')],
            'label' => 'required|string|max:255',
            'comment' => 'string|nullable'
        ]);
        $data['user_id'] = Session::get('id');

        $ipAddress->create($data);
        AuditLog::create(['user_id' => Auth::id(), 'action' => 'Created IP', 'details' => 'Created IP: ' . $data['ip']]);

        return redirect('/ipaddress')->with('success', 'IP Address added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ipData = IpAddress::find($id);

        return view('ipaddress.edit', [
            'ip' => $ipData
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, Request $request)
    {
        $ipData = IpAddress::find($id);

        $data = $request->validate([
            'ip' => ['required', 'ip', Rule::unique('ip_addresses', 'ip')->ignore($id)],
            'label' => 'required|string|max:255',
            'comment' => 'string|nullable'
        ]);

        if ($ipData->ip != $request->ip && $ipData->user_id != Session::get('id') && Auth::user()->role != "super-admin") {
            return back()->with('error', 'Unauthorized action!');
        }

        $changes = [];
        foreach ($data as $key => $value) {
            if ($ipData[$key] != $value) {
                $changes[] = "$key changed from '{$ipData[$key]}' to '{$value}'";
            }
        }

        $ipData->update($data);
        AuditLog::create(['user_id' => Auth::id(), 'action' => 'Updated IP', 'details' => implode(', ', $changes)]);

        return redirect('/ipaddress')->with('success', 'IP Address updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Auth::user()->role != "super-admin") {
            return back()->with('error', 'Unauthorized action!');
        }

        $data = IpAddress::findOrFail($id);
        AuditLog::create(['user_id' => Auth::id(), 'action' => 'Deleted IP', 'details' => 'Deleted IP: ' . $data->ip]);
        $data->delete();

        return redirect('/ipaddress')->with('success', 'IP Address deleted.');
    }
}
