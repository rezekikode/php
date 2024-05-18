<?php

class Response
{
    public static function json($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public static function error($message)
    {
        self::json([
            'status' => 'error',
            'message' => $message,
            'data' => []
        ]);
    }

    public static function success($message, $data)
    {
        self::json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ]);
    }
}