<?php

namespace Force\API;

use GuzzleHttp\Client;

class Http
{

    /**
     * The GuzzleHttp client.
     *
     * @var Client
     */
    protected $guzzle;

    /**
     * Number of seconds a request is retried.
     *
     * @var int
     */
    public $timeout = 30;

    public function __construct(Client $guzzle = null)
    {
        $this->guzzle = $guzzle ?: new Client([
            'base_uri'    => 'https://api.fallback.forcehost.net/',
            'http_errors' => false,
        ]);

        return $this;
    }

    /**
     * Make a GET request and return the response.
     *
     * @param string $uri
     *
     * @return mixed
     */
    public function get($uri)
    {
        return $this->request('GET', "$uri");
    }

    /**
     * Make a POST request and return the response.
     *
     * @param string $uri
     * @param array  $query
     * @param array  $payload
     *
     * @return mixed
     */
    public function post($uri, array $query = [], array $payload = [])
    {
        return $this->request('POST', $uri, $query, $payload);
    }

    /**
     * Make a PUT request and return the response.
     *
     * @param string $uri
     * @param array  $query
     * @param array  $payload
     *
     * @return mixed
     */
    public function put($uri, array $query = [], array $payload = [])
    {
        return $this->request('PUT', $uri, $query, $payload);
    }

    /**
     * Make a PATCH request and return the response.
     *
     * @param string $uri
     * @param array  $query
     * @param array  $payload
     *
     * @return mixed
     */
    public function patch($uri, array $query = [], array $payload = [])
    {
        return $this->request('PATCH', $uri, $query, $payload);
    }

    /**
     * Make a DELETE request and return the response.
     *
     * @param string $uri
     * @param array  $query
     * @param array  $payload
     *
     * @return mixed
     */
    public function delete($uri, array $query = [], array $payload = [])
    {
        return $this->request('DELETE', $uri, $query, $payload);
    }

    /**
     * Retry the callback or fail after x seconds.
     *
     * @param int      $timeout
     * @param callable $callback
     *
     * @return mixed
     */
    public function retry($timeout, $callback)
    {
        $start = time();

        beginning:

        $output = $callback();

        if ($output) {
            return $output;
        }

        if (time() - $start < $timeout) {
            sleep(5);

            goto beginning;
        }

        throw new TimeoutException($output);
    }

    /**
     * Set a new timeout.
     *
     * @param int $timeout
     *
     * @return $this
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * Get the timeout.
     *
     * @return int
     */
    public function getTimeout()
    {
        return $this->timeout;
    }
}