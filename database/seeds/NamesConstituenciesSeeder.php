<?php

use Illuminate\Database\Seeder;

class NamesConstituenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('names_constituencies')->insert([
            ['name' => 'Chișinau', 'language_id' => '1', 'constituencies_id' => '1'],
            ['name' => 'Кишинэу', 'language_id' => '2', 'constituencies_id' => '1'],
            ['name' => 'Briceni, Ocnița', 'language_id' => '1', 'constituencies_id' => '2'],
            ['name' => 'Бричаны, Окница', 'language_id' => '2', 'constituencies_id' => '2'],
            ['name' => 'Ocnița, Dondușeni', 'language_id' => '1', 'constituencies_id' => '3'],
            ['name' => 'Окница, Дондюшаны', 'language_id' => '2', 'constituencies_id' => '3'],
            ['name' => 'Edineț', 'language_id' => '1', 'constituencies_id' => '4'],
            ['name' => 'Единцы', 'language_id' => '2', 'constituencies_id' => '4'],
            ['name' => 'Rîscani, Drochia, Dondușeni', 'language_id' => '1', 'constituencies_id' => '5'],
            ['name' => 'Рышкань, Дрокия, Дондюшаны', 'language_id' => '2', 'constituencies_id' => '5'],
            ['name' => 'Glodeni, Rîscani', 'language_id' => '1', 'constituencies_id' => '6'],
            ['name' => 'Глодень, Рышкань', 'language_id' => '2', 'constituencies_id' => '6'],
            ['name' => 'Drochia, Donduseni, Soroca', 'language_id' => '1', 'constituencies_id' => '7'],
            ['name' => 'Дрокия, Дондюшаны, Сорока', 'language_id' => '2', 'constituencies_id' => '7'],
            ['name' => 'Soroca', 'language_id' => '1', 'constituencies_id' => '8'],
            ['name' => 'Сорока', 'language_id' => '2', 'constituencies_id' => '8'],
            ['name' => 'Florești', 'language_id' => '1', 'constituencies_id' => '9'],
            ['name' => 'Флорешть', 'language_id' => '2', 'constituencies_id' => '9'],
            ['name' => 'Bălți 1', 'language_id' => '1', 'constituencies_id' => '10'],
            ['name' => 'Бельцы 1', 'language_id' => '2', 'constituencies_id' => '10'],
            ['name' => 'Bălți 2', 'language_id' => '1', 'constituencies_id' => '11'],
            ['name' => 'Бельцы 2', 'language_id' => '2', 'constituencies_id' => '11'],
            ['name' => 'Fălesti', 'language_id' => '1', 'constituencies_id' => '12'],
            ['name' => 'Фэлешть', 'language_id' => '2', 'constituencies_id' => '12'],
            ['name' => 'Sîngerei, Florești', 'language_id' => '1', 'constituencies_id' => '13'],
            ['name' => 'Сынжерей, Флорешть', 'language_id' => '2', 'constituencies_id' => '13'],
            ['name' => 'Șoldănești, Rezina(or. Rezzina)', 'language_id' => '1', 'constituencies_id' => '14'],
            ['name' => 'Солданести, Резина (Резина)', 'language_id' => '2', 'constituencies_id' => '14'],
            ['name' => 'Telenești, Șoldănești, Orhei', 'language_id' => '1', 'constituencies_id' => '15'],
            ['name' => 'Теленешты, Шолданешты, Оргеев', 'language_id' => '2', 'constituencies_id' => '15'],
            ['name' => 'Călărași, Ungheni', 'language_id' => '1', 'constituencies_id' => '16'],
            ['name' => 'Кэлэрашь, Унгень', 'language_id' => '2', 'constituencies_id' => '16'],
            ['name' => 'Ungheni', 'language_id' => '1', 'constituencies_id' => '17'],
            ['name' => 'Унгень', 'language_id' => '2', 'constituencies_id' => '17'],
            ['name' => 'Nisporeni, Strașeni', 'language_id' => '1', 'constituencies_id' => '18'],
            ['name' => 'Ниспорень, Страшены', 'language_id' => '2', 'constituencies_id' => '18'],
            ['name' => 'Orhei, Călărași', 'language_id' => '1', 'constituencies_id' => '19'],
            ['name' => 'Оргеев, Кэлэрашь', 'language_id' => '2', 'constituencies_id' => '19'],
            ['name' => 'Orhei, Rezina, Criuleni, Dubăsari', 'language_id' => '1', 'constituencies_id' => '20'],
            ['name' => 'Оргеев, Резина, Криулень, Дубасари', 'language_id' => '2', 'constituencies_id' => '20'],
            ['name' => 'Strașeni, Orhei', 'language_id' => '1', 'constituencies_id' => '21'],
            ['name' => 'Страшены, Оргеев', 'language_id' => '2', 'constituencies_id' => '21'],
            ['name' => 'Criuleni, Dubăsari', 'language_id' => '1', 'constituencies_id' => '22'],
            ['name' => 'Криулень, Дубасари', 'language_id' => '2', 'constituencies_id' => '22'],
            ['name' => 'Ialoveni, Strașeni, Călărași', 'language_id' => '1', 'constituencies_id' => '23'],
            ['name' => 'Яловены, Страшены, Кэлэраши', 'language_id' => '2', 'constituencies_id' => '23'],
            ['name' => 'Municipiul Chișinău', 'language_id' => '1', 'constituencies_id' => '24'],
            ['name' => 'Кишиневский муниципалитет', 'language_id' => '2', 'constituencies_id' => '24'],
            ['name' => 'Municipiul Chișinău', 'language_id' => '1', 'constituencies_id' => '25'],
            ['name' => 'Кишиневский муниципалитет', 'language_id' => '2', 'constituencies_id' => '25'],
            ['name' => 'Municipiul Chișinău', 'language_id' => '1', 'constituencies_id' => '26'],
            ['name' => 'Кишиневский муниципалитет', 'language_id' => '2', 'constituencies_id' => '26'],
            ['name' => 'Municipiul Chișinău', 'language_id' => '1', 'constituencies_id' => '27'],
            ['name' => 'Кишиневский муниципалитет', 'language_id' => '2', 'constituencies_id' => '27'],
            ['name' => 'Municipiul Chișinău', 'language_id' => '1', 'constituencies_id' => '28'],
            ['name' => 'Кишиневский муниципалитет', 'language_id' => '2', 'constituencies_id' => '28'],
            ['name' => 'Municipiul Chișinău', 'language_id' => '1', 'constituencies_id' => '29'],
            ['name' => 'Кишиневский муниципалитет', 'language_id' => '2', 'constituencies_id' => '29'],
            ['name' => 'Municipiul Chișinău', 'language_id' => '1', 'constituencies_id' => '30'],
            ['name' => 'Кишиневский муниципалитет', 'language_id' => '2', 'constituencies_id' => '30'],
            ['name' => 'Municipiul Chișinău', 'language_id' => '1', 'constituencies_id' => '31'],
            ['name' => 'Кишиневский муниципалитет', 'language_id' => '2', 'constituencies_id' => '31'],
            ['name' => 'Municipiul Chișinău', 'language_id' => '1', 'constituencies_id' => '32'],
            ['name' => 'Кишиневский муниципалитет', 'language_id' => '2', 'constituencies_id' => '32'],
            ['name' => 'Municipiul Chișinău', 'language_id' => '1', 'constituencies_id' => '33'],
            ['name' => 'Кишиневский муниципалитет', 'language_id' => '2', 'constituencies_id' => '33'],
            ['name' => 'Municipiul Chișinău', 'language_id' => '1', 'constituencies_id' => '34'],
            ['name' => 'Кишиневский муниципалитет', 'language_id' => '2', 'constituencies_id' => '34'],
            ['name' => 'Anenii Noi', 'language_id' => '1', 'constituencies_id' => '35'],
            ['name' => 'Анений Ной', 'language_id' => '2', 'constituencies_id' => '35'],
            ['name' => 'Caușeni, Anenii Noi', 'language_id' => '1', 'constituencies_id' => '36'],
            ['name' => 'Цезени, Анений Ной', 'language_id' => '2', 'constituencies_id' => '36'],
            ['name' => 'Ștefan Voda', 'language_id' => '1', 'constituencies_id' => '37'],
            ['name' => 'Штефан Водэ', 'language_id' => '2', 'constituencies_id' => '37'],
            ['name' => 'Ialoveni, Căușeni', 'language_id' => '1', 'constituencies_id' => '38'],
            ['name' => 'Яловены, Каушаны', 'language_id' => '2', 'constituencies_id' => '38'],
            ['name' => 'Hîncesti', 'language_id' => '1', 'constituencies_id' => '39'],
            ['name' => 'Хынчешть', 'language_id' => '2', 'constituencies_id' => '39'],
            ['name' => 'Cimișlia, Leova, Hîncești', 'language_id' => '1', 'constituencies_id' => '40'],
            ['name' => 'Чимишлия, Леова, Хынчешть', 'language_id' => '2', 'constituencies_id' => '40'],
            ['name' => 'Basarabeasca, Cimișlia', 'language_id' => '1', 'constituencies_id' => '41'],
            ['name' => 'Басарабяска, Чимишлия', 'language_id' => '2', 'constituencies_id' => '41'],
            ['name' => 'Leova, Cantemir', 'language_id' => '1', 'constituencies_id' => '42'],
            ['name' => 'Леова, Кантемир', 'language_id' => '2', 'constituencies_id' => '42'],
            ['name' => 'Cantemir, Cahul', 'language_id' => '1', 'constituencies_id' => '43'],
            ['name' => 'Кантемир, Кагул', 'language_id' => '2', 'constituencies_id' => '43'],
            ['name' => 'Cahul', 'language_id' => '1', 'constituencies_id' => '44'],
            ['name' => 'Кагул', 'language_id' => '2', 'constituencies_id' => '44'],
            ['name' => 'Taraclia', 'language_id' => '1', 'constituencies_id' => '45'],
            ['name' => 'Тараклия', 'language_id' => '2', 'constituencies_id' => '45'],
            ['name' => 'UTA Găgăuzia 1', 'language_id' => '1', 'constituencies_id' => '46'],
            ['name' => 'АТО Гагаузия 1', 'language_id' => '2', 'constituencies_id' => '46'],
            ['name' => 'UTA Găgăuzia 2', 'language_id' => '1', 'constituencies_id' => '47'],
            ['name' => 'АТО Гагаузия 2', 'language_id' => '2', 'constituencies_id' => '47'],
            ['name' => 'Transnistria', 'language_id' => '1', 'constituencies_id' => '48'],
            ['name' => 'Приднестровье', 'language_id' => '2', 'constituencies_id' => '48'],
            ['name' => 'Transnistria - Tiraspol', 'language_id' => '1', 'constituencies_id' => '49'],
            ['name' => 'Приднестровье - Тирасполь', 'language_id' => '2', 'constituencies_id' => '49'],
            ['name' => 'Zona de West', 'language_id' => '1', 'constituencies_id' => '50'],
            ['name' => 'Западная зона', 'language_id' => '2', 'constituencies_id' => '50'],
            ['name' => 'Zona de West', 'language_id' => '1', 'constituencies_id' => '51'],
            ['name' => 'Западная зона', 'language_id' => '2', 'constituencies_id' => '51'],
            ['name' => 'Alte țari și zone al lumii', 'language_id' => '1', 'constituencies_id' => '52'],
            ['name' => 'Другие страны и районы мира', 'language_id' => '2', 'constituencies_id' => '52']
        ]);
    }
}
