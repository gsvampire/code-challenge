<?php
/**
 * ChallengeController.php
 * 2024/1/18 15:55
 * guoshuai
 */

namespace App\Admin\Controllers;

use App\Admin\Actions\DownTemplateExcel;
use App\Admin\Actions\GoodsSupplyImportAction;
use App\Admin\Actions\TestChallengeAction;
use App\Admin\Extensions\Export\GoodsSupplyExport;
use App\Admin\Extensions\Export\TestChallengeExport;
use App\Admin\Extensions\Tools\GoodsSupplyStatusBtn;
use App\Admin\Service\GoodsSupplyService;
use App\Models\TestChellengeModel;
use App\Models\XqGood;
use App\Models\XqGoodsSku;
use App\Models\XqGoodsSupplyModel;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Show;
use Dcat\Admin\Widgets\Card;

class ChallengeController extends AdminController{


    public function index(Content $content)
    {
        return $content
            ->translation($this->translation())
            ->title('code challenge')
            ->breadcrumb(
                ['text' => 'code challenge']
            )
            ->body($this->grid());
    }


    protected function grid()
    {
        return Grid::make(new TestChellengeModel(), function (Grid $grid) {
            $grid->disableEditButton();//禁止编辑按钮
//            $grid->showQuickEditButton();//展示快速编辑按钮
            $grid->enableDialogCreate();//新建弹窗
            $grid->disableCreateButton();
            $grid->disableFilterButton();//禁止快速查询按钮
            $grid->toolsWithOutline(false);//改按钮的样式
            $grid->disableDeleteButton();//不要删除按钮
            $grid->disableBatchDelete();//禁止批量删除
            $grid->disableRefreshButton();//禁止刷新按钮
            $goodsService = new GoodsSupplyService();
            $grid->model()->orderBy('id', 'desc');
            $grid->column('id', '序号');
            $grid->column('applicant');
            $grid->column('address');
            $grid->column('location_description');
            $grid->column('status');
            $grid->column('schedule');
            $grid->column('approved');
            $grid->column('facilit_type');
            $grid->column('cnn');
            $grid->column('food_items');

            $grid->filter(function (Grid\Filter $filter) {
                $filter->expand()->panel();//查询框放在页面上

                $filter->equal('status')->width(2);
                $filter->equal('facilit_type')->width(2);
                $filter->like('address')->width(2);
            });
            $grid->export(new TestChallengeExport());

            //csv格式导入
            $grid->tools(function (Grid\Tools $tools) {

                $importAction = new TestChallengeAction();
                $importAction->className = 'admin-test-chanllenge';
                $tools->append($importAction);
            });
//            $grid->tools(new DownTemplateExcel(2));
        });
    }


    protected function detail($id)
    {
        return Show::make($id, new TestChellengeModel(), function (Show $show) {
            $show->panel()
                ->tools(function ($tools) {
                    $tools->disableDelete();//禁用删除
                });
            $show->field('location_id');
            $show->field('applicant');
            $show->field('facilit_type');
            $show->field('cnn');
            $show->field('location_description');
            $show->field('address');
            $show->field('blocklot');
            $show->field('block');
            $show->field('permit');
            $show->field('food_items');
            $show->field('status');
            $show->field('dayshours');
            $show->field('noi_sent');
            $show->field('approved');
        });
    }
}
