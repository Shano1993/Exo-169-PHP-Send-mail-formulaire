<?php

/**
 * @param string ...$inputNames
 * @return bool
 */
function issetMandatoryPostValues(string ...$inputNames): bool {
    foreach ($inputNames as $inputName) {
        if (!isset($_POST[$inputName]) || empty($_POST[$inputName])) {
            return false;
        }
    }
    return true;
}

function getSecuredStringPostData(string $name): string {
    $data = $_POST[$name];
    return strip_tags(trim($data));
}

function validateRange(int $min, int $max, string $inputName, string $redirectURL): void {
    $len = strlen(trim($_POST[$inputName]));
    if ($len < $min || $len > $max) {
        header('Location: ' . $redirectURL);
        exit();
    }
}

