<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProcessStep;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function index()
    {
        $steps = ProcessStep::orderBy('order')->get();
        return view('admin.process.index', compact('steps'));
    }

    public function create()
    {
        return view('admin.process.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'icon'        => 'nullable|string|max:100',
            'step_number' => 'required|integer|min:1',
            'order'       => 'nullable|integer',
            'active'      => 'nullable|boolean',
        ]);
        $data['active'] = $request->has('active');

        ProcessStep::create($data);
        return redirect()->route('admin.process.index')->with('success', 'Süreç adımı eklendi.');
    }

    public function edit(ProcessStep $process)
    {
        return view('admin.process.edit', compact('process'));
    }

    public function update(Request $request, ProcessStep $process)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'icon'        => 'nullable|string|max:100',
            'step_number' => 'required|integer|min:1',
            'order'       => 'nullable|integer',
            'active'      => 'nullable|boolean',
        ]);
        $data['active'] = $request->has('active');

        $process->update($data);
        return redirect()->route('admin.process.index')->with('success', 'Süreç adımı güncellendi.');
    }

    public function destroy(ProcessStep $process)
    {
        $process->delete();
        return back()->with('success', 'Süreç adımı silindi.');
    }

    public function show(ProcessStep $process)
    {
        return redirect()->route('admin.process.edit', $process);
    }
}
