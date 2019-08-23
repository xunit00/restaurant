<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ImageTrait
{

    /**
     * valida y crea imagen, redirecciona si hay problemas
     *
     *
     * @param Request $request
     * @return $this|false|string
     */
    public function storeImage(Request $request, $fieldname = 'image', $directory = 'unknown')
    {

        $file = $this->getVerifyImage($request, $fieldname);

        if ($file != null) {

            $filename = 'file-' . time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs('imagenes/' . $directory, $filename);

            return $filename;
        }

        return null;
    }

    /**
     * valida y actualiza imagen, redirecciona si hay problemas
     *
     * @param Request $request
     * @return $this|false|string
     */
    public function updateImage(Request $request, $fieldname = 'image', $directoryStore = 'unknown', $currentImage = 'image', $filepath = 'unknown')
    {

        $file = $this->getVerifyImage($request, $fieldname);

        if ($file != null) {

            $filename = 'file-' . time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs('imagenes/' . $directoryStore, $filename);

            $this->deleteImage($filepath,$currentImage);

            return $filename;
        }

        return null;
    }

    /**
     * valida la imagen y redireciona si hay problema.
     *
     * @param Request $request
     * @return $this|false|string
     */
    private function getVerifyImage(Request $request, $fieldname = 'image')
    {

        if ($request->hasFile($fieldname)) {

            $file = $request->file($fieldname);

            if (!$file->isValid()) {

                flash('Invalid Image!')->error()->important();

                return redirect()->back()->withInput();
            }

            return $file;
        }

        return null;
    }

    /**
     * elimina imagen de storage
     *
     * @param  $filepath ruta donde esta el archivo
     * @param  $currentImage nombre de la imagen
     * @return $this|false|string
     */
    public function deleteImage($filepath = 'unknow',$currentImage='image')
    {
        $oldImgPath = public_path($filepath) . $currentImage;

        if (file_exists($oldImgPath)) {

            @unlink($oldImgPath);
        }

        // return null;
    }
}
