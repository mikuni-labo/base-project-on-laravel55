<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->bigIncrements('id');// 符号なしBIGINTを使用した自動増分ID（主キー）
//             $table->increments('id');// 符号なしINTを使用した自動増分ID（主キー）
//             $table->mediumIncrements('id');// 符号なしMEDIUMINTを使用した自動増分ID（主キー）
//             $table->smallIncrements('id');// 符号なしSMALLINTを使用した自動増分ID（主キー）
//             $table->tinyIncrements('id');// 符号なしTINYINTを使用した自動増分ID（主キー）

            $table->bigInteger('bigInteger');// BIGINTカラム
            $table->binary('binary');// BLOBカラム
            $table->boolean('boolean');// BOOLEANカラム
            $table->char('char', 100);// オプションの文字長を指定するCHARカラム
            $table->date('date');// DATEカラム
            $table->dateTime('dateTime');// DATETIMEカラム
            $table->dateTimeTz('dateTimeTz');// タイムゾーン付きDATETIMEカラム
            $table->decimal('decimal', 8, 2);// 有効（全体桁数）／小数点以下桁数指定のDECIMALカラム
            $table->double('double', 8, 2);// 有効（全体桁数）／小数点以下桁数指定のDOUBLEカラム
            $table->enum('enum', ['easy', 'hard']);// ENUMカラム
            $table->float('float', 8, 2);// 有効（全体桁数）／小数点以下桁数指定のFLOATカラム
            $table->geometry('geometry');// GEOMETRYカラム
            $table->geometryCollection('geometryCollection');// GEOMETRYCOLLECTIONカラム
            $table->integer('integer');// INTEGERカラム
            $table->ipAddress('ipAddress');// IPアドレスカラム
            $table->json('json');// JSONフィールド
            $table->jsonb('jsonb');// JSONBフィールド
            $table->lineString('lineString');// LINESTRINGカラム
            $table->longText('longText');// LONGTEXTカラム
            $table->macAddress('macAddress');// MACアドレスカラム
            $table->mediumInteger('mediumInteger');// MEDIUMINTカラム
            $table->mediumText('mediumText');// MEDIUMTEXTカラム
            $table->morphs('morphs');// 符号なしINTERGERのtestable_idと文字列のtestable_typeを追加
            $table->multiLineString('multiLineString');// MULTILINESTRINGカラム
            $table->multiPoint('multiPoint');// MULTIPOINTカラム
            $table->multiPolygon('multiPolygon');// MULTIPOLYGONカラム
            $table->nullableMorphs('nullableMorphs');// NULL値可能なmorphs()カラム
//             $table->nullableTimestamps();// timestamps()メソッドの別名
            $table->point('point');// POINTカラム
            $table->polygon('polygon');// POLYGONカラム
            $table->rememberToken();// VARCHAR(100)でNULL値可能なremember_tokenを追加
            $table->smallInteger('smallInteger');// SMALLINTカラム
//             $table->softDeletes();// ソフトデリートのためにNULL値可能なdeleted_at TIMESTAMPカラム追加
            $table->softDeletesTz();// ソフトデリートのためにNULL値可能なdeleted_atタイムゾーン付きTIMESTAMPカラム追加
            $table->string('string', 100);// オプションの文字長を指定したVARCHARカラム
            $table->text('text');// TEXTカラム
            $table->time('time');// TIMEカラム
            $table->timeTz('timeTz');// タイムゾーン付きTIMEカラム
            $table->timestamp('timestamp');// TIMESTAMPカラム
            $table->timestampTz('timestampTz');// タイムゾーン付きTIMESTAMPカラム
//             $table->timestamps();// NULL値可能なcreated_atとupdated_atカラム追加
            $table->timestampsTz();// タイムゾーン付きのNULL値可能なcreated_atとupdated_atカラム追加
            $table->tinyInteger('tinyInteger');// TINYINTカラム
            $table->unsignedBigInteger('unsignedBigInteger');// 符号なしBIGINTカラム
            $table->unsignedDecimal('unsignedDecimal', 8, 2);// 有効（全体桁数）／小数点以下桁数指定の符号なしDECIMALカラム
            $table->unsignedInteger('unsignedInteger');// 符号なしINTカラム
            $table->unsignedMediumInteger('unsignedMediumInteger');// 符号なしMEDIUMINTカラム
            $table->unsignedSmallInteger('unsignedSmallInteger');// 符号なしSMALLINTカラム
            $table->unsignedTinyInteger('unsignedTinyInteger');// 符号なしTINYINTカラム
            $table->uuid('uuid');// UUIDカラム
//             $table->year('year');// YEARカラム（Method year does not exist.と言われたので、laravel5.6から？）
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests');
    }
}
