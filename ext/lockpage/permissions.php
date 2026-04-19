<?php

declare(strict_types=1);

namespace Shimmie2;

final class LockPagePermission extends PermissionGroup
{
    public const KEY = "LockPage";

    #[PermissionMeta("Ignore downtime", help: "These users can still access the site during downtime")]
    public const IGNORE_DOWNTIME = "ignore_downtime";
}
