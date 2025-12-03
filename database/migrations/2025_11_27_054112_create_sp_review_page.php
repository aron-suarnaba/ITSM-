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
				r.id, r.created_at, r.status, r.requested_by_id, r.needed_date,
				r.requested_cat, r.requested_details, r.request_type, r.detailed_description,
				r.review_key, u.employee_id, u.site, u.first_name, u.last_name, u.department, u.manager_id,
				u.position
			FROM
				requests r
			INNER JOIN
				users u
			ON
				r.requested_by_id = u.employee_id
			WHERE
				u.manager_id = @manager_employee_id AND
				r.review_key IS NOT NULL
			ORDER BY
				r.created_at

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
