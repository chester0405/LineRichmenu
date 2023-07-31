<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RichMenu extends Model
{
    // 指定要使用的資料表名稱 改
     protected $table = 'rich_menus';

    // 可填寫的欄位
    protected $fillable = [
        'rich_menu_name',
        'chat_bar_text',
        'selected',
        'rich_menu_image_url',
        'areas',
    ];

    public static function createImage($attributes)
    {
        if (array_key_exists('rich_menu_image_url', $attributes) && $attributes['rich_menu_image_url']->isValid()) {
            $image = $attributes['rich_menu_image_url'];
            $originalName = $image->getClientOriginalName();
            $path = 'public/photos/' . $originalName;
            $image->move(public_path('photos'), $originalName);

            // Get image size
            $imageSize = getimagesize(public_path('photos/' . $originalName));
            $width = $imageSize[0];
            $height = $imageSize[1];

            // Store image size to database
            $attributes['rich_menu_image_url'] = $path;
            $attributes['size_width'] = $width;
            $attributes['size_height'] = $height;
        }

        return static::create($attributes);
    }
}