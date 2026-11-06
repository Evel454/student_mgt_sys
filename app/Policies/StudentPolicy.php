<?php

namespace App\Policies;

use App\Models\Student;
use App\Models\User;

class StudentPolicy
{
    /**
     * Admins can list all students.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('manage students');
    }

    /**
     * Admins can view any student.
     * A student can view only the record whose email matches their own account.
     */
    public function view(User $user, Student $student): bool
    {
        if ($user->can('manage students')) {
            return true;
        }

        return $user->can('view own registrations')
            && strtolower($user->email) === strtolower($student->email);
    }

    public function create(User $user): bool
    {
        return $user->can('manage students');
    }

    public function update(User $user, Student $student): bool
    {
        return $user->can('manage students');
    }

    public function delete(User $user, Student $student): bool
    {
        return $user->can('manage students');
    }
}