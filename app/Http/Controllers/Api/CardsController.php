<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Models\Card;
use Hipig\LaravelTts\Exceptions\NoGatewayAvailableException;
use Hipig\LaravelTts\Tts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

    public function toAudio(Request $request, Card $card, Tts $tts)
    {
        try {
            $responses = $tts->to($card->name_en, [
                'spd' => 30,
                'per' => 'xiaoyan',
            ]);
        } catch (NoGatewayAvailableException $e) {
            abort(500, $e->getException('xfyun')->getMessage() ?? '语音合成失败');
        }

        foreach ($responses as $gateway => $response) {
            $path = "$gateway/" . Str::random(40) . ".mp3";
            Storage::disk('audio')->put($path, $response['result']->data->audio);
        }
    }
}
