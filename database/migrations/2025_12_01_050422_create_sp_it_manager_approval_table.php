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
        CREATE PROCEDURE get_request_per_department
        AS
        BEGIN
        SELECT
            u.employee_id, u.site, u.first_name, u.last_name,
            u.department, u.position, u.manager_id,
            r.id, r.created_at, r.status, r.requested_by_id,
            r.needed_date, r.requested_cat, r.requested_details,
            r.request_type, r.detailed_description, r.review_key
        FROM
            dbo.requests r
        INNER JOIN
            dbo.users u ON r.requested_by_id = u.employee_id
        WHERE
            r.review_key IS NOT NULL AND
            (r.status = 'For Approval' OR
            r.status = 'Rejected on Approval'
            )
            AND
            (
                r.requested_details IS NULL OR
                r.requested_details NOT IN ('TRE', 'HRIS', 'ERP Syteline System')
            )
        ORDER BY r.created_at DESC;
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
