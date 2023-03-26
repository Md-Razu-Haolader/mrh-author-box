<?php

declare(strict_types=1);

namespace MRH\AuthorBox\Frontend;


class Ajax
{

    public function __construct()
    {
        add_action('wp_ajax_mrhab_enquiry', [$this, 'submit_enquiry']);
        add_action('wp_ajax_nopriv_mrhab_enquiry', [$this, 'submit_enquiry']);
    }

    /**
     * Submits enquiry request
     *
     * @return void
     */
    public function submit_enquiry(): void
    {

        if (!wp_verify_nonce($_REQUEST['_wpnonce'], 'mrhab-enquiry-form')) {
            wp_send_json_error([
                'message' => 'Authorization Failed!'
            ]);
        }

        $data = array(
            'name' => esc_attr($_POST['name']),
            'email' => esc_attr($_POST['email']),
            'enquiry' => esc_textarea($_POST['message'])
        );

        wp_send_json_success($data);

        wp_send_json_error([
            'message' => 'Something went wrong'
        ]);
    }
}
