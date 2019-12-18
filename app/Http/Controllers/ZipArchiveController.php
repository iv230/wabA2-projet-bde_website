<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use ZipArchive;

class ZipArchiveController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return mixed
     */
    public function zipDownload(Request $request)
    {

        if($request->has('download')) {

            $public_dir = public_path('/img');
            $zipFileName = 'Images.zip';
            $filetopath = $public_dir.'/'.$zipFileName;


            $zip = new ZipArchive();
            $created = $zip->open($filetopath, ZipArchive::CREATE);

            if($created === TRUE){

                $files1 = scandir($public_dir . '/eventsUser/');
                unset($files1[0], $files1[1]);
                $files2 = scandir($public_dir . '/events/');
                unset($files2[0], $files2[1]);


                foreach ($files1 as $file) {
                    $zip->addFile($public_dir.'/eventsUser/'.$file, '/eventsUser/'.$file);
                }

                foreach ($files2 as $file) {
                    $zip->addFile($public_dir.'/events/'.$file, '/events/'.$file);
                }

                $zip->close();
            }

            if(file_exists($filetopath)){
                return response()->download($filetopath)->deleteFileAfterSend();
            }
        }
        return redirect()->back();
    }
}
