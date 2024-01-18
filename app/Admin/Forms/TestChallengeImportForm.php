<?php
/**
 * TestChallengeImportForm.php
 * 2024/1/18 16:39
 * guoshuai
 */
namespace App\Admin\Forms;

use App\Admin\Imports\ChannelGoodsImportService;
use App\Admin\Imports\TestChallengeImportService;
use Dcat\Admin\Widgets\Form;
use Maatwebsite\Excel\Facades\Excel;

class TestChallengeImportForm extends Form
{
    /**
     * Handle the form request.
     *
     * @param array $input
     *
     * @return mixed
     */
    public function handle(array $input)
    {
        try {

            $file = public_path() . '/upload/' . $input['file'];
            Excel::import(new TestChallengeImportService(), $file);
            return $this->response()->success('数据导入成功')->refresh();

        } catch (\Exception $exception) {
            return $this->response()->error($exception->getMessage());
        }
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->file('file', '上传数据（Excel）')->rules('required', ['required' => '文件不能为空'])
            ->disk('upload_file')
            ->checked()->chunkSize(1024)->accept('csv')
            ->override();
    }

    /**
     * The data of the form.
     *
     * @return array
     */
    public function default()
    {
        return [];
    }
}
