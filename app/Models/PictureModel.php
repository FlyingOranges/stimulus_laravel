<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class PictureModel extends Model
{
    const STATUS_NORMAL = 1;
    const STATUS_DELETE = 0;

    const TYPE_LOCALHOST = 1;
    const TYPE_OSS = 2;
    const TYPE_QINIU = 3;

    protected $table = 'picture';
    protected $primaryKey = 'id';

    protected $dateFormat = 'U';

    //定义字段白名单
    protected $fillable = ['id', 'path', 'width', 'height', 'md5', 'sha1', 'created_at', 'updated_at', 'status'];

    //设置插入数据库的时间格式，如果return time()
    public function getDateFormat()
    {
        return time();
    }

    /**
     * Tag 获取单个图片信息数据
     *
     * Users Flying Oranges
     * CreateTime 2018/8/7
     * @param $id
     * @return mixed
     */
    public static function getFind($id)
    {
        $data = Cache::remember('GET_CACHE_PICTURE_INFO_ID_' . $id, 60 * 24 * 7, function () use ($id) {
            return self::where(['id' => $id, 'status' => self::STATUS_NORMAL])
                ->first(['id', 'path', 'width', 'height', 'type']);
        });

        return $data;
    }

    /**
     * Tag 加入数据库信息
     *
     * Users Flying Oranges
     * CreateTime 2018/8/13
     * @param $data
     * @return mixed
     */
    public static function createData($data)
    {
        $id = self::where('md5', $data['md5'])->first(['id']);
        if ($id) {
            return $id->id;
        }

        $result = self::create($data);

        return $result->id;
    }
}
