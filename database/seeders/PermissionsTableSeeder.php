<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => 18,
                'title' => 'crm_status_create',
            ],
            [
                'id'    => 19,
                'title' => 'crm_status_edit',
            ],
            [
                'id'    => 20,
                'title' => 'crm_status_show',
            ],
            [
                'id'    => 21,
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => 22,
                'title' => 'crm_status_access',
            ],
            [
                'id'    => 23,
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => 24,
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => 25,
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => 26,
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => 27,
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => 28,
                'title' => 'crm_note_create',
            ],
            [
                'id'    => 29,
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => 30,
                'title' => 'crm_note_show',
            ],
            [
                'id'    => 31,
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => 32,
                'title' => 'crm_note_access',
            ],
            [
                'id'    => 33,
                'title' => 'crm_document_create',
            ],
            [
                'id'    => 34,
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => 35,
                'title' => 'crm_document_show',
            ],
            [
                'id'    => 36,
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => 37,
                'title' => 'crm_document_access',
            ],
            [
                'id'    => 38,
                'title' => 'office_create',
            ],
            [
                'id'    => 39,
                'title' => 'office_edit',
            ],
            [
                'id'    => 40,
                'title' => 'office_show',
            ],
            [
                'id'    => 41,
                'title' => 'office_delete',
            ],
            [
                'id'    => 42,
                'title' => 'office_access',
            ],
            [
                'id'    => 43,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 44,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 45,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 46,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 47,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 48,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 49,
                'title' => 'sgp_create',
            ],
            [
                'id'    => 50,
                'title' => 'sgp_edit',
            ],
            [
                'id'    => 51,
                'title' => 'sgp_show',
            ],
            [
                'id'    => 52,
                'title' => 'sgp_delete',
            ],
            [
                'id'    => 53,
                'title' => 'sgp_access',
            ],
            [
                'id'    => 54,
                'title' => 'job_create',
            ],
            [
                'id'    => 55,
                'title' => 'job_edit',
            ],
            [
                'id'    => 56,
                'title' => 'job_show',
            ],
            [
                'id'    => 57,
                'title' => 'job_delete',
            ],
            [
                'id'    => 58,
                'title' => 'job_access',
            ],
            [
                'id'    => 59,
                'title' => 'ship_create',
            ],
            [
                'id'    => 60,
                'title' => 'ship_edit',
            ],
            [
                'id'    => 61,
                'title' => 'ship_show',
            ],
            [
                'id'    => 62,
                'title' => 'ship_delete',
            ],
            [
                'id'    => 63,
                'title' => 'ship_access',
            ],
            [
                'id'    => 64,
                'title' => 'department_create',
            ],
            [
                'id'    => 65,
                'title' => 'department_edit',
            ],
            [
                'id'    => 66,
                'title' => 'department_show',
            ],
            [
                'id'    => 67,
                'title' => 'department_delete',
            ],
            [
                'id'    => 68,
                'title' => 'department_access',
            ],
            [
                'id'    => 69,
                'title' => 'principal_create',
            ],
            [
                'id'    => 70,
                'title' => 'principal_edit',
            ],
            [
                'id'    => 71,
                'title' => 'principal_show',
            ],
            [
                'id'    => 72,
                'title' => 'principal_delete',
            ],
            [
                'id'    => 73,
                'title' => 'principal_access',
            ],
            [
                'id'    => 74,
                'title' => 'experience_create',
            ],
            [
                'id'    => 75,
                'title' => 'experience_edit',
            ],
            [
                'id'    => 76,
                'title' => 'experience_show',
            ],
            [
                'id'    => 77,
                'title' => 'experience_delete',
            ],
            [
                'id'    => 78,
                'title' => 'experience_access',
            ],
            [
                'id'    => 79,
                'title' => 'departure_create',
            ],
            [
                'id'    => 80,
                'title' => 'departure_edit',
            ],
            [
                'id'    => 81,
                'title' => 'departure_show',
            ],
            [
                'id'    => 82,
                'title' => 'departure_delete',
            ],
            [
                'id'    => 83,
                'title' => 'departure_access',
            ],
            [
                'id'    => 84,
                'title' => 'interview_create',
            ],
            [
                'id'    => 85,
                'title' => 'interview_edit',
            ],
            [
                'id'    => 86,
                'title' => 'interview_show',
            ],
            [
                'id'    => 87,
                'title' => 'interview_delete',
            ],
            [
                'id'    => 88,
                'title' => 'interview_access',
            ],
            [
                'id'    => 89,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
