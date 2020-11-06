<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = $this->getData();

        foreach($colors as $currentColor) {
            $color = new Color($currentColor);
            $color->save();
        }
    }

    private function getData()
    {
        $content = File::get(public_path('colors.json'));
        $colors = collect(json_decode($content));

        $keys = $colors->keys();

        $finalColors = [];

        foreach ($keys as $key) {
            $finalColors[] = [
                'name' => $key,
                'hex'  => Str::upper(str_replace('#', '', $colors[$key]->hex))
            ];
        }
        return $finalColors;
    }
}
