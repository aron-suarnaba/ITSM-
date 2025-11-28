<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint; // Only needed if you drop a *table*
use Illuminate\Support\Facades\Schema;   // Only needed if you drop a *table*
use Illuminate\Support\Facades\DB;       // ✨ CRITICAL: Must import DB facade

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 🚨 FIX: SQL Server compatible way to DROP PROCEDURE IF EXISTS 🚨
        DB::statement("
        IF OBJECT_ID('get_request_per_department', 'P') IS NOT NULL
            DROP PROCEDURE get_request_per_department;
    ");

        // Now safely create the procedure
        $sql = "
        CREATE PROCEDURE get_request_per_department (
            @manager_employee_id VARCHAR(255)
        )
        AS
        BEGIN
            -- ... (rest of your SELECT query)
            SELECT
                u.first_name,
                u.last_name,
                t.requested_by_id,
                t.created_at,
                t.needed_date,
                t.requested_cat,
                t.requested_details,
                t.request_type,
                t.detailed_description,
                t.[status]
            FROM
                tickets t
            INNER JOIN
                users u
            ON
                t.requested_by_id = u.employee_id
            WHERE
                u.manager_id = @manager_employee_id
            ORDER BY
                t.created_at DESC;
        END
    ";
        DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        // 🚨 SQL Server compatible way to drop the procedure on rollback 🚨
        DB::statement("
        IF OBJECT_ID('get_request_per_department', 'P') IS NOT NULL
            DROP PROCEDURE get_request_per_department;
    ");
    }
};
