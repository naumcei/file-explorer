<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class FileExplorerController extends Controller
{
    public function download(int $id)
    {
        $file = File::findOrFail($id);

        return new BinaryFileResponse(Storage::disk('public')->path($file->path));
    }
}
