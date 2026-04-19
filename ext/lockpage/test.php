<?php

declare(strict_types=1);

namespace Shimmie2;

final class LockPageTest extends ShimmiePHPUnitTestCase
{
    public function testDowntime(): void
    {
        Ctx::$config->set(LockPageConfig::MESSAGE, "brb, unit testing");

        // downtime on
        Ctx::$config->set(LockPageConfig::LOCKPAGE, true);

        self::log_in_as_admin();
        self::get_page("post/list");
        self::assert_text("DOWNTIME MODE IS ON!");
        self::assert_response(200);

        self::log_in_as_user();
        self::get_page("post/list");
        self::assert_content("brb, unit testing");
        self::assert_response(503);

        // downtime off
        Ctx::$config->set(LockPageConfig::LOCKPAGE, false);

        self::log_in_as_admin();
        self::get_page("post/list");
        self::assert_no_text("DOWNTIME MODE IS ON!");
        self::assert_response(200);

        self::log_in_as_user();
        self::get_page("post/list");
        self::assert_no_content("brb, unit testing");
        self::assert_response(200);
    }
}
