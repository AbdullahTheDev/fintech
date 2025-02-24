<?php

namespace App\Http\Controllers;

use App\Mail\briefMail;
use App\Models\BriefForm;
use Barryvdh\DomPDF\Facade\Pdf;
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
            $data = $request->except('_token', 'documents');

            $data['services'] = $request->has('services') ? $request->input('services') : [];

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

            $filePaths = []; // Array to store file paths
            if ($request->hasFile('documents')) {
            
                foreach ($request->file('documents') as $file) {
                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/documents'), $filename);
                    $filePaths[] = 'uploads/documents/' . $filename;
                }
            
                // Save file paths as JSON if storing in a single column
                $form->images = json_encode($filePaths);
                $form->save();
            }
            

            Mail::to('dev@uniquelogodesigns.com')->send(new briefMail($briefForm, $filePaths, $customId));

            return redirect(route("thanks"))->with('success', 'Brief form submitted successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    function thanks()
    {
        return view('thanks');
    }

    // Just for streak

    public function generatePdf($id, $table)
    {
        // return $table;
        $table = 'App\Models\\' . $table;

        $data = $table::findOrFail($id);

        // return $data;
        $filePaths = [];
        // Example Logo File Name (adjust logic if necessary)
        $filePaths = json_decode($data->images, true); // $data->images;

        // return $data->images;
        $data = json_decode($data->content, true);

        $pdf = Pdf::loadView('pdf.pdf_template', compact('data', 'filePaths'));

        // Set Paper Size & Orientation (Optional)
        $pdf->setPaper('A4', 'portrait');

        // Download or Stream the PDF
        return $pdf->download('finance_digital_brief_' . $id . '.pdf'); // Use ->download('filename.pdf') to download instead
    }

    public function generateID($prefix)
    {
        if (!preg_match('/^[A-Z]{2}$/', $prefix)) {
            return response()->json(['error' => 'Invalid prefix. Must be 2 uppercase letters.'], 400);
        }

        // Generate 6-digit random number
        $randomNumber = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

        // Combine prefix and number
        $customID = $prefix . $randomNumber;

        return response()->json(['customID' => $customID]);
    }

    // Function to fetch initials from custom ID
    public function fetch($length, $customID)
    {
        if (!is_numeric($length) || $length <= 0 || $length > strlen($customID)) {
            return response()->json(['error' => 'Invalid length provided.'], 400);
        }

        // Extract the initials
        $initials = substr($customID, 0, $length);

        return response()->json(['initials' => $initials]);
    }

    public function searchView($id = null)
    {
        return view('search.index', compact('id'));
    }

    public function searchPdf(Request $request)
    {
        $customID = $request->input('customID');

        $prefix = substr($customID, 0, 2);

        $prefix = strtoupper($prefix);

        // Map prefixes to tables
        $tableMap = [
            'AA' => BriefForm::class,
        ];

        $tableName = $tableMap[$prefix] ?? 'unknown';

        if ($tableName == 'unknown') {
            return response()->json(['error' => 'PDF not found.'], 404);
        }

        try {
            $pdf = $tableName::where('custom_id', $customID)->first();

            if ($pdf === null) {
                return response()->json(['error' => 'PDF not found.'], 404);
            }

            $url = route('generate.pdf', ['id' => $pdf->id, 'table' => class_basename($tableName)]);

            return response()->json([
                'url' => $url
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
