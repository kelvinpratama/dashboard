<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class JasperController extends Controller
{
    public function index() {
        $baseURL = 'https://restapi7.jasper.com/rws/api/v1/';
        $param = 'devices?accountId=100373114&modifiedSince=2016-04-18T17%3A31%3A34%2B00%3A00&pageSize=50&pageNumber=1';
        $username = 'kelvin';
        $apiKey = '65b4c8ea-2dc1-47d6-a42f-5fd861808323';
        //$authorizationKey = 'Basic ' . base64_encode($username . ':' . $apiKey);

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $baseURL,
        ]);

        //$response = $client->request('GET', 'echo/helloWorld', ['auth' => [$username, $apiKey]]);
        $response = $client->request('GET', $param, ['auth' => [$username, $apiKey]]);

        //get ICCID search by AccountID

        $body = $response->getBody();
        echo $body;
    }
}
