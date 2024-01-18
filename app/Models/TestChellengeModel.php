<?php
/**
 * TestChellengeModel.php
 * 2024/1/18 16:25
 * guoshuai
 */
namespace App\Models;
use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;

class TestChellengeModel extends Model
{
    use HasDateTimeFormatter;

    protected $table = 'test_challenge';



    public function batchInsert(array $data)
    {
        return \DB::table($this->getTable())->insert($data);
    }
}
