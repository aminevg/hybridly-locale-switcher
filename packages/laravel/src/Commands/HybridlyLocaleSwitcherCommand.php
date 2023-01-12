<?php

namespace Aminevg\HybridlyLocaleSwitcher\Commands;

use Illuminate\Console\Command;

class HybridlyLocaleSwitcherCommand extends Command
{
    public $signature = 'hybridly-locale-switcher';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
