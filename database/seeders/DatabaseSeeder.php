<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\province_city;
use App\Models\Permission;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $admin = new Role();
        $admin->slug = 'Admin';
        $admin->name = 'Admin';
        $admin->save();


        $manage = new Role();
        $manage->slug = 'Manage';
        $manage->name = 'Manage';
        $manage->save();


        $manager_role = new Role();
        $manager_role->slug = 'SuperAdmin';
        $manager_role->name = 'Sys Manager';
        $manager_role->save();

        $Users = new Role();
        $Users->slug = 'User';
        $Users->name = 'User';
        $Users->save();

        $UsersApprv = new Role();
        $UsersApprv->slug = 'UserApprv';
        $UsersApprv->name = 'UserApprv';
        $UsersApprv->save();

        $guest = new Role();
        $guest->slug = 'Guest';
        $guest->name = 'Guest';
        $guest->save();

        $createTasks = new Permission();
        $createTasks->slug = 'create-gia-vat-tu';
        $createTasks->name = 'Create Gia Vat tu';
        $createTasks->save();

        $deleteTasks = new Permission();
        $deleteTasks->slug = 'delete-gia-vat-tu';
        $deleteTasks->name = 'Delete Gia Vat tu';
        $deleteTasks->save();
        

        $deleteTasks = new Permission();
        $deleteTasks->slug = 'approve-gia-vat-tu';
        $deleteTasks->name = 'Approve Gia Vat tu';
        $deleteTasks->save();


        $editTasks = new Permission();
        $editTasks->slug = 'edit-gia-vat-tu';
        $editTasks->name = 'Edit Gia Vat tu';
        $editTasks->save();

        $createTasks = new Permission();
        $createTasks->slug = 'edit-dinh-muc';
        $createTasks->name = 'Edit Dinh Muc';
        $createTasks->save();


        $createTasks = new Permission();
        $createTasks->slug = 'create-dinh-muc';
        $createTasks->name = 'Create Dinh Muc';
        $createTasks->save();

        $approveTasks = new Permission();
        $approveTasks->slug = 'approve-dinh-muc';
        $approveTasks->name = 'Approve dinh muc';
        $approveTasks->save();

        $deleteTasks = new Permission();
        $deleteTasks->slug = 'delete-dinh-muc';
        $deleteTasks->name = 'Delete dinh muc';
        $deleteTasks->save();

      

        $viewUsers = new Permission();
        $viewUsers->slug = 'view-users';
        $viewUsers->name = 'View Users';
        $viewUsers->save();

        $editUsers = new Permission();
        $editUsers->slug = 'edit-users';
        $editUsers->name = 'Edit Users';
        $editUsers->save();

        $deleteUsers = new Permission();
        $deleteUsers->slug = 'delete-users';
        $deleteUsers->name = 'Delete Users';
        $deleteUsers->save();

        $createUsers = new Permission();
        $createUsers->slug = 'create-users';
        $createUsers->name = 'Create Users';
        $createUsers->save();

        $admin_role = Role::where('slug','Admin')->first();
        $SuperAdmin_role = Role::where('slug', 'SuperAdmin')->first();
        $manager_role = Role::where('slug', 'Manager')->first();
        $user_role = Role::where('slug', 'User')->first();
        $Guest_role = Role::where('slug', 'Guest')->first();

        $create_perm = Permission::where('slug','create-tasks')->first();
        $delete_perm = Permission::where('slug','delete-tasks')->first();
        $edit_perm = Permission::where('slug','edit-tasks')->first();
        $view_perm = Permission::where('slug','view-users')->first();
        $edit_perm = Permission::where('slug','edit-users')->first();
        $delete_perm = Permission::where('slug','delete-users')->first();
        $create_perm = Permission::where('slug','create-users')->first();

        $create_1 = new User();
        $create_1->name = 'user1';
        $create_1->email = 'user1@gmail.com';
        $create_1->password = bcrypt('123123');
        $create_1->save();
        $create_1->roles()->attach($admin_role);
        $create_1->permissions()->attach($create_perm);


        $create_2 = new User();
        $create_2->name = 'user2';
        $create_2->email = 'user2@gmail.com';
        $create_2->password = bcrypt('123123');
        $create_2->save();
        $create_2->roles()->attach($SuperAdmin_role);
        $create_2->permissions()->attach($create_perm);
        $create_2->permissions()->attach($delete_perm);

        $create_3 = new User();
        $create_3->name = 'user3';
        $create_3->email = 'user3@gmail.com';
        $create_3->password = bcrypt('123123');
        $create_3->save();
        $create_3->roles()->attach($manager_role);
        $create_3->permissions()->attach($createTasks);
        $create_3->permissions()->attach($edit_perm);
        $create_3->permissions()->attach($delete_perm);

        $create_4 = new User();
        $create_4->name = 'user4';
        $create_4->email = 'user4@gmail.com';
        $create_4->password = bcrypt('123123');
        $create_4->save();
        $create_4->roles()->attach($user_role);
        $create_4->permissions()->attach($createTasks);

        $create_5 = new User();
        $create_5->name = 'user5';
        $create_5->email = 'user5@gmail.com';
        $create_5->password = bcrypt('123123');
        $create_5->save();
        $create_5->roles()->attach($Guest_role);

        /* t???o d??? li???u b???ng table provice */

        $province = new province_city();
        $province->name_province ='An Giang'	;
        $province->symbol_province ='AG';
        $province->save();

        $province = new province_city();
        $province->name_province =	'B?? R???a ??? V??ng T??u';	
        $province->symbol_province =	'BV';
        $province->save();

        $province = new province_city();
        $province->name_province =	'B???c Li??u';	
        $province->symbol_province =	'BL';
        $province->save();

        $province = new province_city();
        $province->name_province =	'B???c K???n';	
        $province->symbol_province =	'BK';
        $province->save();

        $province = new province_city();
        $province->name_province =	'B???c Giang';	
        $province->symbol_province =	'BG';
        $province->save();

        $province = new province_city();
        $province->name_province =	'B???c Ninh';	
        $province->symbol_province =	'BN';
        $province->save();

        $province = new province_city();
        $province->name_province =	'B???n Tre';	
        $province->symbol_province =	'BT';
        $province->save();

        $province = new province_city();
        $province->name_province =	'B??nh D????ng';	
        $province->symbol_province =	'BD';
        $province->save();

        $province = new province_city();
        $province->name_province =	'B??nh ?????nh';	
        $province->symbol_province =	'B??';
        $province->save();

        $province = new province_city();
        $province->name_province =	'B??nh Ph?????c';	
        $province->symbol_province =	'BP';
        $province->save();

        $province = new province_city();
        $province->name_province =	'B??nh Thu???n';	
        $province->symbol_province =	'BTh';
        $province->save();

        $province = new province_city();
        $province->name_province =	'C?? Mau';	
        $province->symbol_province =	'CM';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Cao B???ng';	
        $province->symbol_province =	'CB';
        $province->save();

        $province = new province_city();
        $province->name_province =	'C???n Th??';	
        $province->symbol_province =	'CT';
        $province->save();

        $province = new province_city();
        $province->name_province =	'???? N???ng';	
        $province->symbol_province =	'??Na';
        $province->save();

        $province = new province_city();
        $province->name_province =	'?????k L???k';	
        $province->symbol_province =	'??L';
        $province->save();

        $province = new province_city();
        $province->name_province =	'?????k N??ng';	
        $province->symbol_province = '??No';
        $province->save();

        $province = new province_city();
        $province->name_province =	'??i???n Bi??n';	
        $province->symbol_province =	'??B';
        $province->save();

        $province = new province_city();
        $province->name_province =	'?????ng Nai';	
        $province->symbol_province =	'??N';
        $province->save();

        $province = new province_city();
        $province->name_province =	'?????ng Th??p';	
        $province->symbol_province =	'??T';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Gia Lai';	
        $province->symbol_province =	'GL';
        $province->save();

        $province = new province_city();
        $province->name_province =	'H?? Giang';	
        $province->symbol_province =	'HG';
        $province->save();

        $province = new province_city();
        $province->name_province =	'H?? Nam';	
        $province->symbol_province = 'HNa';
        $province->save();

        $province = new province_city();
        $province->name_province =	'H?? N???i';	
        $province->symbol_province =	'HN';
        $province->save();

        $province = new province_city();
        $province->name_province =	'H?? T??nh';	
        $province->symbol_province =	'HT';
        $province->save();

        $province = new province_city();
        $province->name_province =	'H???i D????ng';	
        $province->symbol_province =	'HD';
        $province->save();

        $province = new province_city();
        $province->name_province =	'H???i Ph??ng';	
        $province->symbol_province =	'HP';
        $province->save();

        $province = new province_city();
        $province->name_province =	'H???u Giang';	
        $province->symbol_province = 'HGi';
        $province->save();

        $province = new province_city();
        $province->name_province =	'H??a B??nh';	
        $province->symbol_province =	'HB';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Th??nh ph??? H??? Ch?? Minh';	
        $province->symbol_province =	'SG';
        $province->save();

        $province = new province_city();
        $province->name_province =	'H??ng Y??n';	
        $province->symbol_province =	'HY';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Kh??nh Ho??';	
        $province->symbol_province =	'KH';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Ki??n Giang';	
        $province->symbol_province =	'KG';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Kon Tum';	
        $province->symbol_province =	'KT';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Lai Ch??u';	
        $province->symbol_province =	'LC';
        $province->save();

        $province = new province_city();
        $province->name_province =	'L???ng S??n';	
        $province->symbol_province =	'LS';
        $province->save();

        $province = new province_city();
        $province->name_province =	'L??o Cai';	
        $province->symbol_province = 'LCa';
        $province->save();

        $province = new province_city();
        $province->name_province =	'L??m ?????ng';	
        $province->symbol_province =	'L??';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Long An';	
        $province->symbol_province =	'LA';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Nam ?????nh';	
        $province->symbol_province =	'N??';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Ngh??? An';	
        $province->symbol_province =	'NA';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Ninh B??nh';	
        $province->symbol_province =	'NB';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Ninh Thu???n';	
        $province->symbol_province =	'NT';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Ph?? Th???';	
        $province->symbol_province =	'PT';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Ph?? Y??n';	
        $province->symbol_province =	'PY';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Qu???ng B??nh';	
        $province->symbol_province =	'QB';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Qu???ng Nam';	
        $province->symbol_province = 'QNa';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Qu???ng Ng??i';	
        $province->symbol_province = 'QNg';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Qu???ng Ninh';	
        $province->symbol_province =	'QN';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Qu???ng Tr???';	
        $province->symbol_province =	'QT';
        $province->save();

        $province = new province_city();
        $province->name_province =	'S??c Tr??ng';	
        $province->symbol_province =	'ST';
        $province->save();

        $province = new province_city();
        $province->name_province =	'S??n La';	
        $province->symbol_province =	'SL';
        $province->save();

        $province = new province_city();
        $province->name_province =	'T??y Ninh';	
        $province->symbol_province =	'TN';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Th??i B??nh';	
        $province->symbol_province =	'TB';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Th??i Nguy??n';	
        $province->symbol_province = 'TNg';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Thanh H??a';	
        $province->symbol_province =	'TH';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Th???a Thi??n Hu???';	
        $province->symbol_province = 'TTH';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Ti???n Giang';	
        $province->symbol_province =	'TG';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Tr?? Vinh';	
        $province->symbol_province =	'TV';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Tuy??n Quang';	
        $province->symbol_province =	'TQ';
        $province->save();

        $province = new province_city();
        $province->name_province =	'V??nh Long';	
        $province->symbol_province =	'VL';
        $province->save();

        $province = new province_city();
        $province->name_province =	'V??nh Ph??c';	
        $province->symbol_province =	'VP';
        $province->save();

        $province = new province_city();
        $province->name_province =	'Y??n B??i';	
        $province->symbol_province =	'YB';
        $province->save();

        





    }
}
