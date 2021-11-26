<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailPlan;
class Plans extends Model
{
    use HasFactory;
    protected $fillable =['name','url','price','description'];

    public function details(){
        return $this->hasMany(DetailPlan::class);
    }
    public function search($filter = null)
    {
        $results = $this->where('name',"LIKE","%{$filter}%")
                ->orWhere('description',"LIKE","%{$filter}%")->paginate();

                return $results;
    }
}
