<?php

namespace Core\Response;

class Response
{
    public static function setStatusCode(int $code)
    {
        http_response_code($code);
    }
}
