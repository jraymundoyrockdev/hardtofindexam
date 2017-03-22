<?php

namespace HardToFindExam\Services;

class RequestValidator {

    private $validFields = ['username'];

    public function validate($requestFields)
    {
        foreach ($this->validFields as $field) {
            if (array_key_exists($field, $requestFields)) {
                return true;
            }
        }

        return false;
    }
}
