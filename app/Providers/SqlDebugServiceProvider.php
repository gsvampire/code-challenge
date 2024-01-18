<?php
/**
 * SqlDebugServiceProvider.php
 * 2023/6/13 09:59
 * guoshuai
 */

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

/**
 *  SQL 监听服务
 */
class SqlDebugServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (!empty(config('app.sql_log'))) {
            DB::listen(
                function ($sql) {
                    foreach ($sql->bindings as $i => $binding) {
                        if ($binding instanceof \DateTime) {
                            $sql->bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
                        } else {
                            if (is_string($binding)) {
                                $sql->bindings[$i] = "'$binding'";
                            }
                        }
                    }

                    // Insert bindings into query
                    $query = str_replace(array('%', '?'), array('%%', '%s'), $sql->sql);

                    $query = vsprintf($query, $sql->bindings);
                    Log::channel('sql')->debug('查询语句耗时 - ' . $sql->time . ' 毫秒 ', [
                        '链接名称' => $sql->connectionName,
                        'Sql语句' => $query
                    ]);
                }
            );
        }

    }
}
