<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestsHistory extends Model
{
    protected $table = 'requests_history';

    protected $fillable = [
        'endpoint',
        'method',
        'ip_address',
        'user_agent',
        'request_headers',
        'request_body',
        'response_status',
        'response_body',
        'user_id',
    ];

    public function getByUserId($userId) {
        return $this->where('user_id', $userId)->get();
    }
}
