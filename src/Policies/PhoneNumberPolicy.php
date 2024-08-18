<?php

namespace Narsil\Contacts\Policies;

#region USE

use Narsil\Contacts\Models\PhoneNumber;
use Narsil\Policies\Policies\AbstractPolicy;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
final class PhoneNumberPolicy extends AbstractPolicy
{
    #region CONSTRUCTOR

    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct(
            PhoneNumber::class,
            canCreate: false,
        );
    }

    #endregion
}
