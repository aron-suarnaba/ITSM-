<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
        IF OBJECT_ID('get_approve_request_per_department', 'P') IS NOT NULL
            DROP PROCEDURE get_approve_request_per_department;
    ");

        $sql = "
        CREATE PROCEDURE get_approve_request_per_department
        AS
        BEGIN
            SELECT
                a.id, a.created_at, a.status,
                r.created_at AS requested_date, r.requested_by_id, r.needed_date,
                r.requested_cat, r.requested_details, r.request_type,
                r.detailed_description, r.reject_on_approval_notes, r.reject_at,
                a.review_key, a.ticket_number,
                a.approved_by_id, a.approval_rejected_notes,
                a.void_at, u.employee_id, u.first_name,
                u.last_name, u.manager_id, u.position,
                u.department
            FROM
                dbo.approval a
            INNER JOIN
                dbo.requests r ON a.review_key = r.review_key
            INNER JOIN
                dbo.users u ON a.approved_by_id = u.employee_id
            WHERE
                a.status IN ('For Checking', 'Void')
            ORDER BY
                a.created_at DESC
        END
    ";
        DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("
        IF OBJECT_ID('get_approve_request_per_department', 'P') IS NOT NULL
            DROP PROCEDURE get_approve_request_per_department;
    ");
    }
};
