<?php
/**
 * 主题下视图文件路径
 */
if (!function_exists('getThemeView')) {
    function getThemeView($view)
    {
        return 'themes.admin.' . getTheme() . '.' . $view;
    }
}
/**
 * 获取主题
 */
if (!function_exists('getTheme')) {
    function getTheme()
    {
        if (cache()->has('theme')) {
            return cache('theme');
        }
        $theme = config('admin.global.theme');
        cache()->forever('theme', $theme);
        return $theme;
    }
}
/**
 * 获取页面资源文件
 */
if (!function_exists('getThemeAssets')) {
    function getThemeAssets($asset, $vendors = false)
    {
        return $vendors ? 'vendors/' . $asset : 'themes/admin/' . getTheme() . '/' . $asset;
    }
}
/**
 * 刷新用户权限、角色
 */
if (!function_exists('setUserPermissions')) {
    function setUserPermissions($user)
    {
        $rolePermissions = $user->rolePermissions()->get()->pluck('slug');
        $userPermissions = $user->userPermissions()->get()->pluck('slug');
        $permissions = array_unique($rolePermissions->merge($userPermissions)->all());
        $roles = $user->getRoles()->pluck('slug')->all();
        $allPermissions = \App\Models\Permission::all()->pluck('slug')->all();
        // 缓存用户权限
        cache()->forever('user_' . $user->id, [
            'permissions' => $permissions,
            'roles' => $roles,
            'allPermissions' => $allPermissions
        ]);
    }
}
/**
 * 清空缓存
 */
if (!function_exists('cacheClear')) {
    function cacheClear()
    {
        cache()->flush();
    }
}
/**
 * 获取当前用户权限、角色
 */
if (!function_exists('getCurrentPermission')) {
    function getCurrentPermission($user)
    {
        $key = 'user_' . $user->id;
        if (cache()->has($key)) {
            return cache($key);
        }
        setUserPermissions($user);
        return cache($key);
    }
}
/**
 * 操作提示信息
 */
if (!function_exists('flash_info')) {
    function flash_info($result, $successMsg = 'success !', $errorMsg = 'something error !')
    {
        return $result ? flash($successMsg, 'success')->important() : flash($errorMsg, 'danger')->important();
    }
}
/**
 * 加密
 */
if (!function_exists('encodeId')) {
    function encodeId($id, $connection = 'main')
    {
        if (!config('hashids.connections.' . $connection)) {
            $connection = 'main';
        }
        // 获取加密配置
        $settings = config('admin.global.encrypt');
        // 判断是否开启加密设置
        if (isset($settings[$connection]) && $settings[$connection]) {
            return Hashids::connection($connection)->encode($id);
        }
        return $id;
    }
}
if (!function_exists('decodeId')) {
    function decodeId($id, $connection = 'main', $type = false)
    {
        if (!config('hashids.connections.' . $connection)) {
            $connection = 'main';
        }
        // 获取加密配置
        $settings = config('admin.global.encrypt');
        // 判断是否开启加密设置

        if (isset($settings[$connection]) && $settings[$connection]) {
            $id = Hashids::connection($connection)->decode($id);
            if ($id) {
                return $type ? $id : $id[0];
            }
            flash(trans('common.decode_error'), 'danger');
            return 0;
        }
        return $id;
    }
}

if (!function_exists('haspermission')) {
    function haspermission($permission)
    {
        $check = false;
        if (auth()->check()) {

            $user = auth()->user();
            $userPermissions = getCurrentPermission($user);
            $check = in_array($permission, (array)$userPermissions['permissions']);
            if (in_array('admin', (array)$userPermissions['roles']) && !$check) {
                $newPermission = \App\Models\Permission::firstOrCreate([
                    'slug' => $permission,
                ], [
                    'name' => $permission,
                    'description' => $permission,
                ]);
                $role = \App\Models\Role::where('slug', 'admin')->first();
                $role->attachPermission($newPermission);
                setUserPermissions($user);
                $check = true;
            }
        }
        return $check;
    }
}

