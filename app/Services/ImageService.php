<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ImageService
{
    public function all()
    {
        $images = DB::table('images')->select('*')->get();
        $myImages = $images->all();
        return $myImages;
    }

    public function add($image)
    {
        DB::table('images')->insert(
            ['image' => $image]
        );
    }

    public function one($id)
    {
        $image =  DB::table('images')
                ->select('*')
                ->where('id', $id)
                ->first();
        return $image;
    }

    public function update($id, $newImage)
    {
        DB::table('images')
            ->where('id', $id)
            ->update(['image' => $newImage]);
    }

    public function delete($id)
    {
        DB::table('images')->where('id', $id)->delete();
    }
}
