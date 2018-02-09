<?php

namespace Sebbaum\Legal\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Sebbaum\Legal\Models\Lawyer;
use Sebbaum\Legal\Notifications\NotifyLawyer;

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
        $password = $this->secret('Password');
        $answers['password'] = bcrypt($password);
        $answers['notify'] = $this->confirm('Send an invite mail to the newly created lawyer?', false);

        Validator::make($answers,
            [
                'firstname' => 'required',
                'surname' => 'required',
                'email' => 'required|email|unique:lawyers',
                'password' => 'required'
            ]
        )->validate();

        $lawyer = Lawyer::create($answers);

        if ($answers['notify']) {
            $lawyer->notify(new NotifyLawyer($lawyer, $password));
        }

        // TODO: use a one time password (check via middleware)
        return true;
    }
}
