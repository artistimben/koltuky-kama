<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ProcessStep;
use App\Models\PricingPlan;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::active()->take(6)->get();
        $processSteps = ProcessStep::active()->take(4)->get();
        $pricingPlans = PricingPlan::active()->take(3)->get();
        return view('home', compact('services', 'processSteps', 'pricingPlans'));
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        $services = Service::active()->get();
        return view('services', compact('services'));
    }

    public function process()
    {
        $steps = ProcessStep::active()->get();
        return view('process', compact('steps'));
    }

    public function pricing()
    {
        $plans = PricingPlan::active()->get();
        return view('pricing', compact('plans'));
    }
}
