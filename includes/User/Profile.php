<?php

declare(strict_types=1);

namespace MRH\AuthorBox\User;

class Profile
{

    public function __construct()
    {
        add_filter('user_contactmethods', [$this, 'add_user_contacts_methods']);
    }

    /**
     * Adds user contact methods
     *
     * @param array $methods
     * 
     * @return array
     */
    public function add_user_contacts_methods(array $methods): array
    {

        $methods['linkedin'] = __('LinkedIn', 'mrhab-author-box');
        $methods['github']   = __('GitHub', 'mrhab-author-box');
        $methods['twitter']  = __('Twitter', 'mrhab-author-box');
        $methods['facebook'] = __('Facebook', 'mrhab-author-box');

        return $methods;
    }
}
