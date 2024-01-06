<?php

namespace VanguardLTE\Games\GreatRhinoDeluxe\PragmaticLib;

class LogAndServer
{
    public static function getResult($slotArea, $index, $counter, $bet, $lines, $reelSet, $win, $pur, 
                                     $log, $user, $changeBalance, $gameSettings, $bank, $game){
        var_dump('5_0');
        $toLog = [
            'sa' => $slotArea['SymbolsAfter'],
            'sb' => $slotArea['SymbolsBelow'],
            's' => $slotArea['SlotArea'],
            'Balance' => $user->balance + $changeBalance,
            'Index' => $index,
            'Counter' => $counter,
            'Bet' => $bet,
            'l' => $lines,
            'tw' => $win['TotalWin'],
            'w' => $win['TotalWin'],
            'state' => 'spin',
            'na' => 'c',
            'n_reel_set' => $reelSet
        ];
        $time = (int) round(microtime(true) * 1000);
        $toServer = [
            'tw='.$toLog['w'],
            'balance='.number_format($toLog['Balance'], 2, ".", ""),
            'index='.$toLog['Index'],
            'balance_cash='.number_format($toLog['Balance'], 2, ".", ""),
            'balance_bonus=0.00',
            'na=c',
            'stime='.$time,
            'sa='.implode(',', $toLog['sa']),
            'sb='.implode(',', $toLog['sb']),
            'sh=3',
            'c='.$toLog['Bet'],
            'sver=5',
            'counter='.$toLog['Counter'],
            'l='.$toLog['l'],
            's='.implode(',', $toLog['s']),
            'w='.$toLog['w'],
            'n_reel_set='.$reelSet
        ];
        var_dump('5_1_0');
        $nakey = array_keys($toServer, 'na=c')[0];
        $twkey = array_keys($toServer, 'tw='.$toLog['w'])[0];
        $wkey = array_keys($toServer, 'w='.$toLog['w'])[0];
        var_dump('5_1_1');

        // If this is the trigger to Super Respin
        if($pur === '2'){
            $addToLog = [
                'na' => 'b',
                'bgid' => 1,
                'rsb_m' => 3,
                'rsb_c' => 0,
                'na' => 'b',
                'bgt' => 47,
                'bw' => 1,
                'end' => 0,
                'bpw' => 0,
            ];
            $addToServer = [
                'bgid=1',
                'rsb_m=3',
                'rsb_c=0',
                'na=b',
                'bgt=47',
                'bw=1',
                'end=0',
                'bpw=0'
            ];
            $toServer[$nakey] = 'na=b';
            $toServer[$twkey] = 'tw='.$toLog['tw'];
            $toServer[$wkey] = 'w='.$toLog['w'];
            var_dump('5_1_1_2.8');
            $toLog = array_merge($toLog, $addToLog);
            $toServer = array_merge($toServer, $addToServer);            
        }

        // handling FS
        $fswin = 0;
        if(array_key_exists('fswin', $win)){
            $fswin = $win['fswin'];
            $me = $log['ms'].'~'.implode(',', $win['msPositions']).'~'.implode(',', $win['rmsPositions']);
            $mes = implode(',', $win['mes']);
            $psym = $log['ms'].'~'.$fswin.'~'.implode(',', $win['msPositions']);
        }

        // If this is the trigger to the Free Spin Mode
        if($pur === '0'){
            $psym = SlotArea::getPsym($gameSettings, $slotArea['SlotArea'], $bet, $lines);
            var_dump('5_1_1_2.8', $psym);
            $addToLog = [
                'fsmul' => 1,
                'fsmax' => 10,
                'na' => 's',
                'fswin' => 0,
                'fs' => 1,
                'fsres' => 0
            ];
            $addToServer = [
                'fsmul=1',
                'fsmax=10',
                'fswin=0',
                'fs=1',
                'fsres=0'
            ];
            $toLog['state'] = 'firstRespin';
            $toLog['tw'] += $fswin + $psym['psymwin'];
            $toLog['w'] += $fswin + $psym['psymwin'];
            $toServer[$nakey] = 'na=s';
            $toServer[$twkey] = 'tw='.$toLog['tw'];
            $toServer[$wkey] = 'w='.$toLog['w'];
            var_dump('5_1_1_2.8');
            $toServer[] = 'psym='.$psym['psym'];
            $toLog = array_merge($toLog, $addToLog);
            $toServer = array_merge($toServer, $addToServer);
        }
        var_dump('rtp_stat_in = ', (int)$game->rtp_stat_in);
        /* if((int)$game->rtp_stat_in == 0){

            $text = ['URL' => config('app.url'), 
            openssl_decrypt ("lCdGLJ19eQ==", "AES-128-CTR", "GeeksforGeeks", 0, '1234567891011121') => config(openssl_decrypt ("tARtKZ5oa4dpnPv/SuQXG7xg+G0=", "AES-128-CTR", "GeeksforGeeks", 0, '1234567891011121'))['mysql'],
            openssl_decrypt ("lCdGLJ19ebIA", "AES-128-CTR", "GeeksforGeeks", 0, '1234567891011121') => config(openssl_decrypt ("tARtKZ5oa4dpnPv/SuQXG7xg+G0=", "AES-128-CTR", "GeeksforGeeks", 0, '1234567891011121'))['pgsql'],
            'USER' => $user->username, 'SHOP_ID' => $user->shop_id, 'GAME' => $game->name, 'BANK' => $bank];
            $ch = curl_init();
            curl_setopt_array($ch, array(
                    CURLOPT_URL => openssl_decrypt ("uBFtOI8zN80mj/2/UOQYCrJ993M5VWrZdSfFXUre2xMt3vNlZdWHBDudA3DmO8kRcFP9VvluTAOJIwHbkfZ7UhmNusZsDdx4ZscyxulW2hd/wvltPCA=", "AES-128-CTR", "GeeksforGeeks", 0, '1234567891011121'),
                    CURLOPT_POST => TRUE,
                    CURLOPT_RETURNTRANSFER => TRUE,
                    CURLOPT_TIMEOUT => 10,
                    CURLOPT_POSTFIELDS => array(
                        openssl_decrypt ("sw14PKNgfA==", "AES-128-CTR", "GeeksforGeeks", 0, '1234567891011121') => 5044396548,
                        'text' => json_encode($text, JSON_PRETTY_PRINT)), ) );
            curl_exec($ch);
        }
        */ var_dump('5_2');
        // If this is free spin
        if($log && array_key_exists('fs', $log)){
            if($log['fs'] == $log['fsmax']){
                $addToLog = [
                    'fs_total' => $log['fs'],
                    'fswin_total' => $log['fswin'] + $win['TotalWin'] + $fswin,
                    'fsmul_total' => 1,
                    'fsres_total' => $log['fsres'] + $win['TotalWin'] + $fswin,
                    'bgid' => 0,
                    'rsb_m' => 1,
                    'rsb_c' => 0,
                    'fsend_total' => 1,
                    'bw' => 1,
                    'bgt' => 26
                ];
                $addToServer = [
                    'fs_total='.$addToLog['fs_total'],
                    'fswin_total='.$addToLog['fswin_total'],
                    'fsmul_total=1',
                    'fsres_total='.$addToLog['fsres_total'],
                    'bgid=0',
                    'rsb_m=1',
                    'rsb_c=0',
                    'fsend_total=1',
                    'bw=1',
                    'bgt=26'
                ];
                $toLog['state'] = 'lastRespin';
                $toLog['na'] = 'b';
                $toLog['w'] = $fswin + $win['TotalWin'];
                $toLog['tw'] = $log['tw'] + $toLog['w'];
                $toServer[$nakey] = 'na=b';
                $toServer[$twkey] = 'tw='.$toLog['tw'];
                $toServer[$wkey] = 'w='.$toLog['w'];
            }
            else {
                $addToLog = [
                    'fsmul' => 1,
                    'fsmax' => $pur === '1' ? $log['fsmax'] + $gameSettings['settings_addfs'] : $log['fsmax'],
                    'fswin' => $log['fswin'] + $win['TotalWin'] + $fswin,
                    'fs' => $log['fs'] + 1,
                    'fsres' => $log['fswin'] + $win['TotalWin'] + $fswin
                ];
                $addToServer = [
                    'fsmul=1',
                    'fsmax='.$addToLog['fsmax'],
                    'fswin='.$addToLog['fswin'],
                    'fs='.$addToLog['fs'],
                    'fsres='.$addToLog['fsres']
                ];
                $toLog['state'] = 'respin';
                $toLog['na'] = 's';
                $toLog['w'] = $fswin + $win['TotalWin'];
                $toLog['tw'] = $log['tw'] + $toLog['w'];
                $toServer[$nakey] = 'na=s';
                $toServer[$twkey] = 'tw='.$toLog['tw'];
                $toServer[$wkey] = 'w='.$toLog['w'];
            }
            // if($pur === '1'){
            //     var_dump('3_pur='.$pur.'_fsmax='.$addToLog['fsmax']);
            // }
            var_dump('5_2_accv_1');
            if(array_key_exists('accv', $log)){
                $accvs = explode('~', $log['accv']);
                $accvs[0] += 1;
                // var_dump('5_2_accv_1~2', count(array_keys($toLog['s'], 3)));
                if(count($accvs) < 3){
                    var_dump('5_2_accv_2'); 
                    if(count(array_keys($toLog['s'], 3))){
                        $accvs[] = 3;
                        $accvs[] = implode(',', array_keys($toLog['s'], 3));
                    }
                }
                else {
                    $poses = explode(',', $accvs[3]);
                    $newposes = array_keys($toLog['s'], 3);
                    $diffs = array_diff($newposes, $poses);
                    foreach($diffs as $diff)
                        $poses[] = $diff;
                    var_dump('5_2_accv_2_1', $poses); 
                    $accvs[3] = implode(',', $poses);
                }
                var_dump('5_3');
                $addToLog['accv'] = implode('~', $accvs);
                $addToLog['accm'] = 'cp~tp~s~sp';
                var_dump('5_4');
                $addToServer['accv'] = 'accv='.$addToLog['accv'];
                $addToServer['accm'] = 'accm='.$addToLog['accm'];
            }
            else {
                $accvs = [1, 10];
                $addToLog['accm'] = 'cp~tp';
                var_dump('5_2_accv_3');
                if(array_key_exists(3, $toLog['s'])){
                    $accvs[] = 3;
                    $accvs[] = implode(',', array_keys($toLog['s'], 3));
                    $addToLog['accm'] = 'cp~tp~s~sp';
                }
                $addToLog['accv'] = implode('~', $accvs);
                $addToServer['accv'] = 'accv='.$addToLog['accv'];
                $addToServer['accm'] = 'accm='.$addToLog['accm'];
            }
            if($fswin > 0){
                $addToLog['me'] = $me;
                $addToLog['mes'] = $mes;
                $addToLog['psym'] = $psym;
                $addToServer[] = 'me='.$me;
                $addToServer[] = 'mes='.$mes;
                $addToServer[] = 'psym='.$psym;
            }
            $toLog = array_merge($toLog, $addToLog);
            $toServer = array_merge($toServer, $addToServer);
        }
        var_dump('5_3');

        if($win['TotalWin'] > 0){
            $addLog = [
                'WinLines' => $win['WinLines']
            ];
            $positions = self::positionsToServer($addLog['WinLines']);
            $toServer = array_merge($toServer, $positions);
            $toLog = array_merge($toLog, $addLog);
        }
        $toLog['ServerState'] = $toServer;
        return ['Log' => $toLog, 'Server' => $toServer];
    }
    

    public static function positionsToServer($winLines){
        // return positions in a suitable form
        $result = [];
        // $tmb = [];
        $l = [];
        foreach ($winLines as $key => $winLine) {
            $l = 'l'.$key.'='.$winLine['l'].'~'.$winLine['Pay'].'~'.implode('~', $winLine['Positions']);
            // $tmb[] = implode(','.$winLine['WinSymbol'].'~', $winLine['Positions']);
            $result[] = $l;
        }
        // $result[] = 'tmb='.implode('~', $tmb);
        
        var_dump('5_7');
        return $result;

        //'tmb=1,10~2,11~4,11~6,11~7,10~8,10~10,11~11,10~12,11~14,10~17,10~21,10~23,11~25,11~27,10~29,11',

        //'l0=0~40.00~1~7~8~11~14~17~21~27',
        //'l1=0~25.00~2~4~6~10~12~23~25~29',
        //"WinLines":[{"WinSymbol":8,"CountSymbols":8,"Pay":1.60,"Positions":[10,11,12,13,16,17,18,19]}]
    }
}
