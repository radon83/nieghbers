<?php

namespace App\Jobs;

use App\Notifications\ResetPasswordNotification;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetPasswordJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $token;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        //
        $this->user = $user;
        $this->token = Crypt::encrypt($this->user->email . '#' . Str::random(20) . '#' . Carbon::now()->addMinutes(3));
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        DB::table('password_resets')->where('email', '=', $this->user->email)->delete();

        $id = DB::table('password_resets')->insertGetId([
            'email' => $this->user->email,
            'code' => $this->token,
            'token' => 'token',
            'created_at' => Carbon::now()
        ]);

        if (is_null($this->user)) {
            log('No user!');

            return redirect()->route('control.panel');
        }

        $this->user->notify(new ResetPasswordNotification($this->token));
    }
}
