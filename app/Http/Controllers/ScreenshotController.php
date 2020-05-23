<?php

namespace App\Http\Controllers;

use App\Events\ScreenshotUploaded;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ScreenshotController extends Controller
{
    public function store(Request $request)
    {
        Log::info('Upload photo', $request->headers->all());

        $request->validate([
            'screenshot' => 'required|image',
            'id' => 'required',
        ]);

        $file = $request->file('screenshot');

        $file->storeAs(
            'screenshots',
            $file->getClientOriginalName(),
            'public'
        );

        broadcast(
            new ScreenshotUploaded(
                $request->input('id'),
                $request->file('screenshot')->getFilename()
            )
        );
    }
}
