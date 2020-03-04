<?php

namespace App\Services\Watson;

use Exception;
use GuzzleHttp\Client as GuzzleClient;

class WatsonTone
{
    protected $client;
    protected $user;
    protected $password;

    public function __construct()
    {
        $this->client = new GuzzleClient([
            'base_uri' => env('WATSON_APIURL'),
        ]);
        $this->user = env('WATSON_USER');
        $this->password = env('WATSON_PASSWORD');
    }

    public function analyze($sentence)
    {
        $request = $this->client->request(
            'GET',
            '/v3/tone?version=2017-09-21&text='.urlencode($sentence),
            ['auth' => $this->getCredentials()]
        );

        $statusCode = $request->getStatusCode();
        if ($statusCode != 200) {
            throw new Exception('Erro ao efetuar a busca no Watson Tone');
        }

        $response = json_decode($request->getBody()->getContents());

        return $response;
    }

    public function getCredentials()
    {
        return [$this->user, $this->password];
    }
}
