<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use Illuminate\Http\Request;

class BorrowersController extends Controller
{
    public function index()
    {
        return view('books.borrowers');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'borrowers.*.name' => 'nullable|string',
            'borrowers.*.email' => 'exclude_if:borrowers.*.name,null|email|unique:borrowers',
            'borrowers.*.phone_number' => 'exclude_if:borrowers.*.name,null|required|regex:/^[\d-]+$/',
        ], [
            'borrowers.*.email.email' => 'Missing or invalid email',
            'borrowers.*.phone_number.required' => 'Missing phone number',
        ]);

        foreach ($input['borrowers'] as $row) {
            if (empty($row['name'])) {
                continue;
            }
            Borrower::create($row);
        }

        return redirect()->route('borrowers.index');
    }
}
