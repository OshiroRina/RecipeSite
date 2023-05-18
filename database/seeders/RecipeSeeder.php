<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert([
            [
                'name' => 'Oyako Don (おやこどん)',
                'secondary_category_id' => 1,
                'information' => 'Oyako-Don normalmente tiene pollp,huevo y cebolla. Va bien con arroz.El nombre proviene del hecho de que el pollo (padre) y los huevos (hijos) se cocinan juntos.',
                'image' => '/images/recipe1/oyakodon.jpeg',
                'ingredient1' => '1/4 de pollo',
                'ingredient2' => '2 huevos',
                'ingredient3' => '1/2 de cebolla',
                'ingredient4' => '1 cucharada de dashi',
                'ingredient5' => '1 cucharada de salsa de soja',
                'ingredient6' => '1/2 cucharada de azucar',
                'ingredient7' => '100ml de agua',
                'ingredient8' => null,
                'ingredient9' => null,
            ],
            [
                'name' => 'Chan Chan Yaki (しゃけのちゃんちゃんやき)',
                'secondary_category_id' => 2,
                'information' => 'Es un plato tradicional de la prefecture Hokkaido. Tine salmon y varias verduras(normalment repollo,zanahoria,cebolla...etc)',
                'image' => '/images/recipe2/chanchan.jpg',
                'ingredient1' => '2 rebanadas de salmón',
                'ingredient2' => '1/4 de repollo',
                'ingredient3' => '1/2 de cebolla',
                'ingredient4' => '2 cucharada de miso',
                'ingredient5' => '1 cucharada de azucar',
                'ingredient6' => '1 diente de ajo',
                'ingredient7' => '50ml de sake',
                'ingredient8' => null,
                'ingredient9' => null,
            ],
            [
                'name' => 'Nasu Miso Itame (なすみそいため)',
                'secondary_category_id' => 3,
                'information' => 'Es un plato que se suele hacer en casa. Normalmente tiene carne,berenjena,y pimiento...etc. Va muy bien con arroz. ',
                'image' => '/images/recipe3/nasumiso.jpeg',
                'ingredient1' => '1 berenjena',
                'ingredient2' => '200g de cerdo',
                'ingredient3' => '1/2 de cebolla',
                'ingredient4' => '2 cucharada de miso',
                'ingredient5' => '1 cucharada de azucar',
                'ingredient6' => '1 diente de ajo',
                'ingredient7' => '50ml de sake',
                'ingredient8' => null,
                'ingredient9' => null,
            ],
            [
                'name' => 'Onigiri (おにぎり)',
                'secondary_category_id' => 4,
                'information' => 'Es la comida muy simple , pero se come mucho en Japon. Dentro de arroz tiene varios ingredientes(ciruela salada,atun con mayonesa...etc)',
                'image' => '/images/recipe4/onigiri.jpg',
                'ingredient1' => '200g de arroz',
                'ingredient2' => '1g de sal',
                'ingredient3' => 'ciruela salada,atun con mayonesa (lo que quera)',
                'ingredient4' => '(algas)',
                'ingredient5' => null,
                'ingredient6' => null,
                'ingredient7' => null,
                'ingredient8' => null,
                'ingredient9' => null,
            ],
            [
                'name' => 'Tamagotoji Udon (たまごとじうどん)',
                'secondary_category_id' => 5,
                'information' => 'Udon es un fideo hecho de harina. La sopa tiene huevo y Dashi.',
                'image' => '/images/recipe5/tamagotozi.jpg',
                'ingredient1' => '200g de Udon',
                'ingredient2' => '1 huevo',
                'ingredient3' => '400ml de agua',
                'ingredient4' => '1 cucharada de dashi',
                'ingredient5' => '1 cucharada de azucar',
                'ingredient6' => '2 cucharada de salsa de soja',
                'ingredient7' => '50ml de sake',
                'ingredient8' => '1 cucharada de almidón de patata',
                'ingredient9' => null,
            ],
            [
                'name' => 'Pepe Tama (ぺぺタマ)',
                'secondary_category_id' => 6,
                'information' => 'Es la pasta original de Japon.Está mezclado la carbonara y peperoncino.',
                'image' => '/images/recipe6/pepetama.jpg',
                'ingredient1' => '150g de pasta',
                'ingredient2' => '1 huevo',
                'ingredient3' => '400ml de agua',
                'ingredient4' => '1 cucharada de dashi',
                'ingredient5' => '1 cucharada de azucar',
                'ingredient6' => '1 cucharada de salsa de soja',
                'ingredient7' => '50ml de sake',
                'ingredient8' => 'un poco de pimiento picante',
                'ingredient9' => '50g de bacon',
            ],
            [
                'name' => 'Miso Shiru (みそしる)',
                'secondary_category_id' => 7,
                'information' => 'Es una sopa de miso. Nolmalment tiene Tohu,algas marinas...etc',
                'image' => '/images/recipe7/misoshiru.jpg',
                'ingredient1' => '200ml de agua',
                'ingredient2' => '100g de toju',
                'ingredient3' => '1/2 de cebolla',
                'ingredient4' => '2 cucharada de miso',
                'ingredient5' => '1 cucharada de dashi',
                'ingredient6' => '(algas)',
                'ingredient7' => null,
                'ingredient8' => null,
                'ingredient9' => null,
            ],
            [
                'name' => 'Obento (おべんとう)',
                'secondary_category_id' => 8,
                'information' => 'Es una caja de almuerzo. En la caja llevan varias comida.',
                'image' => '/images/recipe8/obento.jpg',
                'ingredient1' => null,
                'ingredient2' => null,
                'ingredient3' => null,
                'ingredient4' => null,
                'ingredient5' => null,
                'ingredient6' => null,
                'ingredient7' => null,
                'ingredient8' => null,
                'ingredient9' => null,
            ],
            [
                'name' => 'Mochi Daihuku (だいふく)',
                'secondary_category_id' => 9,
                'information' => 'Es un dulce tradicional de Japon. Dentro de mochi tiene varias ingredientes(frijoles dulces,frutas...etc)',
                'image' => '/images/recipe9/daihuku.jpg',
                'ingredient1' => null,
                'ingredient2' => null,
                'ingredient3' => null,
                'ingredient4' => null,
                'ingredient5' => null,
                'ingredient6' => null,
                'ingredient7' => null,
                'ingredient8' => null,
                'ingredient9' => null,
            ],
            // [
            //     'name' => 'Mochi Daihuku',
            //     'secondary_category_id' => 8,
            //     'information' => 'Es un dulce tradicional de Japon. Dentro de mochi tiene varias ingredientes(frijoles dulces,frutas...etc)',
            // ],
        ]);
    }
}
