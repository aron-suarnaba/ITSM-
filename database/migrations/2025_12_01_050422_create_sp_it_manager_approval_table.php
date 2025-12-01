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
        IF OBJECT_ID('get_review_per_department', 'P') IS NOT NULL
            DROP PROCEDURE get_review_per_department;
    ");

        // Now safely create the procedure
        $sql = "
        CREATE PROCEDURE get_review_per_department
        AS
        BEGIN
            SELECT
            t.id, t.created_at, t.updated_at,
            t.status, t.requested_by_id, t.needed_date,
            t.requested_cat, t.requested_details,
            t.request_type, t.detailed_description,
            t.review_key, t.reviewed_by_id, t.review_at,
            u.first_name, u.last_name, u.department,
            u.site, u.position, u.manager_id
        FROM
            dbo.tickets t
        INNER JOIN
            dbo.users u ON t.requested_by_id = u.employee_id
        WHERE
            t.review_key IS NOT NULL AND
            t.review_at IS NOT NULL AND
            t.reviewed_by_id IS NOT NULL AND
            t.approve_key IS NULL AND
            t.approved_at IS NULL AND
            t.approved_by_id IS NULL AND
            (
                t.requested_details IS NULL OR
                t.requested_details NOT IN ('TRE', 'HRIS', 'ERP Syteline System')
            )
        ORDER BY review_at DESC;
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
        IF OBJECT_ID('get_review_per_department', 'P') IS NOT NULL
            DROP PROCEDURE get_review_per_department;
    ");
    }
};
