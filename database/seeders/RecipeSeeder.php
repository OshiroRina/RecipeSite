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
                'primary_category_id' => 1,
                'secondary_category_id' => 1,
                'information' => 'El oyakodon es un plato popular en Japón y se encuentra en muchos restaurantes de comida japonesa.Consiste en un tazón de arroz cubierto con pollo y huevo batido cocinados juntos en un caldo a base de dashi (un caldo de pescado japonés) y salsa de soja.El nombre "oyakodon" significa literalmente "madre e hijo en un tazón", haciendo referencia al pollo (madre) y al huevo (hijo) que se cocinan juntos.',
                'image' => '/images/recipe1/oyakodon.jpg',
                'ingredient1' => '1/4 de pollo',
                'ingredient2' => '2 huevos',
                'ingredient3' => '1/2 de cebolla',
                'ingredient4' => '1 cucharada de dashi',
                'ingredient5' => '1 cucharada de salsa de soja',
                'ingredient6' => '1/2 cucharada de azucar',
                'ingredient7' => '100ml de agua',
                'ingredient8' => null,
                'ingredient9' => null,
                'cook_time' => '30 minutos'
            ],
            [
                'name' => 'Chan Chan Yaki (しゃけのちゃんちゃんやき)',
                'primary_category_id' => 2,
                'secondary_category_id' => 4,
                'information' => 'Es un plato tradicional de la prefecture Hokkaido. Tiene salmon y varias verduras(normalment repollo,zanahoria,cebolla...etc)',
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
                'cook_time' => '40 minutos'
            ],
            [
                'name' => 'Nasu Miso Itame (なすみそいため)',
                'primary_category_id' => 3,
                'secondary_category_id' => 7,
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
                'cook_time' => '20 minutos'
            ],
            [
                'name' => 'Onigiri (おにぎり)',
                'primary_category_id' => 4,
                'secondary_category_id' => 12,
                'information' => 'El onigiri es una opción popular y conveniente para llevar como comida portátil, ya que no necesita cubiertos y se puede comer fácilmente con las manos. Es común encontrarlos en las tiendas de conveniencia y supermercados en Japón, y también se preparan en casa. Además, existen muchos sabores y variedades de onigiri(ciruela salada,atun con mayonesa...etc),lo que lo convierte en una opción versátil para satisfacer diferentes gustos.',
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
                'cook_time' => '20 minutos'
            ],
            [
                'name' => 'Tamagotoji Udon (たまごとじうどん)',
                'primary_category_id' => 5,
                'secondary_category_id' => 14,
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
                'cook_time' => '30 minutos'
            ],
            [
                'name' => 'Pepe Tama (ぺぺタマ)',
                'primary_category_id' => 6,
                'secondary_category_id' => 18,
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
                'cook_time' => '30 minutos'
            ],
            [
                'name' => 'Miso Shiru (みそしる)',
                'primary_category_id' => 7,
                'secondary_category_id' => 19,
                'information' => 'La sopa de miso es un plato clásico de la cocina japonesa que se prepara a base de pasta de miso, un condimento fermentado hecho principalmente de soja.La sopa de miso se sirve generalmente en tazones individuales y se acompaña de arroz y otros platos japoneses. Es común en el desayuno, almuerzo o cena en Japón, y se considera una parte esencial de la comida diaria.Nolmalment tiene Tohu,algas marinas...etc',
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
                'cook_time' => '30 minutos'
            ],
            [
                'name' => 'Obento (おべんとう)',
                'primary_category_id' => 8,
                'secondary_category_id' => null,
                'information' => 'Se refiere a una comida preparada en una caja o contenedor, generalmente para ser llevada y consumida fuera de casa.
                También se conoce como "bento" o "lunch box".
                El obento generalmente consta de varios componentes que se organizan y colocan cuidadosamente en compartimentos separados dentro de la caja.
                Estos componentes pueden incluir arroz, carne o pescado, verduras, encurtidos, tofu, huevos, frutas y otros acompañamientos.',
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
                'cook_time' => '1 hora'
            ],
            [
                'name' => 'Mochi Daihuku (だいふく)',
                'primary_category_id' => 9,
                'secondary_category_id' => 21,
                'information' => 'El daifuku es un popular postre japonés que consiste en una bola de mochi (una masa de arroz glutinoso) rellena con diversos ingredientes dulces.(frijoles dulces,frutas...etc)',
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
                'cook_time' => '1 hora'
            ],
            // [
            //     'name' => 'Mochi Daihuku',
            //     'primary_category_id' => 8,
            //     'information' => 'Es un dulce tradicional de Japon. Dentro de mochi tiene varias ingredientes(frijoles dulces,frutas...etc)',
            // ],
        ]);
    }
}
