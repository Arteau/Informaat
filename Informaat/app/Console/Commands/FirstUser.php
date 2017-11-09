<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Jeugdhuis;
class FirstUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'first:User {username} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Makes first user with pass and username by choice';

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
     * @return mixed
     */
    public function handle()
    {
        $jeugdhuis = new Jeugdhuis();
        $jeugdhuis->name = "Formaat";
        $jeugdhuis->village = "Berchem";
        $jeugdhuis->zipcode = "2600";
        $jeugdhuis->save();

        $user = new User();
        $user->name = $this->argument('username');
        $user->password = \Hash::make($this->argument('password'));
        $user->email = $this->argument('email');
        $user->isAdmin = 1;
        $user->jeugdhuis_id = 1;
        $user->save();
        echo "user aangemaakt met email: ".$this->argument('email')." en als passwoord: "+$this->argument('password');
    }
}
