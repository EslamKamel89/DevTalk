<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;

class DiscussionShowController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Discussion $discussion) {
        dd($discussion);
    }
}
