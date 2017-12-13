<?php

namespace App\Traits;


use App\Entities\CouponCode;
use Carbon\Carbon;
use App\Exceptions\CouponCode\AlreadyUsedExceprion;
use App\Exceptions\CouponCode\InvalidPromocodeExceprion;


trait Rewardable
{
    /**
     * Get the promocodes that are related to user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function promocodes()
    {
        return $this->belongsToMany(CouponCode::class, 'coupon_code_user')
            ->withPivot('used_at');
    }

    /**
     * Apply promocode to user and get callback.
     *
     * @param string $code
     * @param null|\Closure $callback
     *
     * @return \App\Entities\CouponCode
     * @throws AlreadyUsedExceprion
     */
    public function applyCode($code, $callback = null)
    {
        try {
            if ($promocode = CouponCode::check($code)) {
                if ($promocode->users()->wherePivot('user_id', $this->id)->exists()) {
                    throw new AlreadyUsedExceprion;
                }
                $promocode->users()->attach($this->id, [
                    'used_at' => Carbon::now(),
                ]);
                $promocode->load('users');
                if (is_callable($callback)) {
                    $callback($promocode);
                }
                return $promocode;
            }
        } catch (InvalidPromocodeExceprion $exception) {
            //
        }
        if (is_callable($callback)) {
            $callback(null);
        }
        return null;
    }

    /**
     * Redeem promocode to user and get callback.
     *
     * @param string $code
     * @param null|\Closure $callback
     *
     * @return CouponCode
     * @throws AlreadyUsedExceprion
     */
    public function redeemCode($code, $callback = null)
    {
        return $this->applyCode($code, $callback);
    }
}