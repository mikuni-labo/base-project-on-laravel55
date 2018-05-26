<?php

use App\Model\Test;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Test::class, function (Faker $faker) {
    return [
        /* 生成例
        'name' => $faker->name,// 喜嶋 充
        'password' => $faker->password,// +7RaphL+2\e;
        'country' => $faker->country,// カナダ
        'prefecture' => $faker->prefecture,// 広島県
        'city' => $faker->city,// 青田市
        'postcode' => $faker->postcode,// 2216072
        'address' => $faker->address,// 3936547  北海道伊藤市東区藤本町田中10-4-7 ハイツ山岸101号
        'streetAddress' => $faker->streetAddress,// 山田町浜田5-4-10
        'phoneNumber' => $faker->phoneNumber,// 09564-9-0190
        'email' => $faker->email,// mai27@koizumi.com
        'safeEmail' => $faker->safeEmail,// kiriyama.rika@example.org
        'company' => $faker->company,// 株式会社 若松
        'iso8601' => $faker->iso8601($max = 'now'),// 1986-09-22T02:55:38+0900
        'dateTimeBetween' => $faker->dateTimeBetween($startDate = '-110 years', $endDate = 'now')->format('Y年m月d日'),// 1913年05月27日
        'numberBetween' => $faker->numberBetween($min = 100, $max = 200),// 186
        'title' => $faker->title,// Dr.
        'realText' => $faker->realText($maxNbChars = 50, $indexSize = 2),// の崖がけと線路せんろが青い孔雀くじら見ている間その紙切れを出すのが私のかげも、電気でうごいて、それ。
        'randomNumber' => $faker->randomNumber($nbDigits = NULL),// 6656666
        'randomFloat' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),// 456.1
        'randomElement' => $faker->randomElement($array = ['男性', '女性']),// 女性
        'lexify' => $faker->lexify($string = '??????'),// mwacvg
        'hexcolor' => $faker->hexcolor,// #73de5e
        'ipv4' => $faker->ipv4,// 2.116.139.153
        'url' => $faker->url,// https://www.nakatsugawa.biz/delectus-aliquid-tempore-voluptatem-sed-aliquam-cum
        'imageUrl' => $faker->imageUrl($width = 640, $height = 480, $category = 'cats', $randomize = true, $word = null),// https://lorempixel.com/640/480/cats/?78690
        'userAgent' => $faker->userAgent,// Opera/8.19 (X11; Linux x86_64; sl-SI) Presto/2.8.345 Version/10.00
        'creditCardType' => $faker->creditCardType,// Visa
        'creditCardNumber' => $faker->creditCardNumber,// 5339280106009532
        'creditCardExpirationDate' => $faker->creditCardExpirationDate,// DateTime オブジェクト
        'isbn13' => $faker->isbn13,// 9788557418912
        'isbn10' => $faker->isbn10,// 069803919X
        */
    ];
});
