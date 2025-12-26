<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeasurementController extends Controller
{
    public function measurementOptions()
    {
        return view('site.measurement.measurementOptions');
    }

    public function garmentDetails()
    {
        return view('site.measurement.garmentDetails');
    }

    public function manualMeasurement()
    {
        return view('site.measurement.manualMeasurement');
    }

    public function fitSampleCloth()
    {
        return view('site.measurement.fitSampleCloth');
    }

    public function alterationInstruction()
    {
        return view('site.measurement.alterationInstruction');
    }

    public function checkout()
    {
        return view('site.measurement.checkout');
    }
}
