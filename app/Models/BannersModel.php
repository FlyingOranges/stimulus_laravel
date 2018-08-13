<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class BannersModel extends Model
{
    const STATUS_NORMAL = 1;
    const STATUS_DELETE = 0;

    protected $table = 'banners';
    protected $primaryKey = 'id';

    protected $dateFormat = 'U';

    //字段白名单
    protected $fillable = ['id', 'title', 'link', 'src', 'created_at', 'updated_at', 'status'];

    #设置插入数据库的时间格式，如果return time()
    public function getDateFormat()
    {
        return time();
    }

    /**
     * Tag 获取首页banner数据
     *
     * Users Flying Oranges
     * CreateTime 2018/8/7
     * @return mixed
     */
    public function getIndexBanners()
    {
        $data = Cache::remember('GET_CACHE_BANNER_INDEX_PAGE', 60 * 24, function () {
            return $this->where('status', self::STATUS_NORMAL)
                ->orderBy('created_at', 'desc')
                ->get(['id', 'link', 'src']);
        });

        return $data;
    }

}
