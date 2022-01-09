<?php

call_user_func(function ($entryPoint) {
    try {
        require $entryPoint;
    } catch (Throwable $e) {
        if (!is_readable($entryPoint)) {
            exit(sprintf('Error: could not require entry point: %s.', $entryPoint));
        }

        exit(sprintf('General error: %s.', $e->getCode()));
    }
}, $entryPoint);
