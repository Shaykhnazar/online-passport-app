<?php
namespace Database\Seeders\Auth;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        // Create Roles
        $super_admin = Role::create(['name' => 'super admin']);
//        $admin = Role::create(['name' => 'administrator']);
        $manager = Role::create(['name' => 'manager']);
//        $executive = Role::create(['name' => 'executive']);
        $user = Role::create(['name' => 'user']);

        // Create Permissions
        Permission::firstOrCreate(['name' => 'view_backend']);
        Permission::firstOrCreate(['name' => 'edit_settings']);
        Permission::firstOrCreate(['name' => 'view_logs']);

        $permissions = Permission::defaultPermissions();

        foreach ($permissions as $perms) {
            Permission::firstOrCreate(['name' => $perms]);
        }

        \Artisan::call('auth:permission', [
            'name' => 'posts',
        ]);
        echo "\n _Posts_ Permissions Created.";

        \Artisan::call('auth:permission', [
            'name' => 'categories',
        ]);
        echo "\n _Categories_ Permissions Created.";

        \Artisan::call('auth:permission', [
            'name' => 'tags',
        ]);
        echo "\n _Tags_ Permissions Created.";

        \Artisan::call('auth:permission', [
            'name' => 'comments',
        ]);
        echo "\n _Comments_ Permissions Created.";

        \Artisan::call('auth:permission', [
            'name' => 'customers',
        ]);
        echo "\n _Customers_ Permissions Created.";

        \Artisan::call('auth:permission', [
            'name' => 'tickets',
        ]);
        echo "\n _Tickets_ Permissions Created.";

        \Artisan::call('auth:permission', [
            'name' => 'passports',
        ]);
        echo "\n _Passports_ Permissions Created.";

        \Artisan::call('auth:permission', [
            'name' => 'passport_types',
        ]);
        echo "\n _Passport types_ Permissions Created.";

        \Artisan::call('auth:permission', [
            'name' => 'feedback',
        ]);
        echo "\n _Feedback_ Permissions Created.";

        echo "\n\n";

        // Assign Permissions to Roles
//        $admin->givePermissionTo(Permission::all());
        $manager->givePermissionTo('view_backend');
//        $executive->givePermissionTo('view_backend');

        Schema::enableForeignKeyConstraints();
    }
}
