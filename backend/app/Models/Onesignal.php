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

    public static function sendNotifications()
    {
        $players = OneSignalManager::getDevices()['players'];
        $roleChefId =  Role::where('name', 'chef')->first()->id;
        $roleCashierId =  Role::where('name', 'cashier')->first()->id;
        $users = Auth::user()->store->users;
        foreach ($users as $user) {
            if ($user->role_id === $roleChefId) {
                self::pushNotification($players, $user, 'http://172.16.0.142:8080/chef');
            } else if ($user->role_id === $roleCashierId) {
                self::pushNotification($players, $user, 'http://172.16.0.142:8080/cashier');
            }
        }
    }

    // Using array filter: https://stackoverflow.com/questions/61410592/laravel-filter-array-based-on-element-value
    // Using array shift: https://stackoverflow.com/questions/1617157/how-to-get-the-first-item-from-an-associative-php-array
    public static function pushNotification($players, $user, $url)
    {
        foreach ($user->onesignals as $onesignal) {
            $player = array_filter($players, function ($player) use ($onesignal) {
                return $player["id"] === $onesignal->player_id;
            });
            $player = array_shift($player);
            if ($player) {
                if (!$player['invalid_identifier']) {
                    $fields['include_player_ids'] = [$onesignal->player_id];
                    $fields['headings'] = array("en" => "Restaurant Management System");
                    $message = 'You have a new order. Please check.';
                    $fields['url'] = $url;
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
