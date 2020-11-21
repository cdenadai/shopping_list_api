<?php

function responseReturn($error)
{
    if (isValidationError($error)) {
        return response()->json($error->validator, $error->status);
    }

    $message = $error->getMessage() ?? 'Server failed';
    $code = $error->getCode() <= 500 && $error->getCode() > 0 ? $error->getCode() : '500';

    return response()->json($message, $code);
}

function isValidationError($error)
{
    $hasStatusField = isset($error->status);

    if (!$hasStatusField) return false;

    $isValidationError = $error->status == 422;

    return $isValidationError;
}
