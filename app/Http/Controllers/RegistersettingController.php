<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Registersetting;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegistersettingController extends Controller
{
/*
if(!auth()->user()->can('registersetting_access'))
            return abort(401);

        $query = Registersetting::query();

        if ($request->get('sort')) {
            $keys = explode('|', $request->get('sort'));
            $query = $query->orderBy($keys[0], $keys[1]);
        }

        $perPage = $request->get('per_page', 10);
        $registersettings = $query->paginate($perPage)


*/


    public function index(Request $request)
    {
       
        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }
        if (request()->has('max_width') || request()->has('max_height')) {
            $this->validate(request(), [
                'file' => sprintf(
                'image|dimensions:max_width=%s,max_height=%s',
                request()->input('max_width', 100000),
                request()->input('max_height', 100000)
                ),
            ]);
        }

        $model                     = new Registersetting();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);

        return view('registersetting.index');
    }

    public function create()
    {
   
        return view('registersetting.create');
    }

    public function edit(Registersetting $registersetting)
    {
 
        return view('registersetting.edit', compact('registersetting'));
    }

    public function show(Registersetting $registersetting)
    {
 
        $registersetting->load('team');

        return view('registersetting.show', compact('registersetting'));
    }

    public function storeMedia(Request $request,$subdomain)
    {       

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }
        if (request()->has('max_width') || request()->has('max_height')) {
            $this->validate(request(), [
                'file' => sprintf(
                'image|dimensions:max_width=%s,max_height=%s',
                request()->input('max_width', 100000),
                request()->input('max_height', 100000)
                ),
            ]);
        }

        $model                     = new Registersetting();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }
}