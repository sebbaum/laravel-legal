<?php

namespace Sebbaum\Legal\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Sebbaum\Legal\Models\Lawyer;

class DeleteLawyer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'legal:delete-lawyer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a Lawyer from the database';

    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws \Exception
     */
    public function handle()
    {
        $input = [];
        $input['email'] = $this->ask('What\'s the email address of the Lawyer?');

        Validator::make($input, ['email' => 'email'])
            ->validate();

        /** @var Lawyer $lawyer */
        $lawyer = Lawyer::where('email', $input['email'])
            ->first();

        if (is_null($lawyer)) {
            $this->error("A Lawyer with the given email address ({$input['email']}) does not exist!");
            return false;
        }

        if ($lawyer->delete()) {
            $this->info("Lawyer {$input['email']} has been deleted.");
        }
        return true;
    }
}
