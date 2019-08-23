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

            $file=$request->file($fieldname);

            if (!$file->isValid()) {

                flash('Invalid Image!')->error()->important();

                return redirect()->back()->withInput();
            }

            $filename = 'file-' . time() . '.' .$file->getClientOriginalExtension();

            $file->storeAs('imagenes/'.$directory , $filename);

            return $filename;

            // return $file->storeAs($directory,$filename);
        }

        return null;
    }

}
