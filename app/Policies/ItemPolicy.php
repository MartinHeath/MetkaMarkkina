<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\marketItem;

class ItemPolicy
{
    use HandlesAuthorization;

    //
    public function destroy(User $user, MarketItem $item){
      return (($user->id == $item->user_id) || ($item->user_id == 0));
    }
}
