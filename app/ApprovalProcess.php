<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class ApprovalProcess extends Model
{
    protected $table = 'approval_process';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by_id', 'id');
    }


    public function documents()
    {
        return $this->hasMany(DocumentLibrary::class, 'approval_process_id', 'id');

    }


}
