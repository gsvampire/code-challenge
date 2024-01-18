<?php
/**
 * TestChallengeImportService.php
 * 2024/1/18 16:41
 * guoshuai
 */

namespace App\Admin\Imports;

use App\Admin\Service\ChannelGoodsService;
use App\Admin\Service\GoodsSupplyService;
use App\Models\TestChellengeModel;
use App\Models\XqChannel;
use App\Models\XqChannelGoods;
use App\Models\XqGoodsSku;
use Dcat\Admin\Admin;
use Dcat\Admin\Show;
use Doctrine\DBAL\Exception;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class TestChallengeImportService implements ToCollection
{
    /**
     * @var int
     * 批量添加-每次500条
     */

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        //具体逻辑
        $data = $collection->toArray();

        unset($data[0]);
        //错误行记录
        $errorArr = [];
        //新增记录
        $insertArr = [];
        foreach ($data as $k => $v) {

            $insertArr[$k]['location_id'] = $v[0];
            $insertArr[$k]['applicant'] = $v[1];
            $insertArr[$k]['facilit_type'] = $v[2];
            $insertArr[$k]['cnn'] = $v[3];
            $insertArr[$k]['location_description'] = $v[4];
            $insertArr[$k]['address'] = $v[5];
            $insertArr[$k]['blocklot'] = $v[6];
            $insertArr[$k]['block'] = $v[7];
            $insertArr[$k]['lot'] = $v[8];
            $insertArr[$k]['permit'] = $v[9];
            $insertArr[$k]['status'] = $v[10];
            $insertArr[$k]['food_items'] = $v[11];
            $insertArr[$k]['x'] = $v[12];
            $insertArr[$k]['y'] = $v[13];
            $insertArr[$k]['latitude'] = $v[14];
            $insertArr[$k]['longitude'] = $v[15];
            $insertArr[$k]['schedule'] = $v[16];

            $insertArr[$k]['dayshours'] = $v[17];
            $insertArr[$k]['noi_sent'] = $v[18];
            $insertArr[$k]['approved'] = $v[19];
            $insertArr[$k]['prior_permit'] = $v[21];
            $insertArr[$k]['expiration_date'] = $v[22];
            $insertArr[$k]['location'] = $v[23];
            $insertArr[$k]['fire_prevention_districts'] = $v[24];
            $insertArr[$k]['police_districts'] = $v[25];
            $insertArr[$k]['supervisor_districts'] = $v[26];
            $insertArr[$k]['zip_codes'] = $v[27];
        }
        $model = new TestChellengeModel();
        $model->batchInsert($insertArr);

        return true;
    }


}
