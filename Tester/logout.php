<?php
require_once 'core.php';
if (!AutoRise()) {
    location('login');
}
logout();