<?php
 
namespace App\Http\Requests;
 
use Illuminate\Foundation\Http\FormRequest;
 
class ImageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
 
    public function rules()
    {
        return [
            'image' => [
                // ファイルがアップロードされている
                'file',
                // ファイル形式がJPEGかPNG
                'mimes:jpeg,jpg,png',
                // 画像のサイズ
                'dimensions:min_width=100,min_height=100,max_width=500,max_height=500',
            ],
        ];
    }
}