<?php

declare( strict_types=1 );

namespace MRH\AuthorBox\Tests\Unit;

use MRH\AuthorBox\Helpers\Template as TemplateHelper;
use RuntimeException;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class TemplateHelperTest extends TestCase {

    private static $template_helper;

    public static function set_up_before_class(): void {
        static::$template_helper = new TemplateHelper();
    }

    public function test_should_render_template_when_valid_path_given() {
        $this->expectNotToPerformAssertions();
        ob_start();
        $file_path = MRHAB_INCLUDES . '/Frontend/views/enquiry-form.php';
        static::$template_helper->render( $file_path, ['posts' => []] );
        ob_get_clean();
    }

    public function test_should_throw_error_when_invalid_path_given() {
        $this->expectException( RuntimeException::class );
        $file_path = MRHAB_INCLUDES . '/Frontend/templates/test.php';
        static::$template_helper->render( $file_path );
    }
}
