<?php

namespace App\Http\Controllers;


use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

trait Upload
{
    private $extension = null;
    private $path = null;
    private $uploadName = null;
    private $name = null;
    private $destinationPath = null;
    private $error = null;

    public function getExtension()
    {
        return $this->extension;
    }
    public function getDestinationPath()
    {
        return $this->destinationPath;
    }
    public function getUploadName()
    {
        return $this->uploadName;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPath()
    {
        return $this->path;
    }
    public function getError()
    {
        return $this->error;
    }
    public function uploadImage( $file, $path, $column = 'imagem')
    {
        $date =  new DateTime();

        if ($file instanceof UploadedFile && $file->isValid()) {
            try {
                $this->extension = $file->extension();
                $this->name = $column . uniqid() . $date->getTimestamp();
                $this->destinationPath = public_path("/uploads/" . $path); // upload path
                $this->path = $path;
    
                // Upload da imagem
                $upload = $file->move($this->destinationPath, $this->name . "." . $this->extension);
                $this->uploadName = $path . '/' . $this->name . '.' . $this->extension;
    
                return $upload ? $this->uploadName : null;
            } catch (\Throwable $th) {
                $this->error = $th->getMessage();
                return null;
            }
        } else {
            $this->error = "Arquivo Inválido!";
            return null;
        }
    }
    public function uploadBase64Image($request, $path, $column = 'imagem')
    {
        $date =  new DateTime();

        if (isset($request->$column)) {
            try {


                $this->extension =  'png';
                $img = $request->$column;
                $this->name = $column . uniqid() . $date->getTimestamp();

                $image_parts = explode(";base64,", $img);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];

                $image_base64 = base64_decode($image_parts[1]);
                $fileName = $this->name . '.' . $this->extension;

                $this->destinationPath = public_path("/uploads/" . $path . '/'); // upload
                $file = $this->destinationPath . $fileName;

                $upload = file_put_contents($file, $image_base64);

                $this->path = $path;
                $this->uploadName  = $path . '/' . $this->name . '.' . $this->extension;
                // $request->$column->move($this->destinationPath, $this->name . "." . $this->extension);
                return
                    $upload  ? $this->uploadName  : null;
            } catch (\Throwable $th) {
                $this->error = $th->getMessage();
                return null;
            }
        } else {
            $this->error = "Imagem Invalida!";
            return null;
        }
    }

    // public function uploadFile($file, $type)
    // {
    //     $destinationPath = public_path('/'. $type.'/' ); // upload path
    //     $fileName =   Str::uuid() . '.' . $file->getClientOriginalExtension();
    //     $file->move($destinationPath, $fileName);

    //     return '/'. $type.'/' . $fileName;
    // }
    public function uploadFile($request, $path, $column = 'arquivo')
    {
        $date =  new DateTime();

        if ($request->hasFile($column) && $request->file($column)->isValid()) {
            try {


                $this->extension =  $request->$column->extension();

                $this->name = $column . uniqid() . $date->getTimestamp();
                $this->destinationPath = public_path("/uploads/" . $path); // upload path
                $this->path = $path;
                $upload = $request->$column->move($this->destinationPath, $this->name . "." . $this->extension);
                $this->uploadName  = $path . '/' . $this->name . '.' . $this->extension;
                return
                    $upload  ? $this->uploadName  : null;
            } catch (\Throwable $th) {
                $this->error = $th->getMessage();
                return null;
            }
        } else {
            $this->error = "Arquivo Invalido!";
            return null;
        }
    }
}
