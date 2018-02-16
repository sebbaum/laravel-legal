<?php

namespace Sebbaum\Legal\Console;

use Illuminate\Console\Command;
use Sebbaum\Legal\Models\Lawyer;

class ListLawyers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'legal:list-lawyers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all Lawyers';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $lawyers = Lawyer::all([
            'title',
            'firstname',
            'surname',
            'email',
            'force_reset_password'])
            ->toArray();

        $this->table([
            'Title',
            'First name',
            'Surname',
            'Email',
            'Must reset password'],
            $lawyers);

        return true;
    }
}
