<?php

namespace VanguardLTE\Games\JohnHunterAndTheMayanGods\PragmaticLib;


class SwitchMoney
{

    public static function set($pur, $bet, $shop, $bank, $jpgs, $user, $game, $callbackUrl, $win, $slotArea, $fswin, $currentLog, $win_permisson){
        var_dump('6_0_bet='.$bet);
        if ($bet){ // if rate is not 0
            $bet *= -1;
            $user->decrement('balance', $bet);
            $user->save();
        }
        if (is_array($win_permisson)) $win = $win_permisson['win'];
        
        $toBonus = array_key_exists('fswin', $currentLog) ? $currentLog['fswin'] : false;
                
        if ($user->count_balance > 0 && $user->count_balance > $bet ) { // if you don't run out of money
            $user->count_balance -= $bet;
			// Fix bonus balances
			$_var_1_sum = $_var_2 = $sum = abs(floatval($bet));
			if ($user->count_balance == 0 || $user->count_balance < $_var_1_sum) {
				foreach ([
					"count_tournaments",
					"count_happyhours",
					"count_refunds",
					"count_progress",
					"count_daily_entries",
					"count_invite",
					"count_welcomebonus",
					"welcomebonus",
					"count_smsbonus",
					"count_wheelfortune"
				] as $field) {
					$value = floatval($user->$field);
					if ($value > 0) {
						if ($_var_2 == 0) {
							break;
						} else {
							if ($value < $_var_2) {
								$_var_2 = $_var_2 - $value;
								$user->decrement($field, $value);
							} else {
								$user->decrement($field, $_var_2);
								$_var_2 = 0;
							}
						}
					}
				}
			}
			// Fix bonus balances
            $myMoney = $bet;
        }
        else if ($user->count_balance < $bet && $user->count_balance > 0) { // if own money is not enough to bet
            $myMoney = $user->count_balance;
            $user->count_balance = 0;
        }else $myMoney = 0;
        $user->save();
        $toJackpot = Jackpots::toJP($myMoney, $jpgs); // split into jackpots
        $toProfit = $myMoney * ((100 - $shop->percent) / 100); // calculate the owner's profit
        
        // var_dump('6_1_bet='.$bet.'_toJackpot='.$toJackpot.'_toProfit='.$toProfit);
        $toSlotBank = SlotBank::addBank($bet, $bank, $toJackpot, $toProfit, $toBonus); // add money to the bank and calculate how much money is in the slot
        var_dump('6_2');

        // if (array_key_exists('fswin', $currentLog)) $win = $currentLog['FSPay']; // if free spins fell out, then add to the winnings

        $game->stat_out += $win + $fswin;
        $game->stat_in += $toSlotBank; // add the amount of money deposited into the slot
        $game->rtp_stat_out += $win;
        $game->rtp_stat_in += $toSlotBank; // add the amount of money deposited into the slot for rtp calculation
        $game->save();

        Statistic::setStatistic($user, $win + $fswin, $game, $bank, $bet, $toSlotBank, $toJackpot, $toProfit, $fswin, $slotArea);
        // var_dump('6_3_fswin='.$fswin.'_win='.$win.'_slots='.$bank->slots.'_bonus='.$bank->bonus);

        $bank->decrement('bonus',$fswin);
        $bank->decrement('slots',$win);
        $bank->save();
        var_dump('6_4');
    }
}
