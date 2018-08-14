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
     * Tag 更新banner信息
     *
     * Users Flying Oranges
     * CreateTime 2018/8/14
     * @param $update
     * @param $id
     * @return mixed
     */
    public function saveData($update, $id)
    {
        $int = $this->where('id', decodeId($id))->update($update);

        if ($int) {
            //清理单条banner信息缓存
            Cache::forget('GET_CACHE_BANNER_FIND_INFO_ID_' . $id);
            //清理Api接口首页banner缓存
            Cache::forget('GET_CACHE_BANNER_INDEX_PAGE');
        }
        return $int;
    }

    /**
     * Tag 单条banner信息
     *
     * Users Flying Oranges
     * CreateTime 2018/8/14
     * @param $id
     * @return mixed
     */
    public function getFind($id)
    {
        $data = Cache::remember('GET_CACHE_BANNER_FIND_INFO_ID_' . $id, 60 * 24, function () use ($id) {
            return $this->where('id', decodeId($id))->first(['id', 'title', 'link', 'src', 'created_at', 'updated_at']);
        });

        return $data;
    }

    /**
     * Tag 后台管理系统获取轮播图信息
     *
     * Users Flying Oranges
     * CreateTime 2018/8/14
     * @param $serch
     * @param int $page
     * @return mixed
     */
    public function getBannersList($serch, $page = 1)
    {
        $data = Cache::remember('GET_CACHE_BANNERS_DATA_PAGE_' . $page . '_SERCH_' . $serch, 5,
            function () use ($serch, $page) {
                return $this->where('status', self::STATUS_NORMAL)
                    ->when($serch, function ($query) use ($serch) {
                        $query->where('title', 'like', "%{$serch}%");
                    })
                    ->paginate(5, ['id', 'title', 'link', 'src', 'created_at', 'updated_at']);
            });

        return $data;
    }

    /**
     * Tag 创建新的数据
     *
     * Users Flying Oranges
     * CreateTime 2018/8/13
     * @param $data
     * @return mixed
     */
    public function createdData($data)
    {
        $result = $this->create($data);

        return $result;
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
        $data = Cache::remember('GET_CACHE_BANNER_INDEX_PAGE', 10, function () {
            return $this->where('status', self::STATUS_NORMAL)
                ->orderBy('created_at', 'desc')
                ->get(['id', 'link', 'src']);
        });

        return $data;
    }

}
