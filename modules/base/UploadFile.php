<?php

namespace app\modules\base;

use app\modules\thuysan\models\Upload;
use app\services\DebugService;
use app\services\UtilityService;
use yii\base\Model;

class UploadFile extends Model
{
    public $fileupload;
    public $type;

    public function rules()
    {
        return [
            [['fileupload'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf,xlsx', 'maxFiles' => 5, 'maxSize' => 1024 * 1024 * 5],
            [['type'], 'string'],
        ];
    }

    public function upload($ref_id, $type)
    {
        if ($this->validate()) {
            foreach ($this->fileupload as $file) {

                $dir = 'uploads/'.$type.'/' . $this->type;
                if(!is_dir($dir)){
                    mkdir($dir, 0777, true);
                }

                $baseName = str_replace(' ', '-', strtolower(UtilityService::utf8convert(trim($file->baseName))));

                $model = new Upload();
                $model->file_name = $baseName;
                $model->file_path = $dir.  '/' . $baseName . '.' . $file->extension;
                $model->loai = $type;
                $model->save();
                $file->saveAs($model->file_path);
            }
            return true;
        } else {
            return false;
        }
    }
}