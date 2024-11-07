<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Permissions;
use App\Models\Menu;

class GenerateTableController extends Controller
{
    /**
     * Generate Crud From Database Tables
     *
     * @param  mixed $request
     * @param  mixed $permissions
     * @return void
     */
    public function generateCrudFromTable(Request $request, Permissions $permissions)
    {
        $table_name = $this->getPluralTableName($request->db_tables);
        $modal_name = !empty($request->model_name) ? $this->getSingularModalName($request->model_name) : $this->getSingularModalName($table_name);
        $gen_command = $this->generateCrudCommand($modal_name, $table_name);
        $this->runArtisanCommand($gen_command);
        $this->createPermissions($modal_name);

        $request->merge(['model_name' => $modal_name]);

        $this->createMenu($request);

        return back();
    }

    /**
     * Run Artisan Command
     *
     * @param  mixed $var
     * @return void
     */
    public function runArtisanCommand($var)
    {
        \Artisan::call($var);
        return \Artisan::call('optimize');
    }

    /**
     * Get Singular Modal Name
     *
     * @param  mixed $var
     * @return void
     */
    public function getSingularModalName($var)
    {
        $modal_name = $var;
        $modal_name = Str::camel($var);
        $modal_name = Str::singular($modal_name);
        $modal_name = ucfirst($modal_name);
        return $modal_name;
    }

    /**
     * Get Plural Table Name
     *
     * @param  mixed $var
     * @return void
     */
    public function getPluralTableName($var)
    {
        $var = Str::snake($var);
        $var = Str::lower($var);
        $table_name = Str::plural($var);
        return strtolower($table_name);
    }

    /**
     * Generate Crud Command
     *
     * @param  mixed $modal_name
     * @param  mixed $table_name
     * @return void
     */
    public function generateCrudCommand($modal_name, $table_name)
    {
        return 'infyom:api_scaffold ' . $modal_name . ' --fromTable --tableName=' . $table_name;
    }

    /**
     * Generate Rollback Command
     *
     * @param  mixed $modal_name
     * @return void
     */
    public function generateRollbackCommand($modal_name)
    {
        return 'infyom:rollback ' . $modal_name . ' scaffold';
    }

    /**
     * Create Permissions
     *
     * @param  mixed $table_name
     * @return void
     */
    public function createPermissions($table_name)
    {
        $table_name = $this->getPluralTableName($table_name);
        $permissions = new Permissions;
        $isExists = $permissions->where('name', 'like', '%' . $table_name . '%')->exists();
        if (!$isExists) {
            $data = $permissions->generatePermissions($table_name);
            \DB::table('permissions')->insert($data);
        }
        return true;
    }

    /**
     * Delete Permissions
     *
     * @param  mixed $table_name
     * @return void
     */
    public function deletePermissions(Request $request)
    {
        $var = $request->model;
        $table_name = $this->getPluralTableName($var);
        $permissions = new Permissions;
        $isDeleted = $permissions->where('name', 'like', '%' . $table_name . '%')->delete();
        return $isDeleted;
    }

    /**
     * Camel Case To String
     *
     * @param  mixed $string
     * @return void
     */
    public function camelCaseToString($string)
    {
        $modal_name = Str::camel($string);
        $modal_name = ucwords(implode(' ', preg_split('/(?=[A-Z])/', $modal_name)));
        $modal_name = Str::plural($modal_name);
        return $modal_name;
    }

    /**
     * Create Menu
     *
     * @param  mixed $request
     * @return void
     */
    public function createMenu(Request $request)
    {
        $slug = $this->getPluralTableName($request->db_tables);
        $name = $this->camelCaseToString($request->model_name);
        $menu_icon = $request->menu_icon;

        return Menu::updateOrCreate([
            'name' => $name,
            'slug' => $slug,
        ], [
                'icon' => $menu_icon,
            ]);

    }

    public function deleteMenu(Request $request)
    {
        $slug = $this->getPluralTableName($request->model_name);
        return Menu::where('slug', $slug)->delete();

    }

}
