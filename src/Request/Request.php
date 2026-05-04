<?php

declare(strict_types=1);

namespace App\Request;

class Request {
    public function __construct(
        private string $uri,
        private string $method,
        private string $path,
    ) {
    }
    public static function createFromGlobals() {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $rawPath = parse_url($uri, PHP_URL_PATH) ?? '/';
        if (!$rawPath) {
            $rawPath = '/';
        }
        $rawPath = rtrim($rawPath, '/');
        $path = $rawPath ?: '/';

        return new self(
            uri: $uri,
            method: $method,
            path: $path,
        );
    }
    public function uri() {
        return $this->uri;
    }
    public function method() {
        return $this->method;
    }
    public function path() {
        return $this->path;
    }
}
