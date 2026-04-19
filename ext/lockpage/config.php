<?php

declare(strict_types=1);

namespace Shimmie2;

final class LockPageConfig extends ConfigGroup
{
    public const KEY = "LockPage";

    #[ConfigMeta("Disable non-admin access", ConfigType::BOOL, default: false)]
    public const LOCKPAGE = "lockpage";

    #[ConfigMeta("Message for users", ConfigType::STRING, input: ConfigInput::TEXTAREA, default: "The site is currently down for maintenance.")]
    public const MESSAGE = "downtime_message";
}
