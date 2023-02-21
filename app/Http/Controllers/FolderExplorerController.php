<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class FolderExplorerController extends Controller
{
    public function index(Request $request)
    {
        return view('folder.index', ['folders' => Folder::get()->sortDesc(),]);
    }

    public function show(int $id)
    {
        $folder = Folder::findOrFail($id);
        return view('folder.show', ['folder' => $folder,]);
    }
}
