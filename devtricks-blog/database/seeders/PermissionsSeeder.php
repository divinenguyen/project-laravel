<?php

use Illuminate\Database\Seeder;
use App\models\Permissions;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = new Permissions();
        $permission->name ='Bang chủ';
        $permission->save();
    }
}
