<?php
namespace App\Http\Controllers;

// Models
use App\Models\Shop;
use App\Models\ShopUser;
use App\Models\ProduceCompany;
use App\Models\ProduceCompanyUser;
use App\Models\User;

// Requests
use App\Http\Requests;
use Illuminate\Http\Request;

// Services
use Auth;
use Session;

// Utils
use App\Utils\AuthUtil;

class AuthController extends Controller
{
    /**
     * 返回登录界面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('login.index');
    }

    /**
     * 登录系统
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $account    = $request->input('account');
        $password   = $request->input('password');
        $remember   = $request->input('remember');
        if (strpos($account, '@') !== false) {
            // 存在@，说明时邮箱地址
            $user = User::where('login_mail', $account)->first();
        } else {
            // 不存在@，说明是用户名登录
            $user = User::where('u_name', $account)->first();
        }
        if (is_null($user)) {
            // 用户不存在
            return back()->withInput()->withErrors(['account_error' => trans('error_messages.login.no_account')]);
        }

        if ($user->status !== DB_USERS_STATUS_EFFECITVE) {
            // 用户账户非不可用
            if ($user->status === DB_USERS_STATUS_REQUESTING) {
                // 未激活状态
                return back()
                    ->withInput()
                    ->withErrors([
                        'account_requesting_error' => trans('error_messages.login.account_requesting_error')
                    ]);
            } else {
                return back()
                    ->withInput()
                    ->withErrors(['account_invalid_error' => trans('error_messages.login.account_invalid_error')]);
            }
        }


        if (!AuthUtil::checkPassword($password, $user->password)) {
            // 密码错误
            return back()->withInput()->withErrors(['password_error' => trans('error_messages.login.password_error')]);
        }
        Auth::login($user, (bool)$remember);
        Session::put('User', $user);

        $redirectUrl = '/';
        $shopUsers = ShopUser::where('user_id', $user->id)
            ->select('*')
            ->get();
        if (count($shopUsers) > 0) {
            // 商店用户
            if (count($shopUsers) === 1) {
                Session::put('ShopUser', $shopUsers[0]);
                Session::put('Shop', Shop::find($shopUsers[0]->shop_id));                
            } else {
                $redirectUrl = '/accounts';
            }
        }

        $produceCompanyUsers = ProduceCompanyUser::where('user_id', $user->id)
            ->select('*')
            ->get();
        if (count($produceCompanyUsers) > 0) {
            // 生产厂家用户
            if (count($produceCompanyUsers) === 1) {
                Session::put('ProduceCompanyUser', $produceCompanyUsers[0]);
                Session::put('ProduceCompany', ProduceCompany::find($produceCompanyUsers[0]->produce_company_id));
            } else {
                $redirectUrl = '/accounts';
            }
        }

        return redirect($redirectUrl);
    }

    /**
     * 注销登录
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        Session::flush();

        return redirect('/login');
    }
}
