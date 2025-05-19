<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable(User::TABLE_NAME)) {
            Schema::table(User::TABLE_NAME, function (Blueprint $table) {
                if(Schema::hasColumn(User::TABLE_NAME, User::ROLE)){
                    // $table->string(User::ROLE)->change();
                    $table->dropColumn(User::ROLE);
                    $table->integer(User::ROLE);
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(User::TABLE_NAME, function (Blueprint $table) {
            //
        });
    }
};
