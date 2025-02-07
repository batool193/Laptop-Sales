<?php

namespace App\Http\Controllers;

use App\Models\Attachement;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class AttachementController extends Controller
{

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id) {
        $attachement = Attachement::find($id);
        if ($attachement) {
         // Delete the file from storage
          Storage::disk('public')->delete($attachement->file_path);
           // Delete the attachment record from the database
            $attachement->delete();
           return back()->with('status', 'Image Deleted Successfully'); }
    }
}
