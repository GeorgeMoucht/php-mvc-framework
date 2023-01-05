<?php

namespace app\core;

abstract class UserModel extends DbModel
{

    abstract public function getDisplayName(): string;
    
    abstract public function getDisplayEmail(): string;

    abstract public function getDisplayCountry(): string;

    abstract public function getDisplayCity(): string;

    abstract public function getDisplayInterests(): string;

    abstract public function getDisplayCreatedDate(): string;
}

?>