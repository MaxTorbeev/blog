<?php

namespace App\Http;

class Flash {

    public function create($title, $message, $level, $key = 'flash_message')
    {
        session()->flash($key, [
            'title'     => $title,
            'message'   => $message,
            'level'     => $level
        ]);
    }

    /**
     * Create an information flash message.
     *
     * @param $title
     * @param $message
     */
    public function info($title, $message)
    {
        return $this->create($title, $message, 'info');
    }

    /**
     * Create a success flash message
     *
     * @param $title
     * @param $message
     */
    public function success($title, $message)
    {
        return $this->create($title, $message, 'success');
    }

    /**
     * Create a error flash message
     *
     * @param $title
     * @param $message
     */
    public function error($title, $message)
    {
        return $this->create($title, $message, 'error');
    }

    public function overlay($title, $message, $level = 'success')
    {
        return $this->create($title, $message, $level, 'flash_message_overlay');
    }
}