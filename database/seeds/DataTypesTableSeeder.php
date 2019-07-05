<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class DataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'users');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'users',
                'display_name_singular' => __('voyager::seeders.data_types.user.singular'),
                'display_name_plural'   => __('voyager::seeders.data_types.user.plural'),
                'icon'                  => 'voyager-person',
                'model_name'            => 'TCG\\Voyager\\Models\\User',
                'policy_name'           => 'TCG\\Voyager\\Policies\\UserPolicy',
                'controller'            => 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'menus');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'menus',
                'display_name_singular' => __('voyager::seeders.data_types.menu.singular'),
                'display_name_plural'   => __('voyager::seeders.data_types.menu.plural'),
                'icon'                  => 'voyager-list',
                'model_name'            => 'TCG\\Voyager\\Models\\Menu',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'roles');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'roles',
                'display_name_singular' => __('voyager::seeders.data_types.role.singular'),
                'display_name_plural'   => __('voyager::seeders.data_types.role.plural'),
                'icon'                  => 'voyager-lock',
                'model_name'            => 'TCG\\Voyager\\Models\\Role',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'candidate');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'candidate',
                'display_name_singular' => 'Candidate',
                'display_name_plural'   => 'Candidates',
                'icon'                  => '',
                'model_name'            => 'App\\Candidate',
                'controller'            => '',
                'generate_permissions'  => 1,
                'server_side'           => 1,
                'details'               => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}',
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'constituencies');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'constituencies',
                'display_name_singular' => 'Constituency',
                'display_name_plural'   => 'Constituencies',
                'icon'                  => '',
                'model_name'            => 'App\\Constituency',
                'controller'            => '',
                'generate_permissions'  => 1,
                'server_side'           => 1,
                'details'               => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}',
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'locality');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'locality',
                'display_name_singular' => 'Locality',
                'display_name_plural'   => 'Localities',
                'icon'                  => '',
                'model_name'            => 'App\\Locality',
                'controller'            => '',
                'generate_permissions'  => 1,
                'server_side'           => 1,
                'details'               => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}',
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'post');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'post',
                'display_name_singular' => 'Post',
                'display_name_plural'   => 'Posts',
                'icon'                  => '',
                'model_name'            => 'App\\Post',
                'controller'            => '',
                'generate_permissions'  => 1,
                'server_side'           => 1,
                'details'               => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}',
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'party');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'party',
                'display_name_singular' => 'Party',
                'display_name_plural'   => 'Parties',
                'icon'                  => '',
                'model_name'            => 'App\\Party',
                'controller'            => '',
                'generate_permissions'  => 1,
                'server_side'           => 1,
                'details'               => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}',
                'description'           => '',
            ])->save();
        }
    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
