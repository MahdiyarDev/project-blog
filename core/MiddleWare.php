<?php

namespace Core;

interface MiddleWare{
    public function handle(callable $next);
}