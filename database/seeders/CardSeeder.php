<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\CardGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CardGroup::query()->truncate();
        Card::query()->truncate();

        $colors = array_values(CardGroup::$colorMap);

        $file = file_get_contents(storage_path('seeders/card.json'));
        $groupItems = json_decode($file, true);

        foreach ($groupItems as $item) {

            $group = CardGroup::create([
                'name' => $item['groupTitle'],
                'name_en' => $item['groupTitle_en'],
                'cover' => $this->putImage($item['group_img']),
                'color' => Arr::random($colors),
                'is_pro' => $item['isPro'],
            ]);

            if ($item['items']) {
                foreach ($item['items'] as $cardItem) {
                    Card::create([
                        'group_id' => $group->getKey(),
                        'name' => $cardItem['name_ch'],
                        'name_en' => $cardItem['name_en'],
                        'spell_cn' => $cardItem['spell_ch'],
                        'spell_us' => $cardItem['spell_ap'],
                        'spell_uk' => $cardItem['spell_ep'],
                        'cover' => $this->putImage($cardItem['img']),
                        'color' => $colors[$cardItem['back_color_type']] ?? Card::COLOR_INDIGO,
                    ]);
                }
            }
        }
    }

    protected function putImage($url)
    {
        $response = Http::get(stripslashes($url));
        $path = 'images/'. Str::random(40) . '.png';
        Storage::disk('upload')->put($path, $response);

        return $path;
    }
}
