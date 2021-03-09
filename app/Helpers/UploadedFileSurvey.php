<?php


namespace App\Helpers;


use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class UploadedFileSurvey
{

    public static function getFolderSize():int
    {
        $file_size = 0;
        foreach( Storage::allFiles('public/survey/') as $file)
        {
            $file_size += Storage::size($file);
        }
        return $file_size;
    }

    public static function deleteOldImage():void
    {
        $subMonth = Carbon::now()->subMonth();
        $deleteFiles = [];
        foreach( Storage::allFiles('public/survey/') as $file)
        {
            $time = Storage::lastModified($file);
            if (Carbon::createFromTimestamp($time) < $subMonth)
                $deleteFiles[] = $file;

        }
        Storage::delete($deleteFiles);
    }

    public static function deleteAllImage():void
    {
        Storage::deleteDirectory('public/survey/');
    }
}
