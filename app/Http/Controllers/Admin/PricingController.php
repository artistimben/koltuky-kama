<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingPlan;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $plans = PricingPlan::orderBy('order')->get();
        return view('admin.pricing.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.pricing.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'unit'        => 'required|string|max:50',
            'features'    => 'nullable|array',
            'features.*'  => 'nullable|string',
            'featured'    => 'nullable|boolean',
            'active'      => 'nullable|boolean',
            'order'       => 'nullable|integer',
        ]);

        $data['featured'] = $request->has('featured');
        $data['active']   = $request->has('active');
        $data['features'] = array_filter($request->input('features', []));

        PricingPlan::create($data);
        return redirect()->route('admin.pricing.index')->with('success', 'Fiyat planı eklendi.');
    }

    public function edit(PricingPlan $pricing)
    {
        return view('admin.pricing.edit', compact('pricing'));
    }

    public function update(Request $request, PricingPlan $pricing)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'unit'        => 'required|string|max:50',
            'features'    => 'nullable|array',
            'features.*'  => 'nullable|string',
            'featured'    => 'nullable|boolean',
            'active'      => 'nullable|boolean',
            'order'       => 'nullable|integer',
        ]);

        $data['featured'] = $request->has('featured');
        $data['active']   = $request->has('active');
        $data['features'] = array_filter($request->input('features', []));

        $pricing->update($data);
        return redirect()->route('admin.pricing.index')->with('success', 'Fiyat planı güncellendi.');
    }

    public function destroy(PricingPlan $pricing)
    {
        $pricing->delete();
        return back()->with('success', 'Fiyat planı silindi.');
    }

    public function show(PricingPlan $pricing)
    {
        return redirect()->route('admin.pricing.edit', $pricing);
    }
}
