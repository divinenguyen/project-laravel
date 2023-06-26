<?php

use Illuminate\Database\Seeder;
use App\models\Users;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Users;
        $user->email = 'thienlinh2509@gmail.com';
        $user->fullname = 'Divine Nguyen';
        $user->password = bcrypt('thienlinh');
        $user->birthday = '2020-09-25';
        $user->level = '';
        $user->address = 'Dương Nội, Thanh Xuân, Hà Nội';
        $user->permission_id = 1;
        $user->status = true;
        $user->count_post =0;
        $user->views_count =0;
        $user->save();
    }
}
