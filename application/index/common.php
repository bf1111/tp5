<?php
function show($status,$message,$data=[])
{
    return json_encode([
        'status' => intval($status),
        'message' => $message,
        'data' => $data
    ]);
}