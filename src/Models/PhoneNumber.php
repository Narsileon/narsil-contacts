<?php

namespace Narsil\Contacts\Models;

#region USE

use Illuminate\Database\Eloquent\Model;
use Narsil\Contacts\Scopes\PhoneNumberScope;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class PhoneNumber extends Model
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
    final public const COUNTRY_CODE = 'country_code';
    /**
     * @var string
     */
    final public const ID = 'id';
    /**
     * @var string
     */
    final public const LABEL = 'label';
    /**
     * @var string
     */
    final public const NUMBER = 'number';
    /**
     * @var string
     */
    final public const PHONE_NUMBER = 'phone_number';
    /**
     * @var string
     */
    final public const TYPE = 'type';

    /**
     * @var string
     */
    final public const TABLE = 'phone_numbers';

    #endregion

    #region PROTECTED METHODS

    /**
     * @return void
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new PhoneNumberScope);
    }

    #endregion
}
