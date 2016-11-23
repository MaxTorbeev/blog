<?php

namespace MaxTor\MXTCore\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use MaxTor\MXTCore\Models\Extension;
use MaxTor\MXTCore\Requests\ExtensionsRequests;

class ExtensionsController extends Controller
{
    public function index()
    {
        $extensions = Extension::all();

        return view('mxtcore::dashboard.extensions.index', compact('extensions'));
    }

    public function update($id, Request $request)
    {
        $extension = Extension::whereId($id)->firstOrFail();
        $extension->update($request->all());

        return redirect()->back();
    }
    
    public function dashboard($controller, $page)
    {
        $extensions = Extension::all();

        return view('mxtcore::dashboard.extensions.index', compact('extensions', 'page'));
    }

    public function create()
    {
        $extension = new Extension();

        return view('mxtcore::dashboard.extensions.create', compact('extension'));
    }

    public function store(ExtensionsRequests $request)
    {
        Auth::user()->extensions()->create($request->all());

        return redirect()->back();
    }
}
