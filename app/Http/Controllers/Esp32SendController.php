<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Esp32SendController extends Controller
{
    public function sendData(Request $request)
    {
        // Địa chỉ API của ESP32 (URL ESP32 để nhận dữ liệu)
        $esp32_url = 'http://esp32.local/receive';  // Thay đổi URL này với IP hoặc tên miền của ESP32

        // Dữ liệu cần gửi (ví dụ thông báo và hình ảnh hoặc dữ liệu khác)
        $data = [
            'message' => $request->input('message', 'Default message'),  // Lấy thông báo từ request, nếu không có thì sử dụng mặc định
            'temperature' => $request->input('temperature', 25),  // Ví dụ, gửi thông tin nhiệt độ
        ];

        // Gửi yêu cầu POST tới ESP32
        $response = Http::post($esp32_url, $data);

        // Kiểm tra phản hồi từ ESP32
        if ($response->successful()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data sent successfully to ESP32'
            ]);
        }

        // Trả về lỗi nếu không thành công
        return response()->json([
            'status' => 'error',
            'message' => 'Failed to send data to ESP32'
        ]);
    }
}
