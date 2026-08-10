<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('mobile', 20)
                ->nullable()
                ->after('email');

            $table->string('gender', 30)
                ->nullable()
                ->after('mobile');

            $table->date('birth_date')
                ->nullable()
                ->after('gender');

            $table->text('address')
                ->nullable()
                ->after('birth_date');

            $table->string('city', 100)
                ->nullable()
                ->after('address');

            $table->string('state', 100)
                ->nullable()
                ->after('city');

            $table->string('pincode', 10)
                ->nullable()
                ->after('state');

            $table->string('profile_photo')
                ->nullable()
                ->after('pincode');

            $table->boolean('status')
                ->default(true)
                ->after('profile_photo');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn([
                'mobile',
                'gender',
                'birth_date',
                'address',
                'city',
                'state',
                'pincode',
                'profile_photo',
                'status',
            ]);

        });
    }
};