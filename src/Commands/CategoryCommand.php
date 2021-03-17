<?php

namespace Iyngaran\Category\Commands;

use Illuminate\Console\Command;

class CategoryCommand extends Command
{
    public $signature = 'iynga:laravel-categories';

    public $description = 'The command to create, update and delete categories';

    public function handle()
    {
        $this->comment('All done');
    }
}
