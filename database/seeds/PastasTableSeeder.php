<?php
use App\Pasta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class PastasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $pastas = config('products');

        foreach ($pastas as $pasta) {
            $new_pasta = new Pasta();
            $new_pasta->name = $pasta->nome;
            $new_pasta->slug = Str::slug($pasta->nome, '-');
            $new_pasta->image = $pasta->immagine;
            $new_pasta->type = $pasta->tipo;
            $new_pasta->description = $faker->paragraph();
            $new_pasta->save();
        }

    }
}
