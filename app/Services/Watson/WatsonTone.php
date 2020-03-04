<?php

namespace App\Services\Watson;

use \GuzzleHttp\Client as GuzzleClient;

class WatsonTone
{
    protected $client;
    protected $user;
    protected $password;

    public function __construct()
    {
        $this->client = new GuzzleClient([
            'base_uri' => env('WATSON_APIURL')
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
        $response = $request->getBody();
        dd($response);
        return $response;
    }

    public function getCredentials()
    {
        return [$this->user, $this->password];
    }
}
