<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the blog.
     *
     * @param  User $user
     * @param  Blog $blog
     * @return mixed
     */
    public function update(User $user, Blog $blog)
    {
        return $user->getAttribute('id') == $blog->getAttribute('user_id');
    }

    /**
     * Determine whether the user can delete the blog.
     *
     * @param  User $user
     * @param  $blog
     * @return mixed
     */
    public function delete(User $user, Blog $blog)
    {
        return $user->getAttribute('id') == $blog->getAttribute('user_id');
    }

    /**
     * Determine whether the user can view the blog.
     *
     * @param  User $user
     * @param  $blog
     * @return mixed
     */
    public function view(User $user, Blog $blog)
    {
        return $user->getAttribute('age') >= $blog->getAttribute('age_limit')
            && ($user->getAttribute('gender') == $blog->getAttribute('gender_limit')
                || $blog->getAttribute('gender_limit') == 2 );
    }
}
