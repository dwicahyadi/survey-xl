<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Section;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            ['name'=>'AVAILABILITY'],
            ['name'=>'VISIBILITY'],
            ['name'=>'ADVOCACY'],
            ['name'=>'DOCUMENTATION'],
        ];
        Section::insert($sections);

        $options_stocks = [
            ['index'=>0, 'text'=>'0 sd 5'],
            ['index'=>1, 'text'=>'5 sd 10'],
            ['index'=>2, 'text'=>'10 sd 20'],
            ['index'=>3, 'text'=>'20 sd 25'],
            ['index'=>4, 'text'=>'di atas 25'],
        ];

        $options_visibility = [
            ['index'=>0, 'text'=>'Tidak'],
            ['index'=>1, 'text'=>'Ya'],
        ];

        $options_adocacy = [
            ['index'=>0, 'text'=>'Tidak pernah diedukasi'],
            ['index'=>1, 'text'=>'Tidak'],
            ['index'=>2, 'text'=>'Ya'],
        ];

        #Availability
        Question::create(
            [
                'section_id'=>1,
                'text'=> 'STOK SPWL',
                'type'=>'radio_button'
            ]
        )->answers()->createMany($options_stocks);

        Question::create(
            [
                'section_id'=>1,
                'text'=> 'STOK SP AXIS',
                'type'=>'radio_button'
            ]
        )->answers()->createMany($options_stocks);

        Question::create(
            [
                'section_id'=>1,
                'text'=> 'STOK VOUCHER XL',
                'type'=>'radio_button'
            ]
        )->answers()->createMany($options_stocks);

        Question::create(
            [
                'section_id'=>1,
                'text'=> 'STOK VOUCHER AXIS (AIGO)',
                'type'=>'radio_button'
            ]
        )->answers()->createMany($options_stocks);

       Question::create(
            [
                'section_id'=>1,
                'text'=> 'STOK SP XTRA ON',
                'type'=>'radio_button'
            ]
        )->answers()->createMany([
            ['index'=>0, 'text'=>'bukan area XTRA ON'],
            ['index'=>1, 'text'=>'0 sd 5'],
            ['index'=>2, 'text'=>'5 sd 10'],
            ['index'=>3, 'text'=>'10 sd 20'],
            ['index'=>4, 'text'=>'20 sd 25'],
            ['index'=>5, 'text'=>'di atas 25'],
        ]);

        Question::create(
            [
                'section_id'=>1,
                'text'=> 'STOK SP NEW PRODUCT (XCS/XHS/HR SV)',
                'type'=>'radio_button'
            ]
        )->answers()->createMany($options_stocks);

        Question::create(
            [
                'section_id'=>1,
                'text'=> 'STOK VOUCHER NEW PRODUCT (XCS/XHS/HR SV)',
                'type'=>'radio_button'
            ]
        )->answers()->createMany($options_stocks);

        #Visibility
        Question::create(
            [
                'section_id'=>2,
                'text'=> 'APAKAH ADA POP MATERIAL XCL',
                'type'=>'radio_button'
            ]
        )->answers()->createMany($options_visibility);

        Question::create(
            [
                'section_id'=>2,
                'text'=> 'APAKAH JUMLAH KUOTA SUDAH UPDATE?',
                'type'=>'radio_button'
            ]
        )->answers()->createMany($options_visibility);

        Question::create(
            [
                'section_id'=>2,
                'text'=> 'JELASKAN JIKA JUMLAH KUOTA BELUM UPDATE',
                'type'=>'input_text'
            ]
        )->answers();


        Question::create(
            [
                'section_id'=>2,
                'text'=> 'APAKAH ADA POP MATERIAL AXIS BOBA',
                'type'=>'radio_button'
            ]
        )->answers()->createMany([
            ['index'=>0, 'text'=>'Bukan Area BOBA'],
            ['index'=>1, 'text'=>'Tidak'],
            ['index'=>2, 'text'=>'Ya'],
        ]);

        #Advocay
        Question::create(
            [
                'section_id'=>3,
                'text'=> 'APAKAH RO PAHAM JUMLAH KUOTA XCL TERBARU',
                'type'=>'radio_button'
            ]
        )->answers()->createMany($options_adocacy);

        Question::create(
            [
                'section_id'=>3,
                'text'=> 'APAKAH RO PAHAM PENAMBAHAN 50% KUOTA AXIS (BOBA)',
                'type'=>'radio_button'
            ]
        )->answers()->createMany([
            ['index'=>0, 'text'=>'Bukan Area BOBA'],
            ['index'=>1, 'text'=>'Tidak pernah diedukasi'],
            ['index'=>2, 'text'=>'Tidak'],
            ['index'=>3, 'text'=>'Ya'],
        ]);

        Question::create(
            [
                'section_id'=>3,
                'text'=> 'APAKAH RO SUDAH MENGIKUTI PROGRAM HOT 151',
                'type'=>'radio_button'
            ]
        )->answers()->createMany($options_adocacy);

        Question::create(
            [
                'section_id'=>3,
                'text'=> 'APAKAH RO SUDAH MENGIKUTI PROGRAM PSP',
                'type'=>'radio_button'
            ]
        )->answers()->createMany($options_adocacy);

        Question::create(
            [
                'section_id'=>3,
                'text'=> 'APAKAH RO SUDAH MENGIKUTI PROGRAM GEMPITA',
                'type'=>'radio_button'
            ]
        )->answers()->createMany($options_adocacy);

        Question::create(
            [
                'section_id'=>3,
                'text'=> 'APAKAH RO SUDAH MENGIKUTI PROGRAM SEMARAK CUAN',
                'type'=>'radio_button'
            ]
        )->answers()->createMany($options_adocacy);

        Question::create(
            [
                'section_id'=>3,
                'text'=> 'APAKAH SALES RUTIN KUNJUNGAN',
                'type'=>'radio_button'
            ]
        )->answers()->createMany($options_visibility);

        #Documentation
        Question::create(
            [
                'section_id'=>4,
                'text'=> 'FOTO VISIT',
                'type'=>'file'
            ]
        );

        Question::create(
            [
                'section_id'=>4,
                'text'=> 'IMPORTANT ACTION PLAN YANG PERLU DILAKUKAN',
                'type'=>'input_text'
            ]
        );

    }
}
