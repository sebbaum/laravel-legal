<?php

namespace Sebbaum\Legal\Console\Commands;

use Illuminate\Console\Command;
use Sebbaum\Legal\Models\Lawyer;

class CreateLawyer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'legal:create-lawyer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Lawyer';

    /**
     * Create a new Lawyer.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line('Create a new Lawyer account for editing legal documents.');

        $answers = [];
        $title = $this->ask('Title (optional)', false);
        $answers['title'] = $title === false ? '' : $title;
        $answers['firstname'] = $this->ask('First name');
        $answers['surname'] = $this->ask('Surename');
        $answers['email'] = $this->ask('Email');
        $answers['password'] = bcrypt($this->secret('Password'));

        // TODO: validation

        Lawyer::create($answers);

        // TODO: send an email
        // TODO: use a one time password

        return true;
    }
}
