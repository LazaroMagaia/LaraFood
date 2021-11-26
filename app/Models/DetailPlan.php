<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plans;
class DetailPlan extends Model
{
    use HasFactory;
    protected  $table = 'detail_plans';
    protected $fillable =['name'];
    public function Plan()
    {
        $this->belongsTo(Plans::class);
    }
}
