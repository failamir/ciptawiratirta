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
                'title' => 'office_create',
            ],
            [
                'id'    => 18,
                'title' => 'office_edit',
            ],
            [
                'id'    => 19,
                'title' => 'office_show',
            ],
            [
                'id'    => 20,
                'title' => 'office_delete',
            ],
            [
                'id'    => 21,
                'title' => 'office_access',
            ],
            [
                'id'    => 22,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 23,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 24,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 25,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 26,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 27,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 28,
                'title' => 'sgp_create',
            ],
            [
                'id'    => 29,
                'title' => 'sgp_edit',
            ],
            [
                'id'    => 30,
                'title' => 'sgp_show',
            ],
            [
                'id'    => 31,
                'title' => 'sgp_delete',
            ],
            [
                'id'    => 32,
                'title' => 'sgp_access',
            ],
            [
                'id'    => 33,
                'title' => 'job_create',
            ],
            [
                'id'    => 34,
                'title' => 'job_edit',
            ],
            [
                'id'    => 35,
                'title' => 'job_show',
            ],
            [
                'id'    => 36,
                'title' => 'job_delete',
            ],
            [
                'id'    => 37,
                'title' => 'job_access',
            ],
            [
                'id'    => 38,
                'title' => 'ship_create',
            ],
            [
                'id'    => 39,
                'title' => 'ship_edit',
            ],
            [
                'id'    => 40,
                'title' => 'ship_show',
            ],
            [
                'id'    => 41,
                'title' => 'ship_delete',
            ],
            [
                'id'    => 42,
                'title' => 'ship_access',
            ],
            [
                'id'    => 43,
                'title' => 'department_create',
            ],
            [
                'id'    => 44,
                'title' => 'department_edit',
            ],
            [
                'id'    => 45,
                'title' => 'department_show',
            ],
            [
                'id'    => 46,
                'title' => 'department_delete',
            ],
            [
                'id'    => 47,
                'title' => 'department_access',
            ],
            [
                'id'    => 48,
                'title' => 'principal_create',
            ],
            [
                'id'    => 49,
                'title' => 'principal_edit',
            ],
            [
                'id'    => 50,
                'title' => 'principal_show',
            ],
            [
                'id'    => 51,
                'title' => 'principal_delete',
            ],
            [
                'id'    => 52,
                'title' => 'principal_access',
            ],
            [
                'id'    => 53,
                'title' => 'experience_create',
            ],
            [
                'id'    => 54,
                'title' => 'experience_edit',
            ],
            [
                'id'    => 55,
                'title' => 'experience_show',
            ],
            [
                'id'    => 56,
                'title' => 'experience_delete',
            ],
            [
                'id'    => 57,
                'title' => 'experience_access',
            ],
            [
                'id'    => 58,
                'title' => 'departure_create',
            ],
            [
                'id'    => 59,
                'title' => 'departure_edit',
            ],
            [
                'id'    => 60,
                'title' => 'departure_show',
            ],
            [
                'id'    => 61,
                'title' => 'departure_delete',
            ],
            [
                'id'    => 62,
                'title' => 'departure_access',
            ],
            [
                'id'    => 63,
                'title' => 'interview_create',
            ],
            [
                'id'    => 64,
                'title' => 'interview_edit',
            ],
            [
                'id'    => 65,
                'title' => 'interview_show',
            ],
            [
                'id'    => 66,
                'title' => 'interview_delete',
            ],
            [
                'id'    => 67,
                'title' => 'interview_access',
            ],
            [
                'id'    => 68,
                'title' => 'ship_experience_create',
            ],
            [
                'id'    => 69,
                'title' => 'ship_experience_edit',
            ],
            [
                'id'    => 70,
                'title' => 'ship_experience_show',
            ],
            [
                'id'    => 71,
                'title' => 'ship_experience_delete',
            ],
            [
                'id'    => 72,
                'title' => 'ship_experience_access',
            ],
            [
                'id'    => 73,
                'title' => 'hotel_experience_create',
            ],
            [
                'id'    => 74,
                'title' => 'hotel_experience_edit',
            ],
            [
                'id'    => 75,
                'title' => 'hotel_experience_show',
            ],
            [
                'id'    => 76,
                'title' => 'hotel_experience_delete',
            ],
            [
                'id'    => 77,
                'title' => 'hotel_experience_access',
            ],
            [
                'id'    => 78,
                'title' => 'deck_certificate_create',
            ],
            [
                'id'    => 79,
                'title' => 'deck_certificate_edit',
            ],
            [
                'id'    => 80,
                'title' => 'deck_certificate_show',
            ],
            [
                'id'    => 81,
                'title' => 'deck_certificate_delete',
            ],
            [
                'id'    => 82,
                'title' => 'deck_certificate_access',
            ],
            [
                'id'    => 83,
                'title' => 'hotel_certificate_create',
            ],
            [
                'id'    => 84,
                'title' => 'hotel_certificate_edit',
            ],
            [
                'id'    => 85,
                'title' => 'hotel_certificate_show',
            ],
            [
                'id'    => 86,
                'title' => 'hotel_certificate_delete',
            ],
            [
                'id'    => 87,
                'title' => 'hotel_certificate_access',
            ],
            [
                'id'    => 88,
                'title' => 'travel_document_create',
            ],
            [
                'id'    => 89,
                'title' => 'travel_document_edit',
            ],
            [
                'id'    => 90,
                'title' => 'travel_document_show',
            ],
            [
                'id'    => 91,
                'title' => 'travel_document_delete',
            ],
            [
                'id'    => 92,
                'title' => 'travel_document_access',
            ],
            [
                'id'    => 93,
                'title' => 'formal_education_create',
            ],
            [
                'id'    => 94,
                'title' => 'formal_education_edit',
            ],
            [
                'id'    => 95,
                'title' => 'formal_education_show',
            ],
            [
                'id'    => 96,
                'title' => 'formal_education_delete',
            ],
            [
                'id'    => 97,
                'title' => 'formal_education_access',
            ],
            [
                'id'    => 98,
                'title' => 'reference_create',
            ],
            [
                'id'    => 99,
                'title' => 'reference_edit',
            ],
            [
                'id'    => 100,
                'title' => 'reference_show',
            ],
            [
                'id'    => 101,
                'title' => 'reference_delete',
            ],
            [
                'id'    => 102,
                'title' => 'reference_access',
            ],
            [
                'id'    => 103,
                'title' => 'emergency_contact_create',
            ],
            [
                'id'    => 104,
                'title' => 'emergency_contact_edit',
            ],
            [
                'id'    => 105,
                'title' => 'emergency_contact_show',
            ],
            [
                'id'    => 106,
                'title' => 'emergency_contact_delete',
            ],
            [
                'id'    => 107,
                'title' => 'emergency_contact_access',
            ],
            [
                'id'    => 108,
                'title' => 'next_of_kin_create',
            ],
            [
                'id'    => 109,
                'title' => 'next_of_kin_edit',
            ],
            [
                'id'    => 110,
                'title' => 'next_of_kin_show',
            ],
            [
                'id'    => 111,
                'title' => 'next_of_kin_delete',
            ],
            [
                'id'    => 112,
                'title' => 'next_of_kin_access',
            ],
            [
                'id'    => 113,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
