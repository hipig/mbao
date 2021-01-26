<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use WebSocket\Client;

class CardsController extends Controller
{
    public function index(Request $request)
    {
        $cardQuery = Card::query();

        if ($request->has('group_id')) {
            $cardQuery->where('group_id', $request->group_id);
        }

        $cards = $cardQuery->get();

        return CardResource::collection($cards);
    }

    public function toAudio(Request $request, Card $card)
    {
        $appId = config('xfyun.tts.app_id');
        $apiKey = config('xfyun.tts.api_key');
        $apiSecret = config('xfyun.tts.api_secret');
        $host = 'tts-api.xfyun.cn';
        $requestLine = 'GET /v2/tts HTTP/1.1';
        $date = gmstrftime("%a, %d %b %Y %T %Z", time());

        $signatureOrigin = "host: $host\ndate: $date\n$requestLine";
        $signatureSha = hash_hmac('sha256', $signatureOrigin, $apiSecret, true);
        $signature = base64_encode($signatureSha);

        $authrization = base64_encode("api_key=\"$apiKey\",algorithm=\"hmac-sha256\",headers=\"host date request-line\",signature=\"$signature\"");
        $url = 'wss://tts-api.xfyun.cn/v2/tts?' . http_build_query([
                'host' => $host,
                'date' => $date,
                'authorization' => $authrization
            ]);

        $client = new Client($url);

        //   $client->connect();

        $data = json_encode([
            'common' => [
                'app_id' => $appId
            ],
            'business' => [
                'aue' => 'lame',
                'sfl' => 1,
                'vcn' => 'xiaoyan',//发音人
                'tte' => "UTF8"
            ],
            'data' => [
                'text' => base64_encode('苹果'),
                'status' => 2
            ]
        ]);
        $client->send($data);

        $result = '';
        while (true) {
            $message = json_decode($client->receive());
            switch ($message->data->status) {
                case 1:
                    $result .= base64_decode($message->data->audio);
                    echo "目前正在合成，合成长度为：" . strlen($result) . "\n";
                    break;
                case 2:
                    $result .= base64_decode($message->data->audio);
                    echo "合成已结束，总合成长度为：" . strlen($result) . "\n";
                    break 2;
            }
        }
        Storage::disk('audio')->put(time() . ".mp3", $result);
    }
}
