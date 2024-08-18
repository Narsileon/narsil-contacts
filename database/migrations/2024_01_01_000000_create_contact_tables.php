<?php

#region USE

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Narsil\Contacts\Models\Address;
use Narsil\Contacts\Models\ModelHasAddress;
use Narsil\Contacts\Models\ModelHasPhoneNumber;
use Narsil\Contacts\Models\PhoneNumber;

#endregion

return new class extends Migration
{
    #region MIGRATIONS

    /**
     * @return void
     */
    public function up(): void
    {
        $this->createAddressesTable();
        $this->createPhoneNumbersTable();

        $this->createModelHasAddressesTable();
        $this->createModelHasPhoneNumbersTable();
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(ModelHasPhoneNumber::TABLE);
        Schema::dropIfExists(PhoneNumber::TABLE);

        Schema::dropIfExists(ModelHasAddress::TABLE);
        Schema::dropIfExists(Address::TABLE);
    }

    #endregion

    #region TABLES

    /**
     * @return void
     */
    private function createAddressesTable(): void
    {
        if (Schema::hasTable(Address::TABLE))
        {
            return;
        }

        Schema::create(Address::TABLE, function (Blueprint $table)
        {
            $table
                ->id(Address::ID);
            $table
                ->string(Address::COUNTRY);
            $table
                ->string(Address::CITY);
            $table
                ->string(Address::ZIPCODE);
            $table
                ->string(Address::STREET);
            $table
                ->string(Address::HOUSE_NUMBER);
            $table
                ->timestamps();
        });
    }

    /**
     * @return void
     */
    private function createModelHasAddressesTable(): void
    {
        if (Schema::hasTable(ModelHasAddress::TABLE))
        {
            return;
        }

        Schema::create(ModelHasAddress::TABLE, function (Blueprint $table)
        {
            $table
                ->id(ModelHasAddress::ID);
            $table
                ->foreignId(ModelHasAddress::ADDRESS_ID)
                ->constrained(Address::TABLE, Address::ID)
                ->cascadeOnDelete();
            $table
                ->nullableMorphs(ModelHasAddress::RELATIONSHIP_MODEL);
        });
    }

    /**
     * @return void
     */
    private function createPhoneNumbersTable(): void
    {
        if (Schema::hasTable(PhoneNumber::TABLE))
        {
            return;
        }

        Schema::create(PhoneNumber::TABLE, function (Blueprint $table)
        {
            $table
                ->id(PhoneNumber::ID);
            $table
                ->string(PhoneNumber::TYPE);
            $table
                ->string(PhoneNumber::COUNTRY_CODE, 5);
            $table
                ->string(PhoneNumber::NUMBER, 15);
            $table
                ->timestamps();
        });
    }

    /**
     * @return void
     */
    private function createModelHasPhoneNumbersTable(): void
    {
        if (Schema::hasTable(ModelHasPhoneNumber::TABLE))
        {
            return;
        }

        Schema::create(ModelHasPhoneNumber::TABLE, function (Blueprint $table)
        {
            $table
                ->id(ModelHasPhoneNumber::ID);
            $table
                ->foreignId(ModelHasPhoneNumber::PHONE_NUMBER_ID)
                ->constrained(PhoneNumber::TABLE, PhoneNumber::ID)
                ->cascadeOnDelete();
            $table
                ->nullableMorphs(ModelHasPhoneNumber::RELATIONSHIP_MODEL);
        });
    }

    #endregion
};
