<?php

namespace Sebbaum\Legal\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Sebbaum\Legal\Models\Lawyer;
use Sebbaum\Legal\Traits\Summary;

class UpdateLawyer extends Command
{
    use Summary;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'legal:update-lawyer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update a Lawyer';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $email = $this->ask('What\'s the email address of the lawyer you want to change.');

        $lawyer = Lawyer::where('email', $email)
            ->first();

        $updatedLawyer = [];
        $title = $this->ask('Title (optional)', $lawyer->title);
        $updatedLawyer['title'] = $title === false ? '' : $title;
        $updatedLawyer['firstname'] = $this->ask('First name', $lawyer->firstname);
        $updatedLawyer['surname'] = $this->ask('Surename', $lawyer->surname);
        $updatedLawyer['email'] = $this->ask('Email', $lawyer->email);

        Validator::make($updatedLawyer,
            [
                'firstname' => 'required',
                'surname' => 'required',
                'email' => 'required|email|unique:lawyers,email,' . $lawyer->id,
            ]
        )->validate();

        $this->showSummary($updatedLawyer);

        $inputCorrect = $this->confirm('Are these values correct?', true);

        if (!$inputCorrect) {
            $this->error('Lawyer not updated.');
            return false;
        }

        $lawyer->update($updatedLawyer);

        return true;
    }
}
