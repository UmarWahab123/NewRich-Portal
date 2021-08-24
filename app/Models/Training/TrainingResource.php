<?php
namespace App\Models\Training;
use Illuminate\Database\Eloquent\Model;

class TrainingResource extends Model

{
    protected $guarded = array();
    protected $table = 'training_resource';
    public function lessons()
    {
        return $this->belongsTo('App\Models\Training\TrainingLesson', 'role_id', 'id');
    }

}








