<?php 

namespace App\Http\Controllers\API;

class ResponseFormatter
{
   
    protected static $response = [
        'meta' => [
            'code' => 200,
            'status' => 'success',
            'message' => null
        ],
        'data' => null
    ];

    //ini untuk yang sukses
    public static function success($data = null, $message = null)
    {
        //jadi kita menyimpan message yang ada disini ke dalam variabel yang di atas
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;

        //kita membuat otuput json
        return response()->json(self::$response, self::$response['meta']['code']);
    }

    //ini untuk error
    public static function error($data = null, $message = null, $code=400)
    {
        //jadi kita menyimpan message yang ada disini ke dalam variabel yang di atas
        self::$response['meta']['status'] = 'error';
        self::$response['meta']['code'] = $code;
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;

        //kita membuat otuput json
        return response()->json(self::$response, self::$response['meta']['code']);
    }

}