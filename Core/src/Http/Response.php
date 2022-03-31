<?php

namespace Core\Http;


class Response
{
    /**
     * @param array $data
     * @return false|string
     */
    public function json(array $data)
    {
        echo json_encode($data);
    }
}
