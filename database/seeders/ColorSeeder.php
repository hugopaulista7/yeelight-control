<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{

    protected $data = [
        [
            'name' => 'red',
            'hex'  => 'FF0000'
        ],
        [
            'name' => 'green',
            'hex'  => '00FF00'
        ],
        [
            'name' => 'blue',
            'hex'  => '0000FF'
        ],

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->data as $data) {
            $color = new Color($data);
            $color->save();
        }
    }
}
