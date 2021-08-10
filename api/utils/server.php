<?php

function ensureHttpMethod(string $method): void {
    if($_SERVER['REQUEST_METHOD'] !== $method) {
        header('Location: ../error.php?error=405');
        die();
    }
}