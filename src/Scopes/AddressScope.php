<?php

namespace Narsil\Contacts\Scopes;

#region USE

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\DB;
use Narsil\Contacts\Models\Address;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
final class AddressScope implements Scope
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
        $sql .= Address::ADDRESS_LINE_1;
        $sql .= ",' ',";
        $sql .= Address::ADDRESS_LINE_2;
        $sql .= ",', ',";
        $sql .= Address::POSTAL_CODE;
        $sql .= ",' ',";
        $sql .= Address::CITY;
        $sql .= ",', ',";
        $sql .= Address::COUNTRY;
        $sql .= ') AS ';
        $sql .= Address::ADDRESS;

        $builder
            ->select('*')
            ->addSelect(DB::raw($sql));
    }

    #endregion
}
