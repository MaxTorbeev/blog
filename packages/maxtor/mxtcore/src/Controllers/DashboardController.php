<?php

namespace MaxTor\MXTCore\Controllers;

use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MaxTor\MXTCore\Models\Menu;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.permission:access_dashboard');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index()
    {
        return view('mxtcore::dashboard.index', compact('page'));
    }

    /**
     * get Image form dialog for TinyMCE editor
     *
     * @todo append resizer image
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function imageUpload(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('mxtcore::dashboard.system.editor.image-dialog');

        } else if ($request->isMethod('post')) {
            $file = $request->file('imagefile');

            $fileName = md5(time()) . '.' .$file->getClientOriginalExtension();

            $file->move('uploads/images/',$fileName);
            $file_path = '/uploads/images/'. $fileName;

            return view('mxtcore::dashboard.system.editor.image-upload', compact('file_path'));
        }
    }

}
