<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 15/3/4
 * Time: 下午11:11
 */

class SentrySeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        DB::table('groups')->delete();
        DB::table('users_groups')->delete();

        Sentry::getUserProvider()->create([
            'email'         =>  'james@chsc.tw',
            'password'      =>  'lee',
            'first_name'    =>  'James',
            'last_name'     =>  'Lee',
            'activated'     =>  1,
        ]);

        Sentry::getGroupProvider()->create([
            'name'          =>  'Admin',
            'permissions'   =>  ['admin' => 1],
        ]);

        // 將user加入group
        $adminUser = Sentry::getUserProvider()->findByLogin('james@chsc.tw');
        $adminGroup = Sentry::getGroupProvider()->findByName('Admin');
        $adminUser->addGroup($adminGroup);
    }
}