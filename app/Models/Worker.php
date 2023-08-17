<?php

namespace App\Models;

use App\Events\Worker\CreatedEvent;
use App\Http\Filter\AbstractFilter;
use App\Models\Traits\HasFiler;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Worker extends Model
{
    use SoftDeletes;
    use HasFiler;
    use HasFactory;

    protected $table = 'workers';
    protected $guarded = false;




    protected static function booted()
    {
//        static:: created(function ($model){
//            event(new CreatedEvent($model));
//        });
//
//        static::updated(function ($model){
//
//
////            if($model->wasChanged() && $model->getOriginal('age') != $model->getAttributes()['age']) {
////                //event
////                dd(111);
//
//            }
//        });

    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function avatar()
    {
        return $this->morphOne(Avatar::class, 'avatarable');
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
