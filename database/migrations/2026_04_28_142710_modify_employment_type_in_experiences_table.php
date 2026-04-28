<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("
            ALTER TABLE experiences 
            MODIFY employment_type ENUM(
                'student',
                'internship',
                'freelance',
                'full_time',
                'part_time',
                'contract'
            ) NOT NULL
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE experiences 
            MODIFY employment_type ENUM(
                'internship',
                'freelance',
                'full_time',
                'part_time',
                'contract'
            ) NOT NULL
        ");
    }
};