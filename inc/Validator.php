<?php 
    function validate_input($field, $data, $required = false, $maxLength = null) {
        if ($required && empty($data[$field])) {
            return "$field is required.";
        }
        if ($maxLength && strlen($data[$field]) > $maxLength) {
            return "$field must not exceed $maxLength characters.";
        }
        return null;
    }
?>