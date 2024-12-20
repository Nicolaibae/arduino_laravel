<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        // Kiểm tra xem có dữ liệu gửi đến hay không
        if (!$request->hasFile('image') || !$request->has('message')) {
            return response()->json(['error' => 'No image or message provided'], 400);
        }

        // Lấy thông báo và hình ảnh
        $message = $request->input('message');
        $image = $request->file('image');

        // Lưu ảnh vào storage
        $imageName = Str::random(10) . '.jpg'; // Tạo tên file ngẫu nhiên
        $imagePath = $image->storeAs('images', $imageName, 'public');

        // Lưu thông báo vào cơ sở dữ liệu hoặc bất kỳ đâu bạn muốn
        // Ví dụ: lưu thông báo và đường dẫn ảnh vào database
        // Message::create(['message' => $message, 'image_path' => $imagePath]);

        // Trả về kết quả
        return response()->json(['message' => 'Upload successful', 'image' => $imagePath], 200);
    }

}
