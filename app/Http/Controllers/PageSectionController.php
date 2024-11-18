<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageSectionController extends Controller
{
    public function showPage($pageNumber = 1)
    {
        $pageNumber = max(1, (int)$pageNumber); // Ensure page number is at least 1

        return view('tutorApplication', [
            'currentPage' => $pageNumber
        ]);
    }
}
