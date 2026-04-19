<?php

declare(strict_types=1);

namespace Shimmie2;

/** @extends Extension<DowntimeTheme> */
final class LockPage extends Extension
{
    public const KEY = "LockPage";

    #[EventListener(priority: 10)]
    public function onPageRequest(PageRequestEvent $event): void
    {
        if (Ctx::$config->get(LockPageConfig::LOCKPAGE)) {
            if (!Ctx::$user->can(LockPagePermission::IGNORE_DOWNTIME) && !$this->is_safe_page($event)) {
                $msg = Ctx::$config->get(LockPageConfig::MESSAGE);
                $this->theme->display_message($msg);
                if (!defined("UNITTEST")) {  // hax D:
                    $page = Ctx::$page;
                    header("HTTP/1.1 {$page->code} Forbidden");
                    print($page->data);
                    exit;
                }
            }
            /*$this->theme->display_notification();*/
        }
    }

    private function is_safe_page(PageRequestEvent $event): bool
    {
        if ($event->page_matches("user_admin/login")) {
            return true;
        } else {
            return false;
        }
    }
}
