<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class ArticlesModel extends Model
{
    const STATUS_NORMAL = 1;
    const STATUS_DELETE = 0;

    protected $table = 'article';
    protected $primaryKey = 'id';

    protected $dateFormat = 'U';

    //字段白名单
    protected $fillable = ['id', 'cover', 'title', 'intr', 'conent', 'created_at', 'updated_at', 'status'];

    #设置插入数据库的时间格式，如果return time()
    public function getDateFormat()
    {
        return time();
    }

    /**
     * Tag 获取首页的文章信息(3小时更新)
     *
     * Users Flying Oranges
     * CreateTime 2018/8/7
     * @return mixed
     */
    public function getIndexArticle()
    {
        $data = Cache::remember('GET_CACHE_INDEX_PAGE_ARTICLE_DATA', 60 * 3, function () {
            return $this->where('status', self::STATUS_NORMAL)
                ->limit(8)
                ->get(['id', 'cover', 'title', 'intr']);
        });

        return $data;
    }

    /**
     * Tag 获取首页的文章信息(3小时更新)
     *
     * Users Flying Oranges
     * CreateTime 2018/8/7
     * @param int $page
     * @return mixed
     */
    public function getIndexArticleList($page)
    {
        $data = Cache::remember('GET_CACHE_INDEX_PAGE_ARTICLE_DATA_PAGE_' . $page, 60 * 3, function () {
            return $this->where('status', self::STATUS_NORMAL)
                ->paginate(3, ['id', 'cover', 'title', 'intr']);
        });

        return $data;
    }

    /**
     * Tag 获取单一的文章信息数据
     *
     * Users Flying Oranges
     * CreateTime 2018/8/8
     * @param $id
     * @return mixed
     */
    public function getArticleInfo($id)
    {
        $data = Cache::remember('GET_CACHE_ARTICLE_INFO_ID_' . $id, 60 * 24 * 7, function () use ($id) {
            return $this->where(['status' => self::STATUS_NORMAL, 'id' => $id])->first(['id', 'title', 'conent']);
        });

        return $data;
    }
}
