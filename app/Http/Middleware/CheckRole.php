<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    protected array $roleHierarchy = [
        'user' => ['user'],
        'moderator' => ['user', 'moderator'],
        'admin' => ['user', 'moderator', 'admin'],
        'superadmin' => ['user', 'moderator', 'admin', 'superadmin'],
    ];

    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (!$request->user()) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $user = $request->user();
        $allowedRoles = $this->parseRoles($roles);

        if ($this->hasAccess($user->role, $allowedRoles)) {
            return $next($request);
        }

        return response()->json([
            'message' => 'Access denied. Required roles: ' . implode(', ', $allowedRoles),
            'your_role' => $user->role
        ], 403);
    }

    protected function hasAccess(string $userRole, array $allowedRoles): bool
    {
        if (in_array($userRole, $allowedRoles)) {
            return true;
        }

        foreach ($allowedRoles as $allowedRole) {
            if (isset($this->roleHierarchy[$allowedRole]) &&
                in_array($userRole, $this->roleHierarchy[$allowedRole])) {
                return true;
            }
        }

        return false;
    }

    protected function parseRoles(array $roles): array
    {
        if (count($roles) === 1 && str_contains($roles[0], ',')) {
            return explode(',', $roles[0]);
        }

        return $roles;
    }
}
