<?php

namespace App\Models;

use CodeIgniter\Model;

class HealthTipModel extends Model
{
    protected $table = 'health_tips';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'title',
        'description',
        'media_type',
        'file_name'
    ];
}