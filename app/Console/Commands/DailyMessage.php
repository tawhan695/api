<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\User;
use Carbon\Carbon;
$mutable = Carbon::now();

class DailyMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:message';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send best wishes daily.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $messages = [
            'A. A. Milne' => 'People say nothing is impossible, but I do nothing every day.',
            'Abraham Lincoln' => 'Better to remain silent and be thought a fool than to speak out and remove all doubt.',
            'Abraham Lincoln' => 'If I were two-faced, would I be wearing this one?',
            'Al McGuire' => 'The only mystery in life is why the kamikaze pilots wore helmets.',
            'Alan Dundes' => 'Light travels faster than sound. This is why some people appear bright until you hear them speak.',
            'Albert Camus' => 'Nobody realizes that some people expend tremendous energy merely to be normal.'
        ];

        // Setting up a random word
        $key = array_rand($messages);
        $data = $messages[$key];

        // $users = User::all();
        // foreach ($users as $user) {
        //     Mail::raw("{$key} -> {$data}", function ($mail) use ($user) {
        //         $mail->from('tanongsak@tawhan-studio.com');
        //         $mail->to($user->email)
        //             ->subject('Good monring!');
        //     });
        // }
        print_r( $messages);
        $this->info('Message sent.');
    }
}
