<?php

namespace Ikoncept\ProductManagerAdapter\Commands;

use Illuminate\Console\Command;

class ProductManagerAdapterCommand extends Command
{
    public $signature = 'product-manager-adapter';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
