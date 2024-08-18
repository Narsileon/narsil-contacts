<?php

namespace Narsil\Contacts\Models;

#region USE

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
class ModelHasAddress extends Model
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

        $this->timestamps = false;

        parent::__construct($attributes);
    }

    #endregion

    #region CONSTANTS

    /**
     * @var string
     */
    final public const ADDRESS_ID = 'address_id';
    /**
     * @var string
     */
    final public const ID = 'id';
    /**
     * @var string
     */
    final public const MODEL_ID = 'model_id';
    /**
     * @var string
     */
    final public const MODEL_TYPE = 'model_type';

    /**
     * @var string
     */
    final public const RELATIONSHIP_ADDRESS = 'address';
    /**
     * @var string
     */
    final public const RELATIONSHIP_MODEL = 'model';

    /**
     * @var string
     */
    final public const TABLE = 'model_has_addresses';

    #endregion

    #region RELATIONSHIPS

    /**
     * @return BelongsTo
     */
    final public function address(): BelongsTo
    {
        return $this->belongsTo(
            Address::class,
            self::ADDRESS_ID,
            Address::ID,
        );
    }

    /**
     * @return MorphTo
     */
    final public function model(): MorphTo
    {
        return $this->morphTo(
            self::RELATIONSHIP_MODEL,
            self::MODEL_TYPE,
            self::MODEL_ID
        );
    }

    #endregion
}
