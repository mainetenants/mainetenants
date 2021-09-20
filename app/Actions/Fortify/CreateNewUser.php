<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use DB;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

         $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        
        $basic = DB::table('user_info')->insert([
            'user_id' => $user->value('id')]);
        
        $bas1 = DB::table('msu_user_work_education')->insert([
            'user_id' => $user->value('id')]);
            //dd($bas1);

        $interest = DB::table('msu_interest')->insert([
                'user_id' => $user->value('id')]);

         $account = DB::table('msu_account_setting')->insert([
                'user_id' => $user->value('id')]);
                //dd($interest);
                return $user;
         $acc_settings = DB::table('msu_account_setting')->insert([
                'user_id' => $user->value('id'),
                'enable_follow_me' => '1',
                'sub_users' => '1',
                'send_me_notifications' => '1',
                'text_messages' => '1',
                'enable_tagging' => '1',
                'enable_sound_notification' => '1',
            ]);
                //dd($interest);
                return $user;
        
    
    }
}
