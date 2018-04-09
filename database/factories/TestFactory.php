<?php

use App\Model\Test;
// use Faker\Generator as Faker;

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

$factory->define(Test::class, function () {
    $faker = \Faker\Factory::create('ja_JP');

    return [
        'name' => $faker->name,
        'password' => $faker->password,
        'country' => $faker->country,
        'prefecture' => $faker->prefecture,
        'city' => $faker->city,
        'postcode' => $faker->postcode,
        'address' => $faker->address,
        'streetAddress' => $faker->streetAddress,
        'phoneNumber' => $faker->phoneNumber,
        'email' => $faker->email,
        'safeEmail' => $faker->safeEmail,
        'company' => $faker->company,
        'iso8601' => $faker->iso8601($max = 'now'),
        'dateTimeBetween' => $faker->dateTimeBetween($startDate = '-110 years', $endDate = 'now')->format('Y年m月d日'),
        'numberBetween' => $faker->numberBetween($min = 100, $max = 200),
        'title' => $faker->title,
        'realText' => $faker->realText($maxNbChars = 50, $indexSize = 2),
        'randomNumber' => $faker->randomNumber($nbDigits = NULL),
        'randomFloat' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        'randomElement' => $faker->randomElement($array = ['男性', '女性']),
        'lexify' => $faker->lexify($string = '??????'),
        'hexcolor' => $faker->hexcolor,
        'ipv4' => $faker->ipv4,
        'url' => $faker->url,
        'imageUrl' => $faker->imageUrl($width = 640, $height = 480, $category = 'cats', $randomize = true, $word = null),
        'userAgent' => $faker->userAgent,
        'creditCardType' => $faker->creditCardType,
        'creditCardNumber' => $faker->creditCardNumber,
        'creditCardExpirationDate' => $faker->creditCardExpirationDate,
        'isbn13' => $faker->isbn13,
        'isbn10' => $faker->isbn10,

        /* 生成例
        "name" => "喜嶋 充",
        "password" => "+7RaphL+2\e;",
        "country" => "カナダ",
        "prefecture" => "広島県",
        "city" => "青田市",
        "postcode" => "2216072",
        "address" => "3936547  北海道伊藤市東区藤本町田中10-4-7 ハイツ山岸101号",
        "streetAddress" => "山田町浜田5-4-10",
        "phoneNumber" => "09564-9-0190",
        "email" => "mai27@koizumi.com",
        "safeEmail" => "kiriyama.rika@example.org",
        "company" => "株式会社 若松",
        "iso8601" => "1986-09-22T02:55:38+0900",
        "dateTimeBetween" => "1913年05月27日",
        "numberBetween" => 186,
        "title" => "Dr.",
        "realText" => "の崖がけと線路せんろが青い孔雀くじら見ている間その紙切れを出すのが私のかげも、電気でうごいて、それ。",
        "randomNumber" => 6656666,
        "randomFloat" => 456.1,
        "randomElement" => "女性",
        "lexify" => "mwacvg",
        "hexcolor" => "#73de5e",
        "ipv4" => "2.116.139.153",
        "url" => "https://www.nakatsugawa.biz/delectus-aliquid-tempore-voluptatem-sed-aliquam-cum",
        "imageUrl" => "https://lorempixel.com/640/480/cats/?78690",
        "userAgent" => "Opera/8.19 (X11; Linux x86_64; sl-SI) Presto/2.8.345 Version/10.00",
        "creditCardType" => "Visa",
        "creditCardNumber" => "5339280106009532",
        "creditCardExpirationDate" => 'DateTime クラス',
        "isbn13" => "9788557418912",
        "isbn10" => "069803919X",
        */
    ];
});
