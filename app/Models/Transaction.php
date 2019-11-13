<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $guarded = ['*'];
    public function user(){
        return $this->belongsTo(User::class,'tr_user_id');
    }

    const STATUS_DONE =1;
    const STATUS_PRIVATE=0;


    protected  $status =[
        1   =>[
            'name'=>'Thành công',
            'class'=>'label label-success'
        ],
        0   =>[
            'name'=>'Chờ xử lí',
            'class'=>'label label-default'
        ]
    ];


    public function getStatus(){
        return array_get($this->status,$this->tr_status,'[N\A]');//this->tr_status để lấy trạng thái hiện tại của đơn hàng
// trong cái status có name, class -> ta kiểm tra xem status của transaction bằng bao nhiêu để lấy  theo mảng status ở trên theo 0 và 1
    }
}
