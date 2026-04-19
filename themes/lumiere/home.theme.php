<?php

# this is all bs'ed and copied, I don't actually know what I'm doing

declare(strict_types=1);

namespace Shimmie2;

use function MicroHTML\{LINK, TITLE, META, emptyHTML};

use MicroHTML\HTMLElement;

class LumiereHomeTheme extends HomeTheme

{
    public function display_page(string $sitename, HTMLElement $body): void
    {
        Ctx::$page->add_auto_html_headers();
        Ctx::$page->set_data(MimeType::HTML, (string)Ctx::$page->html_html(
            emptyHTML(
                TITLE($sitename),
                META(["http-equiv" => "Content-Type", "content" => "text/html;charset=utf-8"]),
                META(["name" => "viewport", "content" => "width=device-width, initial-scale=1"]),
                LINK(["rel" => "preconnect", "href" => "https://fonts.googleapis.com"]),
                LINK(["rel" => "preconnect", "href" => "https://fonts.gstatic.com", "crossorigin"]),
                LINK(["href" => "https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap", "rel" => "stylesheet"]),
                ...Ctx::$page->get_all_html_headers(),
            ),
            $body
        ));
    }
# <link rel="preconnect" href="https://fonts.googleapis.com">
# <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
# <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">
}

