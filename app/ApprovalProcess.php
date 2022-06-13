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
        return $this->belongsTo(User::class, 'approve_by_id', 'id');
    }

    public function diminta()
    {
        return $this->belongsTo(Role::class, 'role_to_name', 'name');
    }
}
