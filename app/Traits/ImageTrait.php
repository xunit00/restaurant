<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait ImageTrait {

   /**
     * Does very basic image validity checking and stores it. Redirects back if somethings wrong.
     *
     * @param Request $request
     * @return $this|false|string
     */
    public function verifyAndStoreImage( Request $request, $fieldname = 'image', $directory = 'unknown') {

        if( $request->hasFile( $fieldname ) ) {

            if (!$request->file($fieldname)->isValid()) {

                flash('Invalid Image!')->error()->important();

                return redirect()->back()->withInput();
            }

            return $request->file($fieldname)->store('imagenes/'. $directory, 'public');
        }

        return null;
    }

    /**
     * Borra la imagen del storage
     *
     * @param String $filename
     *
     */
    public function deleteImage($filename = null)
    {
        Storage::delete('storage/'.$filename);
    }
}
