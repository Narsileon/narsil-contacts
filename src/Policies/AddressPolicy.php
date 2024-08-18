<?php

namespace Narsil\Contacts\Policies;

#region USE

use Narsil\Contacts\Models\Address;
use Narsil\Policies\Policies\AbstractPolicy;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
final class AddressPolicy extends AbstractPolicy
{
    #region CONSTRUCTOR

    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct(
            Address::class,
            canCreate: false,
        );
    }

    #endregion
}
