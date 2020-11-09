<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Traits\YeelightDeviceTrait;
use Illuminate\Support\Facades\DB;

class ColorController extends Controller
{

    use YeelightDeviceTrait;


    public function list()
    {
        $query = "SELECT name, hex FROM colors";
        $colors = DB::select($query);
        return view('welcome', ['colors' => $colors]);
    }

    public function change(string $color)
    {
        $colors = $this->getColorsRaw('name');

        if (!in_array($color, $colors) && $color !== 'random') {
            return 'Color not found';
        }

        $this->start();

        if ($color === 'random') {
            $this->changeRandomColor();
        } else {
            $this->changeSingleColor($color);
        }
        return 'Color has changed';
    }


    private function getColorsRaw($column)
    {
        $query = "SELECT $column FROM colors";
        return array_map(function ($item) use ($column) {
            return $item->$column;
        }, DB::select($query));

    }

    private function changeRandomColor()
    {
        $colors = $this->getColorsRaw('hex');
        $index = random_int(0, count($colors) - 1);

        $hex = hexdec($colors[$index]);

        $this->changeColor($hex);
    }

    private function changeSingleColor($color)
    {
        $hex = Color::where('name', $color)->first()->hex;

        $this->changeColor(hexdec($hex));
    }


}
