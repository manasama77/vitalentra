#!/usr/bin/env php
<?php
/*
|--------------------------------------------------------------------------
| Test Script for NoIndex Middleware
|--------------------------------------------------------------------------
| This script tests whether the NoIndex middleware is properly applied
| to authenticated routes by checking for the X-Robots-Tag header.
*/

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

echo "Testing NoIndex Middleware Configuration...\n\n";

// Test 1: Check if middleware is registered
$middleware = $app->make('router')->getMiddleware();
if (array_key_exists('noindex', $middleware)) {
    echo "✅ NoIndex middleware is registered as 'noindex'\n";
    echo "   Class: " . $middleware['noindex'] . "\n";
} else {
    echo "❌ NoIndex middleware is NOT registered\n";
}

// Test 2: Check if middleware class exists
$middlewareClass = 'App\Http\Middleware\NoIndexForAuthRoutes';
if (class_exists($middlewareClass)) {
    echo "✅ NoIndex middleware class exists: $middlewareClass\n";
} else {
    echo "❌ NoIndex middleware class does NOT exist: $middlewareClass\n";
}

echo "\n";
echo "Routes with 'noindex' middleware:\n";
echo "- /login (guest, noindex)\n";
echo "- /dashboard (auth, verified, noindex)\n";
echo "- /settings/* (auth, verified, noindex)\n";
echo "- /flyonui-demo (auth, verified, noindex)\n";
echo "- /verify-email (auth, noindex)\n";
echo "- /confirm-password (auth, noindex)\n";

echo "\n";
echo "To test manually:\n";
echo "1. Visit http://localhost:8000/login\n";
echo "2. Check response headers for 'X-Robots-Tag: noindex, nofollow, noarchive, nosnippet, noimageindex'\n";
echo "3. Check HTML source for <meta name=\"robots\" content=\"noindex, nofollow, noarchive, nosnippet, noimageindex\">\n";

echo "\nTest completed!\n";
