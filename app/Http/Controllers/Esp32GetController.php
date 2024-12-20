<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class Esp32GetController extends Controller
{
    public function receiveData(Request $request)
    {
        // Kiểm tra xem có dữ liệu hình ảnh và thông báo không
        if ($request->hasFile('image') && $request->has('message')) {

            // Lấy thông báo từ request
            $message = $request->input('message');
            
            // Lưu hình ảnh vào thư mục công khai
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');  // Lưu vào thư mục public/images

            // Lưu thông báo và đường dẫn hình ảnh vào cơ sở dữ liệu
            // Ví dụ: Lưu thông báo vào cơ sở dữ liệu
            Message::create([
                'message' => $message,
                'image_path' => $imagePath
            ]);

            // Trả về phản hồi thành công
            return response()->json([
                'status' => 'success',
                'message' => 'Data received successfully',
                'received_message' => $message,
                'image_path' => $imagePath
            ], 200);

        }

        // Nếu không có hình ảnh hoặc thông báo
        return response()->json([
            'status' => 'error',
            'message' => 'No message or image received'
        ], 400);
    }
}
