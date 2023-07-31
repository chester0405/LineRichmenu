<?php

namespace App\Http\Controllers\LineRichMenu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RichMenu;
use App\Http\Requests\RichMenuStoreRequest;



class LineRichMangerController extends Controller
{
    public function create(RichMenuStoreRequest $request)
    {
        //dd();

        $richMenu = RichMenu::createImage($request->validated());
        
        return response()->json([
            'status' => 'success',
            'message' => 'Rich menu created successfully',
            'data' => $richMenu
            
        ], 201);

    }
}
