<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionDistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
			[
				'name' => 'Ashanti',
				'districts' => [
					[
						'name' => 'Afigya Kwabre',
					],
					[
						'name' => 'Ahafo Ano North',
					],
					[
						'name' => 'Ahafo Ano South',
					],
					[
						'name' => 'Amansie Central',
					],
					[
						'name' => 'Amansie West',
					],
					[
						'name' => 'Asante Akim Central',
					],
					[
						'name' => 'Asante Akim North',
					],
					[
						'name' => 'Asante Akim South',
					],
					[
						'name' => 'Atwima Kwanwoma',
					],
					[
						'name' => 'Atwima Mponua',
					],
					[
						'name' => 'Atwima Nwabiagya',
					],
					[
						'name' => 'Bekwai',
					],
					[
						'name' => 'Bosome Freho',
					],
					[
						'name' => 'Botsomtwe',
					],
					[
						'name' => 'Ejisu',
					],
					[
						'name' => 'Ejura Sekyedumase',
					],
					[
						'name' => 'Kumasi',
					],
					[
						'name' => 'Kwabre East',
					],
					[
						'name' => 'Mampong',
					],
					[
						'name' => 'Obuasi',
					],
					[
						'name' => 'Offinso North',
					],
					[
						'name' => 'Offinso South',
					],
					[
						'name' => 'Sekyere Afram Plains',
					],
					[
						'name' => 'Sekyere Central',
					],
					[
						'name' => 'Sekyere East',
					],
					[
						'name' => 'Sekyere Kumawu',
					],
					[
						'name' => 'Sekyere South',
					],
				],
			],
			[
				'name' => 'Brong Ahafo',
				'districts' => [
					[
						'name' => 'Asunafo North',
					],
					[
						'name' => 'Asunafo South',
					],
					[
						'name' => 'Asutifi North',
					],
					[
						'name' => 'Asutifi South',
					],
					[
						'name' => 'Atebubu-Amantin',
					],
					[
						'name' => 'Banda',
					],
					[
						'name' => 'Berekum',
					],
					[
						'name' => 'Dormaa East',
					],
					[
						'name' => 'Dormaa West',
					],
					[
						'name' => 'Jaman North',
					],
					[
						'name' => 'Jaman South',
					],
					[
						'name' => 'Kintampo North',
					],
					[
						'name' => 'Kintampo South',
					],
					[
						'name' => 'Nkoranza North',
					],
					[
						'name' => 'Nkoranza South',
					],
					[
						'name' => 'Pru',
					],
					[
						'name' => 'Sene',
					],
					[
						'name' => 'Sunyani',
					],
					[
						'name' => 'Sunyani West',
					],
					[
						'name' => 'Tain',
					],
					[
						'name' => 'Techiman',
					],
					[
						'name' => 'Wenchi',
					],
				],
			],
	        			[
				'name' => 'Central',
				'districts' => [
					[
						'name' => 'Abura-Asebu-Kwamankese',
					],
					[
						'name' => 'Agona East',
					],
					[
						'name' => 'Agona West Municipal',
					],
					[
						'name' => 'Ajumako-Enyan-Essiam',
					],
					[
						'name' => 'Asikuma-Odoben-Brakwa',
					],
					[
						'name' => 'Assin North Municipal',
					],
					[
						'name' => 'Assin South',
					],
					[
						'name' => 'Awutu-Senya',
					],
					[
						'name' => 'Awutu-Senya-East',
					],
					[
						'name' => 'Cape Coast',
					],
					[
						'name' => 'Effutu Municipal',
					],
					[
						'name' => 'Ekumfi',
					],
					[
						'name' => 'Gomoa East',
					],
					[
						'name' => 'Gomoa West',
					],
					[
						'name' => 'Komenda-Edina-Eguafo-Abirem',
					],
					[
						'name' => 'Mfantsiman Municipal',
					],
					[
						'name' => 'Twifo-Atti-Morkwa',
					],
					[
						'name' => 'Twifo-Heman-Lower-Denkyira',
					],
					[
						'name' => 'Upper-Denkyira-East',
					],
					[
						'name' => 'Upper-Denkyira-West',
					],
				],
			],
            [
				'name' => 'Eastern',
                'districts' => [
					[
						'name' => 'Abuakwa North',
					],
                    [
						'name' => 'Abuakwa South',
					],
					[
						'name' => 'Achiase',
					],
                    [
						'name' => 'Afram Plains North',
                    ],
                    [
						'name' => 'Afram Plains South',
					],
					[
						'name' => 'Akropong',
					],
                    [
						'name' => 'Akuapim North',
                    ],
                	[
						'name' => 'Akuapim South',
		            ],
					[
						'name' => 'Asene Manso Akroso',
					],
					[
						'name' => 'Atiwa East',
					],
                    [
						'name' => 'Atiwa West',
					],
                    [
						'name' => 'Ayensuano',
					],
                    [
						'name' => 'Birim Central',
                    ],
					[
						'name' => 'Birim North',
					],
					[
						'name' => 'Birim South',
					],
                    [
						'name' => 'Birim South',
					],
                    [
						'name' => 'Denkyembour',
					],
                    [
						'name' => 'East Akim Municipal',
					],
                    [
						'name' => 'Fanteakwa North',
					],
                    [
						'name' => 'Fanteakwa South',
					],
                    [
						'name' => 'Kade',
                    ],
					[
						'name' => 'Kwaebibirem',
					],
                    [
						'name' => 'Kwahu Afram Plains North',
                    ],
                    [
						'name' => 'Kwahu Afram Plains South',
                    ],
                    [
						'name' => 'Kwahu East',
					],
					[
						'name' => 'Kwahu South',
					],
					[
						'name' => 'Kwahu West Municipal',
					],
                    [
						'name' => 'Lower Manya Krobo',
	                    					],
					[
						'name' => 'New-Juaben Municipal',
					],
					[
						'name' => 'Nkawkaw',
					],
					[
						'name' => 'Nsawam Adoagyire Municipal',
					],
	                					[
						'name' => 'Suhum Municipal',
					],
                    [
						'name' => 'Upper Manya Krobo',
                    ],
                    [
						'name' => 'Upper West Akim',
                    ],
                    [
						'name' => 'West Akim Municipal',
                					],
					[
						'name' => 'Yilo Krobo Municipal',
					],
				],
			],
			[
				'name' => 'Greater Accra',
				'districts' => [
					[
						'name' => 'Accra Metropolitan',
					],
					[
						'name' => 'Ada East',
					],
					[
						'name' => 'Ada West',
					],
					[
						'name' => 'Adenta',
					],
					[
						'name' => 'Ashaiman Municipal',
					],
					[
						'name' => 'Ayawaso East',
					],
					[
						'name' => 'Ayawaso North',
					],
					[
						'name' => 'Ayawaso West',
					],
					[
						'name' => 'Ayawaso Central',
					],
					[
						'name' => 'Dade Kotopon',
					],
					[
						'name' => 'Dangme East',
					],
					[
						'name' => 'Dangme West',
					],
					[
						'name' => 'Ga Central',
					],
					[
						'name' => 'Ga East',
					],
					[
						'name' => 'Ga South',
					],
					[
						'name' => 'Ga West',
					],
					[
						'name' => 'Kpone Katamanso',
					],
					[
						'name' => 'Krowor',
					],
					[
						'name' => 'La Dade Kotopon',
					],
					[
						'name' => 'La Nkwantanang Madina',
					],
					[
						'name' => 'Ledzokuku',
					],
					[
						'name' => 'Ningo Prampram',
					],
					[
						'name' => 'Okaikwei North',
					],
					[
						'name' => 'Okaikwei South',
					],
					[
						'name' => 'Shai Osudoku',
					],
					[
						'name' => 'Tema Metropolitan',
					],
					[
						'name' => 'Tema West',
					],
				],
			],
            [
				'name' => 'Northern',
	            'districts' => [
			        ['name' => 'Bole'],
		            ['name' => 'Bunkpurugu-Yunyoo'],
		            ['name' => 'Central Gonja'],
		            ['name' => 'Chereponi'],
		            ['name' => 'East Gonja'],
		            ['name' => 'Gushiegu'],
		            ['name' => 'Karaga'],
		            ['name' => 'Kpandai'],
		            ['name' => 'Mamprugu-Moagduri'],
		            ['name' => 'Nanumba North'],
		            ['name' => 'Nanumba South'],
		            ['name' => 'Saboba'],
		            ['name' => 'Sagnarigu'],
		            ['name' => 'Savelugu-Nanton'],
		            ['name' => 'Sawla-Tuna-Kalba'],
		            ['name' => 'Tamale Metropolitan'],
		            ['name' => 'Tatale-Sanguli'],
		            ['name' => 'Tolon'],
		            ['name' => 'West Gonja'],
		            ['name' => 'Yendi'],
		            ['name' => 'Zabzugu']
	            ],
            ],
            [
				'name' => 'Upper East',
	            'districts' => [
		            ['name' => 'Bawku Municipal'],
		            ['name' => 'Bawku West'],
		            ['name' => 'Binduri'],
		            ['name' => 'Bolgatanga Municipal'],
		            ['name' => 'Bongo'],
		            ['name' => 'Builsa North'],
		            ['name' => 'Builsa South'],
		            ['name' => 'Garu-Tempane'],
		            ['name' => 'Kassena-Nankana West'],
		            ['name' => 'Kassena-Nankana Municipal'],
		            ['name' => 'Nabdam'],
		            ['name' => 'Pusiga'],
		            ['name' => 'Talensi'],
		            ['name' => 'Tempane'],
		            ['name' => 'Binduri'],
		            ['name' => 'Bolgatanga Municipal'],
		            ['name' => 'Bongo'],
		            ['name' => 'Builsa North'],
		            ['name' => 'Builsa South'],
		            ['name' => 'Garu-Tempane'],
		            ['name' => 'Kassena-Nankana West'],
		            ['name' => 'Kassena-Nankana Municipal'],
		            ['name' => 'Nabdam'],
		            ['name' => 'Pusiga'],
		            ['name' => 'Talensi'],
		            ['name' => 'Tempane']
	            ],
			],
			[
				'name' => 'Upper West',
	            'districts' => [
		            ['name' => 'Jirapa'],
		            ['name' => 'Lambussie Karni'],
		            ['name' => 'Lawra'],
		            ['name' => 'Nadowli'],
		            ['name' => 'Nandom'],
		            ['name' => 'Sissala East'],
		            ['name' => 'Sissala West'],
		            ['name' => 'Wa East'],
		            ['name' => 'Wa Municipal'],
		            ['name' => 'Wa West']
	            ],
			],
	        [
				'name' => 'Volta',
				'districts' => [
					[
						'name' => 'Adaklu',
					],
					[
						'name' => 'Afadjato South',
					],
					[
						'name' => 'Agotime Ziope',
					],
					[
						'name' => 'Akatsi North',
					],
					[
						'name' => 'Akatsi South',
					],
					[
						'name' => 'Biakoye',
					],
					[
						'name' => 'Central Tongu',
					],
					[
						'name' => 'Ho Municipal',
					],
					[
						'name' => 'Ho West',
					],
					[
						'name' => 'Hohoe Municipal',
					],
					[
						'name' => 'Jasikan',
					],
					[
						'name' => 'Kadjebi',
					],
					[
						'name' => 'Keta Municipal',
					],
					[
						'name' => 'Ketu North',
					],
					[
						'name' => 'Ketu South',
					],
					[
						'name' => 'Kpando Municipal',
					],
					[
						'name' => 'Krachi East',
					],
					[
						'name' => 'Krachi Nchumuru',
					],
					[
						'name' => 'Krachi West',
					],
					[
						'name' => 'Nkwanta North',
					],
					[
						'name' => 'Nkwanta South',
					],
					[
						'name' => 'North Dayi',
					],
					[
						'name' => 'North Tongu',
					],
					[
						'name' => 'South Dayi',
					],
					[
						'name' => 'South Tongu',
					],
				],
                ],
            [
				'name' => 'Western',
                'districts' => [
	                ['name' => 'Ahanta West'],
	                ['name' => 'Ellembelle'],
	                ['name' => 'Jomoro'],
	                ['name' => 'Mpohor'],
	                ['name' => 'Nzema East'],
	                ['name' => 'Prestea-Huni Valley'],
	                ['name' => 'Sefwi Akontombra'],
	                ['name' => 'Sefwi Wiawso'],
	                ['name' => 'Shama'],
	                ['name' => 'Tarkwa-Nsuaem'],
	                ['name' => 'Wassa Amenfi Central'],
	                ['name' => 'Wassa Amenfi East'],
	                ['name' => 'Wassa Amenfi West'],
	                ['name' => 'Wassa East'],
	                ['name' => 'Wassa West']
                ],
            ],
            [
				'name' => 'Western North',
				'districts' => [
	                ['name' => 'Aowin'],
	                ['name' => 'Bia East'],
	                ['name' => 'Bia West'],
	                ['name' => 'Bibiani-Anhwiaso-Bekwai'],
	                ['name' => 'Juabeso'],
	                ['name' => 'Sefwi Akontombra'],
	                ['name' => 'Sefwi Wiawso'],
	                ['name' => 'Suaman'],
	                ['name' => 'Wasa Amenfi East'],
	                ['name' => 'Wasa Amenfi West']
				],
			],
	        [
				'name' => 'Oti',
		        'districts' => [
	                ['name' => 'Biakoye'],
	                ['name' => 'Jasikan'],
	                ['name' => 'Kadjebi'],
	                ['name' => 'Krachi East'],
	                ['name' => 'Krachi Nchumuru'],
	                ['name' => 'Krachi West'],
	                ['name' => 'Nkwanta North'],
	                ['name' => 'Nkwanta South']
				],
            ],
        ];

//		foreach ($regions as $region) {
//			$region = \App\Models\Region::create([
//				'name' => $region['name'],
//			]);
//
//			foreach ($region['districts'] as $district) {
//				$region->districts()->create([
//					'name' => $district['name'],
//				]);
//			}
//		}

	    foreach ($regions as $region) {
		    $regionId = DB::table('regions')->insertGetId([
			    'name' => $region['name']
		    ]);

		    foreach ($region['districts'] as $district) {
			    DB::table('districts')->insert([
				    'name' => $district['name'],
				    'region_id' => $regionId
			    ]);
		    }
	    }
    }
}
