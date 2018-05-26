<?php

use App\Model\Test;
use Illuminate\Database\Seeder;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Test::truncate();
        Schema::enableForeignKeyConstraints();

        factory(Test::class)->create([
            'bigInteger' => 12345678901234567890000,
            'binary',
            'boolean',
            'char',
            'date',
            'dateTime',
            'dateTimeTz',
            'decimal',
            'double',
            'enum' => 'hard',
            'float',
            'geometry',
            'geometryCollection',
            'integer',
            'ipAddress',
            'json',
            'jsonb',
            'lineString',
            'longText',
            'macAddress',
            'mediumInteger',
            'mediumText',
            'morphs',
            'multiLineString',
            'multiPoint',
            'multiPolygon',
            'nullableMorphs',
            'point',
            'polygon',
            'remember_token',
            'smallInteger',
            'deleted_at',
            'string',
            'text',
            'time',
            'timeTz',
            'timestamp',
            'timestampTz',
            'created_at',
            'updated_at',
            'tinyInteger',
            'unsignedBigInteger',
            'unsignedDecimal',
            'unsignedInteger',
            'unsignedMediumInteger',
            'unsignedSmallInteger',
            'unsignedTinyInteger',
            'uuid',
        ]);
    }
}
