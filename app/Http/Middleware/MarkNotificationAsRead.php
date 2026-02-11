<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MarkNotificationAsRead
{

    public function handle(Request $request, Closure $next): Response
    {
        if ($request->query('notify_admin') && auth('admin')->check()) {
            $notification = auth('admin')->user()->notifications()->where('id', $request->query('notify_admin'))->first();
            if ($notification) {
                $notification->markAsRead();
            }
        }
        return $next($request);
    }
}
