<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    const STATUS_PUBLIC =1;
    const STATUS_PRIVATE=0;

    protected $guarded = [];
    protected  $status =[
        1   =>[
            'name'=>'Public',
            'class'=>'label label-danger'
        ],
        0   =>[
            'name'=>'Private',
            'class'=>'label label-default'
        ]
    ];
    public function getStatus(){
        return array_get($this->status,$this->a_active,'[N\A]');
    }
}
