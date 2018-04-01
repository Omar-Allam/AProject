<?php

use Illuminate\Database\Seeder;

class FillListSeeder extends Seeder
{

    public function run()
    {
        $this->fillRegions();
        $this->fillRelatives();
        $this->fillBloodTypes();
    }

    function fillBloodTypes(){
        \App\BloodType::create([
            'name'=>'O−'
        ]);
        \App\BloodType::create([
            'name'=>'O+'
        ]);\App\BloodType::create([
            'name'=>'A−'
        ]);\App\BloodType::create([
            'name'=>'A+'
        ]);\App\BloodType::create([
            'name'=>'B−'
        ]);\App\BloodType::create([
            'name'=>'B+'
        ]);\App\BloodType::create([
            'name'=>'AB−'
        ]);
        \App\BloodType::create([
            'name'=>'AB+'
        ]);
    }
    function fillRelatives(){
        \App\RelativeType::create([
            'name'=>'أخ'
        ]);
        \App\RelativeType::create([
            'name'=>'أخت'
        ]);
        \App\RelativeType::create([
            'name'=>'أم'
        ]);
        \App\RelativeType::create([
            'name'=>'أب'
        ]);
        \App\RelativeType::create([
            'name'=>'عم'
        ]);
    }
    function fillRegions(){
        \App\Regions::create([
            'name'=>'منطقة الرياض'
        ]);\App\Regions::create([
            'name'=>'منطقة مكة المكرمة'
        ]);\App\Regions::create([
            'name'=>'منطقة المدينة'
        ]);\App\Regions::create([
            'name'=>'منطقة القصيم'
        ]);\App\Regions::create([
            'name'=>'المنطقة الشرقية'
        ]);
        \App\Regions::create([
            'name'=>'منطقة عسير'
        ]);\App\Regions::create([
            'name'=>'منطقة تبوك'
        ]);\App\Regions::create([
            'name'=>'منطقة حائل'
        ]);\App\Regions::create([
            'name'=>'منطقة الحدود الشمالية'
        ]);
        \App\Regions::create([
            'name'=>'منطقة جازان'
        ]);
        \App\Regions::create([
            'name'=>'منطقة نجران'
        ]);
        \App\Regions::create([
            'name'=>'منطقة الباحة'
        ]);
        \App\Regions::create([
            'name'=>'منطقة الجوف'
        ]);
    }
}
