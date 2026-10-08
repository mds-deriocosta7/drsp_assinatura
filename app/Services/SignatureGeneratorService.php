<?php

namespace App\Services;

use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;

class SignatureGeneratorService
{

    public function generate(Request $request)
    {

        $data = [
            'path' => $request->path,
            'name' => $request->name,
            'position' => $request->position,
            'department' => $request->department,
            'phone' => $request->phone,
            'email' => $request->email,
            'logo_orgao' => $request->logo
        ];

        return view(
            'signatures.preview',
            $data
        );
    }
}
