<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TermekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('termekek')->insert([

            [
               'id' => "1",
                'name' => "Szoftverfejlesztés okosan Pythonnal - Agilis csapatok közös nyelve ",
                'description' => "A Python nemcsak népszerű és modern programozási nyelv, hanem könnyen tanulható és hatékony eszköz is.",
                'picture' => "jpg",
                'price' => "1234",    
            ],
            [
               'id' => "2",
                'name' => "HTML5 Canvas grafika programozása ",
                'description' => "A HTML5 nagyon jó minőségű dinamikus grafikus megjelenítést tesz lehetővé a Canvas objektumán keresztül...",
                'picture' => "jpg",
                'price' => "3000",    
            ],

            [
                'id' => "3",
                 'name' => "Hogyan írj extrém gyors programot - Bevezetés a CUDA programozásba ",
                 'description' => "Izgalmas technológiai áttörésekről olvashatunk nap mint nap, melyek mind nagy számításigényű megoldásokról szólnak.",
                 'picture' => "jpg",
                 'price' => "4500",    
             ],
             [
                'id' => "4",
                 'name' => "NET FEJLESZTŐI INFRASTRUKTÚRA 1
                 NET FEJLESZTŐI INFRASTRUKTÚRA 1 ",
                 'description' => "Munkatársaink már közel két éve fókuszálnak a .NET-technológiára. Jelenleg az egyik legnagyobb.",
                 'picture' => "jpg",
                 'price' => "6700",    
             ],
             [
                'id' => "5",
                 'name' => "ORACLE DATABASE 10G - TELJES REFERENCIA - CD-VEL ",
                 'description' => "A kötet az ORACLE Database 10g-t mutatja be teljes körűen Oracle-felhasználóknak és -fejlesztőknek. Nagyon jó!",
                 'picture' => "jpg",
                 'price' => "6999",    
             ],

             [
                'id' => "6",
                 'name' => "Szerver oldali webprogramozás ",
                 'description' => "Jelen könyv elsősorban azoknak a weblapfejlesztőknek és rendszergazdáknak készült, akik már rendelkeznek a HTML nyelv.." ,
                 'picture' => "jpg",
                 'price' => "30156",    
             ],

       ]);
    }
}
