<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarkdownController extends Controller {
    public function previewMarkdown(Request $request) {
        $body = $request->body ?? '';
        return [
            'body' => app(\Spatie\LaravelMarkdown\MarkdownRenderer::class)
                ->highlightTheme('dracula')
                ->toHtml($body),
        ];
    }
}
