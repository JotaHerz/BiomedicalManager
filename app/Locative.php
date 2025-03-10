<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locative extends Model
{
    protected $fillable = [
        'id','campus_id','location','locativegroups_id',
        'active','serie', 'locativefails_id','description',
        'order','date_calendar','assigned','status',
        'username', 'date_execute','date_novelty',
        'observation','evaluation','report','commentary',
        'date_evaluation','correction'
    ];

    public function campus()
    {
       return $this->belongsTo(Campus::class);
    }

    public function locativefails()
    {
       return $this->belongsTo(Locativefail::class);
    }

    public function locativegroups()
    {
       return $this->belongsTo(Locativegroup::class);
    }
}
