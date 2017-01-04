<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $admin = new App\User;
        $admin->name = 'Super Administrator';
        $admin->email = env('ADMIN_DEFAULT_EMAIL', 'admin@demo.com');
        $admin->admin_access = 1;
        $admin->password = \Hash::make(env('ADMIN_DEFAULT_PASSWORD', 'admindemo'));
        
        if ($admin->save()) {
            // Add super admin role and assign it to default user
            $role = new App\Models\Role;
            $role->slug = 'super-admin';
            $role->name = 'Super Admin';
            $role->whitelisted_ip_addresses = \Request::ip();

            if ($role->save()) {
                $userRole = new App\Models\UserRole;
                $userRole->user_id = $admin->id;
                $userRole->role_id = $role->id;
                $userRole->save();
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
