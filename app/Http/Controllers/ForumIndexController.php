<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumIndexController extends Controller {
    public function __invoke(Request $request) {

        return inertia('forum/Index');
    }
}
