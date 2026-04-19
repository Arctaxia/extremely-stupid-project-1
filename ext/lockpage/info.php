<?php

declare(strict_types=1);

namespace Shimmie2;

final class LockPageInfo extends ExtensionInfo
{
    public const KEY = "LockPage";

    public string $name = "Loginwall";
    public array $authors = ["Arctax" => "https://arctaxia.ink" ];
    public ExtensionCategory $category = ExtensionCategory::ADMIN;
    public string $description = "Show a login page for anonymous users";
    public ?string $documentation =
        "Forked and modified from the Downtime extension. Once installed there will be some more options on the config page --
Ticking \"disable non-admin access\" will mean that regular and anonymous
users will be blocked from accessing the site, only able to view the
message specified in the box.";
}
