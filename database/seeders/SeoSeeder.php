<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seos')->insert($this->getSeoList());
    }

    protected function getSeoList()
    {
        return [
            [
                'title'                 => 'काभ्रेपलाञ्चाेक जिल्ला बचत तथा ऋण सहकारी सघ लि‍',
                'type'                  => 'cooperative,saccos,bank,coop',
                'language'              => 'nepali',
                'subject'               => 'काभ्रेपलाञ्चाेक जिल्ला बचत तथा ऋण सहकारी सघ लि‍',
                'topic'                 => 'काभ्रेपलाञ्चाेक जिल्ला बचत तथा ऋण सहकारी सघ लि‍',
                'summary'               => 'काभ्रेपलाञ्चाेक जिल्ला बचत तथा ऋण सहकारी सघ लि‍',
                'domain'                => 'https://kdsu.org.np',
                'category'              => 'काभ्रेपलाञ्चाेक जिल्ला बचत तथा ऋण सहकारी सघ लि‍',
                'description'           => 'काभ्रेपलाञ्चाेक जिल्ला बचत तथा ऋण सहकारी सघ लि‍',
                'keyword'               => 'काभ्रेपलाञ्चाेक जिल्ला बचत तथा ऋण सहकारी सघ लि‍',
            ],
        ];
    }
}
