<?php

namespace App\Http\Libraries;

use Illuminate\Support\Facades\Session;

class Response {

    private array $message = [];
    private array $data = [];
    private array $action = [];

    // Sucesso
    public function success(string $message, int $duration = 5000): Response {
        $this->message[] = [
            'type' => 'success',
            'text' => $message,
            'duration' => $duration
        ];
        return $this;
    }

    // Erro
    public function error(string $message, int $duration = 5000): Response {
        $this->message[] = [
            'type' => 'danger', // note-danger no CSS
            'text' => $message,
            'duration' => $duration
        ];
        return $this;
    }

    // Alerta
    public function warning(string $message, int $duration = 5000): Response {
        $this->message[] = [
            'type' => 'warning',
            'text' => $message,
            'duration' => $duration
        ];
        return $this;
    }

    // Informação
    public function info(string $message, int $duration = 5000): Response {
        $this->message[] = [
            'type' => 'info',
            'text' => $message,
            'duration' => $duration
        ];
        return $this;
    }

    // Retornar dados
    public function data(array $data): Response {
        $this->data = $data;
        return $this;
    }

    // Converter para JSON
    public function json() {
        $response = [];
        if (!empty($this->message)) {
            $response['message'] = $this->message;
        }
        if (!empty($this->data)) {
            $response['data'] = $this->data;
        }
        if (!empty($this->action)) {
            $response['action'] = $this->action;
        }

        return response()->json($response);
    }

    public function flash(): self 
    {
        if (!empty($this->message)) {
            session()->flash('notification', $this->message);
        }
        return $this;
    }

}
