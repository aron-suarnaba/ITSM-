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
        $procedure = "
        CREATE PROCEDURE get_request_per_department (
            @manager_employee_id VARCHAR(255)
        )
        AS
        BEGIN
            SELECT
                u.first_name,
                u.last_name,
                t.requested_by_id,
                t.requested_date,
                t.created_at,
                t.needed_date,
                t.requested_cat,
                t.requested_details,
                t.request_type,
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
                t.requested_date DESC;
        END
                ";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        // ✨ CRITICAL: Must use DB::unprepared() to drop a procedure
        DB::unprepared('DROP PROCEDURE [get_request_per_department]');
    }
};
