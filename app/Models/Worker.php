<?php

namespace App\Models;

use App\Events\Worker\CreateEvent;
use App\Http\Filters\Var1\AbstractFilter;
use App\Models\Traits\HasFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Worker extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFilter;

    protected $table = 'workers';
    protected $guarded = false;





protected static function booted()
    {
        static::created(function ($worker) {
            event(new CreateEvent($worker));
        });

        static::updated(function ($worker) {

            if ($worker->wasChanged() && (int) $worker->getOriginal('age') != (int) $worker->getAttributes()['age']) {
                //
            }


        });


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
        return $this->belongsToMany(Project::class, 'project_worker', 'project_id', 'worker_id');
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

