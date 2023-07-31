<?php

namespace App\Http\Controllers\Line;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RichMenuRequest;
use App\Models\RichMenu;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{

    public function RichMenu(RichMenuRequest $request)
    {
        $request->validated();


        // 處理上傳的照片
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');

            // 確定目錄是否存在，如果不存在則建立目錄
            $directory = 'photos'; // 設定目錄名稱，可以根據需求自行更改
            if (!File::isDirectory($directory)) {
                File::makeDirectory($directory);
            }

            // 使用 storage 儲存照片，並取得檔案儲存路徑
            $photoPath = $photo->store($directory, 'public');
        }
        

        // 使用 Eloquent 模型的 create 方法直接新增資料到資料庫
        RichMenu::create([
            'name' => $request->input('name'),
            'photo' => $photoPath ?? null, // 如果有上傳照片，才儲存路徑；否則設為 null
            'coordinate_x' => $request->input('coordinate_x'),
            'coordinate_y' => $request->input('coordinate_y'),
            'length' => $request->input('length'),
            'width' => $request->input('width'),
        ]);

        return response()->json(['message' => '照片上傳成功！']);
    }



    public function Index(Request $_Request)
    {
        $users = DB::table('rich_menu1')->get();
 
        foreach ($users as $user) {
            echo $user->name;
        }
    }
}
