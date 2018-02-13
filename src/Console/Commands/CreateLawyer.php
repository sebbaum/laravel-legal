<?php

namespace Sebbaum\Legal\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
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

        $newLawyer = [];
        $title = $this->ask('Title (optional)', false);
        $newLawyer['title'] = $title === false ? '' : $title;
        $newLawyer['firstname'] = $this->ask('First name');
        $newLawyer['surname'] = $this->ask('Surename');
        $newLawyer['email'] = $this->ask('Email');
//        $password = $this->secret('Password');
        $password = Str::random(6);
        $newLawyer['password'] = bcrypt($password);
        $newLawyer['notify'] = $this->confirm('Send an invite mail to the newly created lawyer?', false);

        Validator::make($newLawyer,
            [
                'firstname' => 'required',
                'surname' => 'required',
                'email' => 'required|email|unique:lawyers',
                'password' => 'required'
            ]
        )->validate();



        $lawyer = Lawyer::create($newLawyer);

        if ($newLawyer['notify']) {
            $lawyer->notify(new NotifyLawyer($lawyer, $password));
        }

        // TODO: show a summary before sending the mail
        return true;
    }

    // TODO: list lawyers

    // TODO: update a lawyer

    // TODO: delete a lawyer
}
