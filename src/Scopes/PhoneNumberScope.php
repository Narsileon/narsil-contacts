<?php

namespace Narsil\Contacts\Scopes;

#region USE

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\DB;
use Narsil\Contacts\Models\PhoneNumber;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
final class PhoneNumberScope implements Scope
{
    #region PUBLIC METHODS

    /**
     * @param Builder $builder
     * @param Model $model
     *
     * @return void
     */
    public function apply(Builder $builder, Model $model): void
    {
        $sql = 'CONCAT(';
        $sql .= PhoneNumber::COUNTRY_CODE;
        $sql .= ",' ',";
        $sql .= PhoneNumber::NUMBER;
        $sql .= ') AS ';
        $sql .= PhoneNumber::PHONE_NUMBER;

        $builder
            ->select('*')
            ->addSelect(DB::raw($sql));
    }

    #endregion
}
