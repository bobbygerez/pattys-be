# Work Life Cycle Laravel 5.7#

### Create Migration ###

* E.g Model - Roles
* CLI(Command Line Interface)
* ```Php artisan make:migration create_roles_table```
* Location is on ```database/migrations``` find the roles created
* [Available Column Types](https://laravel.com/docs/5.7/migrations#columns)
* E.g 
    ```Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->integer('parent_id');
            $table->timestamps();
    });
  

### Create a seeder if need. ###
* Always observe the ```Naming Convention``` PluralModelTableSeeder
* ```Php artisan make:seeder RolesTableSeeder```
* Location is on ```database/seeds```
* E.g
    ```
        $roles = ['Super Admin', 'Holding CEO'];
        foreach ($roles as $value) {
            $role = Role::create([
                    'name' => $value,
                    'parent_id' => 0,
                    
                ]);
        }


### Who do I talk to? ###

* Repo owner or admin
* Other community or team contact
