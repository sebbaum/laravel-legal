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
        $password = Str::random(6);
        $newLawyer['password'] = bcrypt($password);

        Validator::make($newLawyer,
            [
                'firstname' => 'required',
                'surname' => 'required',
                'email' => 'required|email|unique:lawyers',
                'password' => 'required'
            ]
        )->validate();

        $this->showSummary($newLawyer, $password);

        $inputCorrect = $this->confirm('Are these values correct?', true);

        if (!$inputCorrect) {
            $this->error('No Lawyer created.');
            return false;
        }

        $newLawyer['notify'] = $this->confirm('Send an invitation email to the newly created lawyer?', false);

        $lawyer = Lawyer::create($newLawyer);

        if ($newLawyer['notify']) {
            $lawyer->notify(new NotifyLawyer($lawyer, $password));
        }

        return true;
    }

    /**
     * Show a summary of Lawyer's data.
     *
     * @param $newLawyer
     * @param $password
     */
    private function showSummary($newLawyer, $password)
    {
        /*
         * Summary table
         */
        $summary = [
            'title' => $newLawyer['title'],
            'firstname' => $newLawyer['firstname'],
            'surname' => $newLawyer['surname'],
            'email' => $newLawyer['email'],
            'password' => $password
        ];

        $this->table([
            'Title',
            'First name',
            'Surname',
            'Email',
            'Password'],
            [$summary]);
    }

    // TODO: list lawyers

    // TODO: update a lawyer
}
