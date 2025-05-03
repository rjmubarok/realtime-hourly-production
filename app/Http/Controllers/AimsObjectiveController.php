<?php

namespace App\Http\Controllers;

use App\Models\AimObjective;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPUnit\Exception;

class AimsObjectiveController extends Controller

{
    public function __construct()
    {
        $this->aimsObjective = new AimObjective();
    }

    public function index()
    {
        $aimsObjectives = $this->aimsObjective->allData();

        return view('website_setting.aims_objective.index', compact('aimsObjectives'));
    }

    public function create()
    {
        return view('website_setting.aims_objective.create');
    }


    public function insert(Request $request)
    {

        try {
            $this->validate($request, [
                'aims_title_en' => 'required',
                'aims_title_bn' => 'required',
                'aims_image' => 'required',
                'aims_description_en' => 'required',
                'aims_description_bn' => 'required',
                'objective_title_en' => 'required',
                'objective_title_bn' => 'required',
                'objective_image' => 'required',
                'objective_description_en' => 'required',
                'objective_description_bn' => 'required',
            ],
                [
                    'aims_title_en.required' => 'Please Insert Aims Title in English ',
                    'aims_title_bn.required' => 'Please Insert Aims Title in Bangla ',
                    'aims_image.required' => 'Please Aims Image ',
                    'aims_description_en.required' => 'Please Insert Aims Description in English ',
                    'aims_description_bn.required' => 'Please Insert  Aims Description in Bangla ',
                    'objective_title_en.required' => 'Please Insert Objective Title in English ',
                    'objective_title_bn.required' => 'Please Insert Objective Title in bangla ',
                    'objective_image.required' => 'Please Insert Object Image ',
                    'objective_description_en.required' => 'Please Insert Description in English ',
                    'objective_description_bn.required' => 'Please Insert Description in Bangla',

                ]);
            if ($request->aims_image) {
                $aims_photo = $request->aims_image;
                $aims_photo_name = 'aims_' . time() . '.' . $aims_photo->getClientOriginalExtension();
                try {
                    $aims_photo->move(public_path('backend/aims_objective'), $aims_photo_name);
                } catch (Exception $e) {
                    return redirect()->back();
                }
            }
            if ($request->objective_image) {
                $objective_photo = $request->objective_image;
                $objective_photo_name = 'objective_' . time() . '.' . $objective_photo->getClientOriginalExtension();
                try {
                    $objective_photo->move(public_path('backend/aims_objective'), $objective_photo_name);
                } catch (Exception $e) {
                    return redirect()->back();
                }
            }

            $data = [
                'created_by' => Auth::user()->id,
                'aims_title_en' => $request->aims_title_en,
                'aims_title_bn' => $request->aims_title_bn,
                'aims_image' => $aims_photo_name ?? '',
                'aims_description_en' => $request->aims_description_en,
                'aims_description_bn' => $request->aims_description_bn,
                'objective_title_en' => $request->objective_title_en,
                'objective_title_bn' => $request->objective_title_bn,
                'objective_image' => $objective_photo_name ?? '',
                'objective_description_en' => $request->objective_description_en,
                'objective_description_bn' => $request->objective_description_bn,
            ];

            $aimsObjective = $this->aimsObjective->create_aimsObjective($data);
            Session::flash('success', "Created successfully");
            return redirect()->route('viewAimsObjective');
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);

        }
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {

            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/' . $filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

    public function edit($id)
    {

        $single_aimsObject = $this->aimsObjective->find($id);
        return view('website_setting.aims_objective.edit', compact('single_aimsObject'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'aims_title_en' => 'required',
                'aims_title_bn' => 'required',
                'aims_description_en' => 'required',
                'aims_description_bn' => 'required',
                'objective_title_en' => 'required',
                'objective_title_bn' => 'required',
                'objective_description_en' => 'required',
                'objective_description_bn' => 'required',
            ],
                [
                    'aims_title_en.required' => 'Please Insert Aims Title in English ',
                    'aims_title_bn.required' => 'Please Insert Aims Title in Bangla ',
                    'aims_description_en.required' => 'Please Insert Aims Description in English ',
                    'aims_description_bn.required' => 'Please Insert  Aims Description in Bangla ',
                    'objective_title_en.required' => 'Please Insert Objective Title in English ',
                    'objective_title_bn.required' => 'Please Insert Objective Title in bangla ',
                    'objective_description_en.required' => 'Please Insert Description in English ',
                    'objective_description_bn.required' => 'Please Insert Description in Bangla',

                ]
            );

            $prevImage = $request->aims_old_image;
            $aims_photo = $request->aims_image;
            if ($aims_photo !== null) {
                try {
                    $data = $request->validate([
                        'aims_image' => 'mimes:jpeg,jpg,png,gif|max:10000',
                    ], [
                        'aims_image.mimes' => 'Please select an image.',
                        'aims_image.max' => 'Your Image is  too large.',
                    ]);
                } catch (ValidationException $e) {
                    return redirect()->back()->withErrors($e->validator)->withInput();
                }
                if (isset($prevImage)) {

                    if (file_exists(public_path('backend/aims_objective/') . $prevImage)) {
                        unlink(public_path('backend/aims_objective/') . $prevImage);
                    }
                }
                $aims_photo_name = 'aims_' . time() . '.' . $aims_photo->getClientOriginalExtension();
                try {
                    $aims_photo->move(public_path('backend/aims_objective'), $aims_photo_name);
                } catch (Exception $e) {
                    return redirect()->back();
                }
            } else {
                $aims_photo_name = $request->input('aims_old_image');
            }

            /*Objective Image Update*/

            $prevImage = $request->objective_old_image;
            $objective_photo = $request->objective_image;
            if ($objective_photo !== null) {
                try {
                    $data = $request->validate([
                        'objective_image' => 'mimes:jpeg,jpg,png,gif|max:10000',
                    ], [
                        'objective_image.mimes' => 'Please select an image.',
                        'objective_image.max' => 'your Image is too large',
                    ]);
                } catch (ValidationException $e) {
                    return redirect()->back()->withErrors($e->validator)->withInput();
                }
                if (isset($prevImage)) {

                    if (file_exists(public_path('backend/aims_objective/') . $prevImage)) {
                        unlink(public_path('backend/aims_objective/') . $prevImage);
                    }
                }
                $objective_photo_name = 'objective_' . time() . '.' . $objective_photo->getClientOriginalExtension();
                try {
                    $objective_photo->move(public_path('backend/aims_objective'), $objective_photo_name);
                } catch (Exception $e) {
                    return redirect()->back();
                }
            } else {
                $objective_photo_name = $request->input('objective_old_image');
            }


            $data = [
                'updated_by' => Auth::user()->id,
                'aims_title_en' => $request->aims_title_en,
                'aims_title_bn' => $request->aims_title_bn,
                'aims_image' => $aims_photo_name ?? '',
                'aims_description_en' => $request->aims_description_en,
                'aims_description_bn' => $request->aims_description_bn,
                'objective_title_en' => $request->objective_title_en,
                'objective_title_bn' => $request->objective_title_bn,
                'objective_image' => $objective_photo_name ?? '',
                'objective_description_en' => $request->objective_description_en,
                'objective_description_bn' => $request->objective_description_bn,

            ];
            $updateAimsObjective = $this->aimsObjective->aimsObjectiveUpdate($id, $data);
            Session::flash('success', "Updated successfully");
            return redirect()->route('viewAimsObjective');

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Some Validation Error Occurred!']);
        }

    }
}
