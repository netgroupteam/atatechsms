<?php


namespace Netgroup\AtaTechSms;


use GuzzleHttp\Client;
use Spatie\ArrayToXml\ArrayToXml;
use Netgroup\AtaTechSms\ResponseCodes;

trait BroadcastSmsHelper
{
    private $credentials;
    private $client;
    private $response;

    public function __construct()
    {
        $this->credentials = config('atatechsms.credentials');
        $this->client = new Client();
        $this->response = new ResponseCodes();
    }

    public function getCredentials(){
        return $this->credentials;
    }

    public function sendBulkMessage($title, $bulkMessage, $scheduleDate, $phoneNumbers = []){
        $requestHeader = [
            'head'  => [
                'operation' => 'submit',
                'login' => $this->credentials['login'],
                'password' => $this->credentials['password'],
                'title' => $title,
                'bulkmessage' => $bulkMessage,
                'scheduled' => $scheduleDate,
                'isbulk' => true,
                'controlid' => $this->controlIdGenerator(),
            ],
        ];

        $arr = [];
        foreach ($phoneNumbers as $phone){
            $arr[] = ['msisdn' => $phone];
        }

        $requestHeader['body'] = $arr;

        $xml = ArrayToXml::convert($requestHeader, [
            'rootElementName' => 'request',
        ], true, 'UTF-8');

        $status = $this->send($xml);
        return ['message' => $this->response->getStatus($status['head']['responsecode'])];
    }

    public function sendIndividualMessage($title, $scheduleDate, $phonesMessages = []){
        $requestHeader = [
            'head'  => [
                'operation' => 'submit',
                'login' => $this->credentials['login'],
                'password' => $this->credentials['password'],
                'title' => $title,
                'scheduled' => $scheduleDate,
                'isbulk' => 'false',
                'controlid' => $this->controlIdGenerator(),
            ],
        ];

        $arr = [];
        foreach ($phonesMessages as $phone => $message){
            $arr[] = [
                'msisdn' => $phone,
                'message' => $message
            ];
        }

        $requestHeader['body'] = $arr;

        $xml = ArrayToXml::convert($requestHeader, [
            'rootElementName' => 'request',
        ], true, 'UTF-8');


        $status = $this->send($xml);
        return ['message' => $this->response->getStatus($status['head']['responsecode'])];
    }


    public function controlIdGenerator(){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 28; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    public function send($xml){
        $options = [
            'headers' => [
                'Content-Type' => 'text/xml; charset=UTF8'
            ],
            'body' => $xml,
            'verify' => false
        ];


        $response = $this->client->request('POST', $this->credentials['host_api'], $options);

        $simpleXml = simplexml_load_string($response->getBody(), 'SimpleXMLElement', LIBXML_NOCDATA);
        $json = json_encode($simpleXml);
        $array = json_decode($json, true);

        return $array;
    }
}
