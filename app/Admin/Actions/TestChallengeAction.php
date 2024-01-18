<?php
/**
 * TestChallengeAction.php
 * 2024/1/18 16:37
 * guoshuai
 */
namespace App\Admin\Actions;

use App\Admin\Forms\ChannelGoodsImportForm;
use App\Admin\Forms\TestChallengeImportForm;
use Dcat\Admin\Actions\Action;
use Dcat\Admin\Admin;
use Dcat\Admin\Traits\HasPermissions;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class TestChallengeAction extends Action
{
    /**
     * @return string
     */
    protected $title = '<button class="btn btn-white">Excel 数据导入</button>';

    public $className;

    public function render()
    {
        $id = $this->className; # 每个action有唯一的id
        // 点击按钮，弹出模态窗
        $this->modal($id);

        return <<<HTML
<span class="grid-expand" data-toggle="modal" data-target="#{$id}">
   <a href="javascript:void(0)"><button class="btn btn-primary ">上传Excel并导入数据</button></a>
</span>
HTML;
    }

    # 模态框
    protected function modal($id)
    {
        $form = new TestChallengeImportForm();

        Admin::script('Dcat.onPjaxComplete(function () {
            $(".modal-backdrop").remove();
            $("body").removeClass("modal-open");
        }, true)');

        // 通过 Admin::html 方法设置模态窗HTML
        Admin::html(
            <<<HTML
<div class="modal fade" id="{$id}">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">导入数据</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        {$form->render()}
      </div>
    </div>
  </div>
</div>
HTML
        );
    }

    /**
     * @return string|array|void
     */
    public function confirm()
    {
        // return ['Confirm?', 'contents'];
    }

    /**
     * @param Model|Authenticatable|HasPermissions|null $user
     *
     * @return bool
     */
    protected function authorize($user): bool
    {
        return true;
    }

    /**
     * @return array
     */
    protected function parameters()
    {
        return [];
    }
}
