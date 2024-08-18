<?php

namespace Narsil\Contacts\Models;

#region USE

use Illuminate\Database\Eloquent\Model;
use Narsil\Contacts\Scopes\AddressScope;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class Address extends Model
{
    #region CONSTRUCTOR

    /**
     * @param array $attributes
     *
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        $this->table = self::TABLE;

        parent::__construct($attributes);
    }

    #endregion

    #region CONSTANTS

    /**
     * @var string
     */
    final public const ADDRESS = 'address';
    /**
     * @var string
     */
    final public const CITY = 'city';
    /**
     * @var string
     */
    final public const COUNTRY = 'country';
    /**
     * @var string
     */
    final public const HOUSE_NUMBER = 'house_number';
    /**
     * @var string
     */
    final public const ID = 'id';
    /**
     * @var string
     */
    final public const STREET = 'street';
    /**
     * @var string
     */
    final public const ZIPCODE = 'zipcode';

    /**
     * @var string
     */
    final public const TABLE = 'addresses';

    #endregion

    #region PUBLIC METHODS

    /**
     * @return void
     */
    public static function booted(): void
    {
        static::addGlobalScope(new AddressScope);
    }

    #endregion
}
