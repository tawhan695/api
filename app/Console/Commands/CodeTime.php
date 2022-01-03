<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Keytime;
use App\Models\Key_has_user;
class CodeTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'code:codetime';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'countdown code ';

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
    $key = Key_has_user::join('keytimes','key_has_users.keytime_id', '=','keytimes.id')
    ->select('key_has_users.*','keytimes.keytime','keytimes.days')
    ->get();
    // ->join('keytimes','key_has_users.keytime_id', '=', 'keytimes.id')
    foreach ($key as $item ){
        echo $item->days . '>'. $item->created_at . '>';
    }
    }
}
