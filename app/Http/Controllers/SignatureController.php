<?php

namespace App\Http\Controllers;

use App\Services\SignatureGeneratorService;
use Illuminate\Http\Request;

class SignatureController extends Controller
{

    public function index()
    {
        return view('signatures.index');
    }

    public function templates()
    {
        return view('signatures.templates');
    }

    public function upload(Request $request)
    {
        $path = $request->file('image')->store('uploads', 'public');

        return view(
            'signatures.editor',
            compact('path')
        );
    }

    public function generate(
        Request $request,
        SignatureGeneratorService $service
    ) {

        return $service->generate($request);
    }
}
