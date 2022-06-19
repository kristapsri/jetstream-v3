<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Inertia\Response;

class TestSectionController extends Controller
{
    public function index(): Response
    {
        Gate::authorize('view_test_section');
        return Inertia::render('TestSection/Index');
    }
}
