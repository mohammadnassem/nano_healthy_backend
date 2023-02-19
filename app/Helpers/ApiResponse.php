<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Storage;

class ApiResponse
{

    const MSG_FAILED = "responses.msg_failed";
    const MSG_SEND_REQUEST = "responses.msg_send_request";


    /**
     * return success responses with data and pagination if request has paginate request.
     *
     * @param array|null $data
     * @param string $message
     * @param int $code
     * @param array $pagination
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public static function success($data = null, $message = '', $code = 200, $pagination = null)
    {
        $response_content = [
            'data' => $data,
            'message' => trans($message),
            'status' => $code == 200 || $code == 204 || $code == 201 || $code == 203,
            'pagination' => $pagination
        ];

        return response()->json($response_content, $code);
    }


    /**
     * return error response with message and status only.
     *
     * @param string $message
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public static function error($message = '', $code = 500)
    {
        $response_content = [
            'message' => trans($message),
            'status' => false,
        ];

        return response()->json($response_content, $code);
    }

    public static function getImages()
    {
        return collect(Storage::allFiles('public/images/login'))
            ->transform(fn ($image) => asset('storage/' . explode('/', $image, 2)[1]))
            ->random(3);
    }
}
