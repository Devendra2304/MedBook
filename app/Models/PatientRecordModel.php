<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientRecordModel extends Model
{
    protected $table = 'patient_records';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'patient_id',
        'doctor_id',
        'appointment_id',
        'diagnosis',
        'prescription',
        'notes'
    ];
}