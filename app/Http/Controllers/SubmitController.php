<?php

namespace App\Http\Controllers;

use App\Mail\briefMail;
use App\Models\BriefForm;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubmitController extends Controller
{
    function briefForm()
    {
        return view('index');
    }
    function briefSubmit(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);

        try {
            $data = $request->except('_token', 'logo_source_files');

            // Convert to JSON
            $briefFormJson = json_encode($data);

            // Convert JSON back to associative array
            $briefForm = json_decode($briefFormJson, true);

            $generateID = json_encode($this->generateID('AA'));
            $generateID = json_decode($generateID, true);

            if (isset($generateID['original']['error'])) {
                return redirect()->back()->with('error', $generateID['original']['error']);
            }
            $customId = $generateID['original']['customID'];

            $form = BriefForm::create([
                'content' => $briefFormJson,
                'custom_id' => $customId
            ]);

            $filename = null;
            $filePath = [];

            if ($request->hasFile('logo_source_files')) {
                // Get the uploaded file
                $file = $request->file('logo_source_files');

                $filename = time() . '.' . $file->getClientOriginalExtension();

                $path = $file->move(public_path('uploads/logos'), $filename); // Creates a 'logos' directory if it doesn't exist

                $filePath[] = 'uploads/logos/' . $filename;
                $form->images = $filePath;
                $form->save();
            }

            Mail::to('dev@uniquelogodesigns.com')->send(new briefMail($briefForm, $filename, $customId));

            return redirect(route("thanks"))->with('success', 'Brief form submitted successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
