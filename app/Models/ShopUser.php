<?php
namespace App\Models;

// Services
use App;
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopUser extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'shop_id',
        'user_id',
        'type',
        'email',
        'position',
        'status',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'    => 'integer',
        'shop_id'   => 'integer',
        'user_id' => 'integer',
        'type'  => 'integer',
        'email' => 'string',
        'position'  => 'string',
        'status'    => 'integer',
        'created_by'    => 'integer',
        'updated_by'    => 'integer',
        'deleted_by'    => 'integer',
    ];

    /**
     * 加入用户姓名
     *
     * @param \Illuminate\Database\Eloquent\Builder $query <不需要赋值，系统自动复制>
     * @return \Illuminate\Database\Eloquent\Builder $query
     */
    public function scopeWithUserName($query, $tableName = 'users', $fullname = 'fullname')
    {
        $query->join('users', function($join) {
            $join->on('shop_users.user_id', '=', 'users.id')
                ->on('users.deleted_at', ' IS ', DB::raw('NULL'));
        });

        if (App::getLocale() === 'en') {
            return $query->addSelect(
                DB::raw('CONCAT(' . $tableName . '.f_name, " ", ' . $tableName . '.l_name) AS ' . $fullname)
            );
        } else {
            return $query->addSelect(
                DB::raw('CONCAT(' . $tableName . '.l_name, " ", ' . $tableName . '.f_name) AS ' . $fullname)
            );
        }
    }

}
