<?php

namespace Narsil\Contacts\Traits;

#region USE

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Narsil\Contacts\Models\ModelHasPhoneNumber;
use Narsil\Contacts\Models\PhoneNumber;

#endregion

trait HasPhoneNumbers
{
    #region RELATIONSHIPS

    /**
     * @return MorphToMany
     * */
    final public function phone_numbers(): MorphToMany
    {
        return $this->morphToMany(
            PhoneNumber::class,
            ModelHasPhoneNumber::RELATIONSHIP_MODEL,
            ModelHasPhoneNumber::TABLE,
            ModelHasPhoneNumber::MODEL_ID,
            ModelHasPhoneNumber::PHONE_NUMBER_ID
        );
    }

    #endregion
}
