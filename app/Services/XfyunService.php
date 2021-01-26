<?php


namespace App\Services;


use WebSocket\Client;

class XfyunService
{
    protected $host = 'tts-api.xfyun.cn';

    protected $appId;

    protected $apiKey;

    protected $apiSecret;

    public function __construct()
    {
        $this->appId = config('xfyun.tts.app_id');
        $this->apiKey = config('xfyun.tts.api_key');
        $this->apiSecret = config('xfyun.tts.api_secret');
    }

    public function toAudio($text, $vcn = '')
    {
        $date = gmstrftime("%a, %d %b %Y %T %Z", time());

        $signature = $this->getSignature($date);
        $authrization = $this->getAuthrization($signature);

        $prefixUrl = "wss://$this->host/v2/tts?";
        $client = $this->newClient($prefixUrl . $this->buildQuery($authrization, $date));


    }

    protected function newClient($url)
    {
        return new Client($url);
    }

    protected function buildQuery($authrization, $date)
    {
        return http_build_query([
            'host' => $this->host,
            'date' => $date,
            'authrization' => $authrization,
        ]);
    }

    protected function getSignature($date)
    {
        $requestLine = 'GET /v2/tts HTTP/1.1';

        $signatureOrigin = "host: $this->host\ndate: $date\n$requestLine";
        $signatureSha = hash_hmac('sha256', $signatureOrigin, $this->apiSecret, true);

        return base64_encode($signatureSha);
    }

    protected function getAuthrization($signature)
    {
        return base64_encode("api_key=\"$this->apiKey\",algorithm=\"hmac-sha256\",headers=\"host date request-line\",signature=\"$signature\"");
    }

}
