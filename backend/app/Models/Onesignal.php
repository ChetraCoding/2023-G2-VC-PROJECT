<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Ladumor\OneSignal\OneSignal as OneSignalManager;

class Onesignal extends Model
{
    use HasFactory;
    protected $fillable = [
        'player_id',
        'user_id'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    // Send to notification by user role
    public static function sendNotifications()
    {
        // Get all users from OneSignal app
        $players = OneSignalManager::getDevices()['players'];
        $roleChefId =  Role::where('name', 'chef')->first()->id;
        $roleCashierId =  Role::where('name', 'cashier')->first()->id;
        // Get all staff from store
        $users = Auth::user()->store->users;
        foreach ($users as $user) {
            if ($user->role_id === $roleChefId) {
                // Push notofication to Chef role
                self::pushNotification($players, $user, 'http://172.16.0.142:8080/chef');
            } else if ($user->role_id === $roleCashierId) {
                // Push notofication to Cashier role
                self::pushNotification($players, $user, 'http://172.16.0.142:8080/cashier');
            }
        }
    }

    // Using array filter: https://stackoverflow.com/questions/61410592/laravel-filter-array-based-on-element-value
    // Using array shift: https://stackoverflow.com/questions/1617157/how-to-get-the-first-item-from-an-associative-php-array
    public static function pushNotification($players, $user, $url)
    {
        // Loop onesignals from an user
        foreach ($user->onesignals as $onesignal) {
            // Check player in OneSignal app
            $player = array_filter($players, function ($player) use ($onesignal) {
                return $player["id"] === $onesignal->player_id;
            });
            // Get first player object from array
            $player = array_shift($player);
            if ($player) {
                // Check player active subscribe
                if (!$player['invalid_identifier']) {
                    // Put player id to OneSignal fields
                    $fields['include_player_ids'] = [$onesignal->player_id];
                    // Put notification header to OneSignal fields
                    $fields['headings'] = array("en" => "Restaurant Management System");
                    // Put message to OneSignal fields
                    $message = 'You have a new order. Please check.';
                    // Put site url to OneSignal fields
                    $fields['url'] = $url;
                    // Push a notification to player to OneSignal app
                    OneSignalManager::sendPush($fields, $message);
                }
            }
        }
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
