<?php

namespace App\Helpers;

use GuzzleHttp\Client;

class Globals {

	protected $client;

    public function __construct()
	{
        $this->client = new Client();
	}

    public function request($url, $method, $headers = [], $data = [])
	{

		try {
			$options = [];

			if (COUNT($headers) > 0) {
				$options["headers"] = $headers;
			}

			if (COUNT($data) > 0) {
				$options["json"] = $data;
			}

			$response = $this->client->request($method, $url, $options);
			return $response;
		} catch (\GuzzleHttp\Exception\RequestException $e) {
			return $e->getResponse();
		} catch (\Exception $e) {
			return false;
		}
	}

	public function processResponse($result)
	{
		$statusCode = $result->getStatusCode();
		$data = $result->getBody();
		$responseData = json_decode($data, true);
		return [
			'status' => $statusCode,
			'body' => $responseData
		];
	}

}

