<?php
namespace App\Http\Middleware;

// Models
use App\Models\Shop;
use App\Models\ShopUser;

// Services
use Closure;
use Session;

class ShopAdminAuth
{
    /**
     * 查看是否为商店管理员，不是跳转至主页.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::get('ShopUser')->type === DB_SHOP_USERS_TYPE_ADMIN) {
            return $next($request);
        } else {
            if ($request->ajax()) {
                return response(trans('error_messages.common.unauthorized'), 401);
            } else {
                return redirect('/');
            }
        }
    }
}