if (!function_exists('apiSuccess')) {

    /**
     * Tag 正确回传
     *
     * Users Flying Oranges
     * CreateTime 2018/8/7
     * @param string $message
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    function apiSuccess($message, $data = [])
    {
        $json = [
            'code' => 0,
            'message' => $message,
            'data' => $data
        ];

        return response()->json($json);
    }
}

if (!function_exists('apiErrors')) {

    /**
     * Tag 错误信息回传
     *
     * Users Flying Oranges
     * CreateTime 2018/8/7
     * @param $message
     * @param int $code
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    function apiErrors($message, $code = 101, $data = [])
    {
        $json = [
            'code' => $code,
            'message' => $message,
            'data' => $data
        ];

        return response()->json($json);
    }
}

if (!function_exists('getCover')) {
    /**
     * Tag 获取图片信息
     *
     * Users Flying Oranges
     * CreateTime 2018/8/7
     * @param $id
     * @return mixed|object
     */
    function getCover($id)
    {
        $imageInfo = \App\Models\PictureModel::getFind($id);
        if ($imageInfo != null) {
            switch ($imageInfo->type) {
                case \App\Models\PictureModel::TYPE_LOCALHOST:
                    $imageInfo->path = asset($imageInfo->path);
                    break;
                case \App\Models\PictureModel::TYPE_OSS:
                    //todo 完成阿里云oss模块后，再处理
                    $imageInfo->path = null;
                    break;
                case \App\Models\PictureModel::TYPE_QINIU:
                    //todo 完成七牛云模块后，再处理
                    $imageInfo->path = null;
                    break;
                default:
                    $imageInfo->path = null;
            }

            return $imageInfo;
        }

        return (object)[
            'path' => asset('/images/default.png'),
            'width' => '200',
            'height' => '200'
        ];
    }
}

if (!function_exists('myLog')) {
    /**
     * 打印日志
     *
     * @param $val
     */
    function myLog($val)
    {
        if (is_array($val)) {
            $val = var_export($val, true);
        }
        file_put_contents('myLog.txt', date('Y-m-d H:i:s', time()) . '  myLog:  ' . $val . "\r\n", FILE_APPEND);
    }
}

if (!function_exists('uploadImage')) {

    //TODO 图片上传
    function uploadImage($files, $type = 'localhost')
    {
        switch ($type) {
            case 'localhost':
                $uploadType = 1;
                $result = uploadLocalhost($files);
                break;
            case 'oss':
                $uploadType = 2;
                $result = uploadOSS($files);
                break;
            case 'qiniu':
                $uploadType = 3;
                $result = uploadQiniu($files);
                break;

            default:
                $uploadType = 0;
                $result = null;
        }

        if (!$result) {
            return (object)[
                'status' => false,
                'message' => '图片上传失败'
            ];
        }

        $md5 = md5_file(asset($result));
        $hash = sha1_file(asset($result));

        $img_info = getimagesize(asset($result));
        $img_width = $img_info[0];
        $img_height = $img_info[1];

        $resultImage = \App\Models\PictureModel::createData([
            'md5' => $md5, 'path' => $result, 'sha1' => $hash, 'type' => $uploadType,
            'width' => $img_width, 'height' => $img_height
        ]);

        return (object)['status' => true, 'path' => $resultImage];
    }

}

if (!function_exists('uploadLocalhost')) {

    function uploadLocalhost($file)
    {
        //定义图片上传路径
        $filedir = "uploadFile/image/";

        //获取上传图片的后缀名
        $extension = $file->getClientOriginalExtension();
        //重新命名上传文件名字
        $newImagesName = md5(time()) . random_int(5, 5) . "." . $extension;

        //使用move方法移动文件
        $status = $file->move($filedir, $newImagesName);

        if (!$status) {
            return null;
        }
        return $filedir . $newImagesName;
    }
}

if (!function_exists('uploadOSS')) {
    //TODO aliyun OSS 上传文件(暂时用不上,未实现)
    function uploadOSS($file)
    {
        return null;
    }
}

if (!function_exists('uploadQiniu')) {
    //TODO 七牛云 上传文件(暂时用不上,未实现)
    function uploadQiniu($file)
    {
        return null;
    }
}