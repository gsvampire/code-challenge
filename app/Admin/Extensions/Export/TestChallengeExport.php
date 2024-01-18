<?php
/**
 * TestChallengeExport.php
 * 2024/1/18 17:16
 * guoshuai
 */
namespace App\Admin\Extensions\Export;

use App\Admin\Service\ChannelGoodsService;
use App\Admin\Service\GoodsSupplyService;
use App\Models\XqGoodsSku;
use Dcat\Admin\Grid\Exporters\AbstractExporter;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TestChallengeExport extends AbstractExporter implements WithHeadings, WithMapping, FromCollection
{
    use Exportable;

    protected $fileName = 'code-challenge-export';

    public function __construct()
    {
        $this->fileName = $this->fileName . '_' . date('YmdHis') . '.csv';
        parent::__construct();
    }

    /**
     * 导出
     * @return mixed|void
     */
    public function export()
    {
        $this->download($this->fileName)->prepare(request())->send();
        exit;
    }

    /**
     * 数据
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return collect($this->buildData());
    }

    /**
     * 表头
     * @return string[]
     */
    public function headings(): array
    {

        $header = [
            'id' => 'ID',
            'goods_no' => '商品编码',
            'goods_name' => '商品名称',
            'channel_no' => '渠道编号',
            'channel_name' => '渠道名称',
            'channel_price' => '售价',
            'price'=>'面值',
            'total' => '预留库存',
            'valid_days' => '有效期',
            'skuid' => '商品SKUID',
            'SKU'=>'SKU详情',
            'goods_sku'=>'外部配置值'
        ];

        return $header;
    }

    /**
     * 行处理
     * @param mixed $row
     * @return array
     */
    public function map($row): array
    {
        return $row;
    }
}
