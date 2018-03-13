<?php


namespace Sebbaum\Legal\Traits;


trait Summary
{
    /**
     * Show a summary of Lawyer's data.
     *
     * @param $lawyer
     * @param $password
     */
    private function showSummary($lawyer, $password = '*****')
    {
        $summary = [
            'title' => $lawyer['title'],
            'firstname' => $lawyer['firstname'],
            'surname' => $lawyer['surname'],
            'email' => $lawyer['email'],
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
}