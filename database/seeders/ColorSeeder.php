<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{

    protected $data = [
        [
            'name' => 'red',
            'rgb'  => '16711680'
        ],
        [
            'name' => 'green',
            'rgb'  => '65280'
        ],
        [
            'name' => 'blue',
            'rgb'  => '255'
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
