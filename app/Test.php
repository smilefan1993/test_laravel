<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = ['name', 'pause', 'showing_mark', 'final_verdict_showing','success_weight','skip_question','max_test_time','category_id','sub_category_id'];

}
