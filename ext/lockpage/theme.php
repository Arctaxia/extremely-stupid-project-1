<?php

declare(strict_types=1);

namespace Shimmie2;

use function MicroHTML\{B, DIV, H3, INPUT, LABEL, SECTION, SPAN, TABLE, TD, TH, TR, P, A};
use function MicroHTML\{LINK, TITLE, emptyHTML};

class LockPageTheme extends Themelet
{
    /**
     * Show the admin that downtime mode is enabled

    public function display_notification(): void
    {
        Ctx::$page->add_block(new Block(
            "Downtime",
            SPAN(["style" => "font-size: 1.5rem; text-align: center;"], B("DOWNTIME MODE IS ON!")),
            "left",
            0
        ));
    }*/

    /**
     * Display $message and exit
     */
    public function display_message(string $message): void
    {
        $theme_name = Ctx::$config->get(SetupConfig::THEME);

        $head = emptyHTML(
            TITLE("Autredex - welcome, stranger..."),
            LINK(["rel" => "stylesheet", "href" => Url::base() . "/ext/static_files/style.css", "type" => "text/css"]),
            LINK(["rel" => "stylesheet", "href" => Url::base() . "/themes/$theme_name/style.css", "type" => "text/css"]),
            /* my font bs again... */
            LINK(["rel" => "preconnect", "href" => "https://fonts.googleapis.com"]),
            LINK(["rel" => "preconnect", "href" => "https://fonts.gstatic.com", "crossorigin"]),
            LINK(["href" => "https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap", "rel" => "stylesheet"]),

        );
        $body = DIV(
            ["id" => "downtime", "style" => "margin: 1% 10%;"],
            SECTION(
                H3(["style" => "text-align: center;", "id" => "title"], "Autredex"),
                DIV(["id" => "message", "class" => "blockbody"], $message)
            ),
            SECTION(
                H3("Login"),
                DIV(
                    ["id" => "login", "class" => "blockbody"],
                    SHM_SIMPLE_FORM(
                        make_link("user_admin/login"),
                        TABLE(
                            ["class" => "form"],
                            TR(
                                TH(["width" => "70"], LABEL(["for" => "user"], "Name")),
                                TD(["width" => "70"], INPUT(["id" => "user", "type" => "text", "name" => "user"]))
                            ),
                            TR(
                                TH(LABEL(["for" => "pass"], "Password")),
                                TD(INPUT(["id" => "pass", "type" => "password", "name" => "pass"]))
                            ),
                            TR(
                                TD(["colspan" => "2"], SHM_SUBMIT("Log In"))
                            )
                        )
                    ),
                )
            ),
            /* probably not best to write a wholeass FAQ section directly in the theme like this but what can I do with my current skillset */
            SECTION(
                H3("...So what the hell is Autredex anyway?"),
                    P("The Autredex is an imageboard dedicated to archiving the highest quality media related to the niche subgenre Blackgaze as possible, as well as measuring how much of it there is."),

                H3("Why is it closed off?"),
                    P("Like I mentioned before, it's mainly an experiment and a way for me to hone my web development and hosting skills. So, to keep my peace of mind, I'd rather not leave it open to the public. Also, the first point kind of explains this, but it's really jank as well"),

                H3("Who runs this website?"),
                    P(A(["href" => "https://arctaxia.ink"], "Arctaxia.")),

                H3("Can I at least see some screenshots?"),
                    P("Okay, fine:")
            )
        );

        Ctx::$page->set_code(403);
        Ctx::$page->set_data(MimeType::HTML, (string)Ctx::$page->html_html($head, $body));
    }
}
