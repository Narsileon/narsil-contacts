<?php

namespace Narsil\Contacts\Traits;

#region USE

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Narsil\Contacts\Models\Address;
use Narsil\Contacts\Models\ModelHasAddress;

#endregion

trait HasAddresses
{
    #region RELATIONSHIPS

    /**
     * @return MorphToMany
     * */
    public function addresses(): MorphToMany
    {
        return $this->morphToMany(
            Address::class,
            ModelHasAddress::RELATIONSHIP_MODEL,
            ModelHasAddress::TABLE,
            ModelHasAddress::MODEL_ID,
            ModelHasAddress::ADDRESS_ID
        );
    }

    #endregion
}
