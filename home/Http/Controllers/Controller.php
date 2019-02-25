<?php

namespace APPLICATION_HOME\Http\Controllers;

use Abraham\TwitterOAuth\TwitterOAuth;
use APPLICATION_HOME\Models\Video;
use APPLICATION_HOME\Models\Vote;
use Illuminate\Http\Request;

class Controller extends ModuleController {

    public function vote(Request $request){
        if($request->has('token') and $request->has('video_id')){
            $user = $this->getUloginUser($request);
            if(empty($user['uid'])){
                return response()->json(['status'=>false, 'errorText' => 'не найден пользователь']);
            }
            if(Vote::where('social_id', $user['uid'])->exists()){
                return response()->json(['status' => false, 'user' => $user, 'errorText' => 'Вы уже голосовали']);
            } else {
                $vote = Vote::create([
                    'email' => !empty($user['email']) ?  $user['email'] : '-',
                    'link' => !empty($user['profile']) ?  $user['profile'] : '-',
                    'type' => !empty($user['network']) ?  $user['network'] : '-',
                    'social_id' => !empty($user['uid']) ?  $user['uid'] : '-',
                    'name' => !empty($user['first_name']) ?  $user['first_name'] : '' . !empty($user['last_name']) ?  $user['last_name'] : '',
                    'video_id' => $request->get('video_id')
                ]);
                return response()->json(['status' => true, 'user' => $user]);
            }

        } else {
            return response()->json(['status'=>false, 'errorText' => 'не верный запрос']);
        }
    }

    public function vote_twitter(Request $request){
        $api_key = 'AVa91842tJbP4nfM1KFaUlKSh';
        $api_secret = 'RXWqrkLe49MyGBqNjabAnVwji6TS2l0l9w7wKrbu0lD6cbrR6T';
        $connection = new TwitterOAuth($api_key, $api_secret, $request->get('access_token'), $request->get('access_token_secret'));
        $user = $connection->get('account/verify_credentials', ['include_email' => true]);
        if(Vote::where('social_id', $user->id)->exists()){
            return response()->json(['status' => false, 'user' => $user, 'errorText' => 'Вы уже голосовали']);
        } else {
            $vote = Vote::create([
                'email' => !empty($user->email) ?  $user->email : '-',
                'link' => 'https://twitter.com/intent/user?user_id='.$user->id,
                'type' => 'twitter',
                'social_id' => $user->id,
                'name' => $user->name,
                'video_id' => $request->get('video_id')
            ]);
            return response()->json(['status' => true, 'user' => $user]);
        }
        /*return ['test' => $content];*/

    }

    public function getVideoViews($id){
        $video = Video::find($id);
        return ['views' => $video->videoViews()];
    }

    public function video_share($id){
        $video = Video::find($id);
        return view('share', compact('video'));
    }

    public function votes_export(Request $request){
        if($request->get('password', null) != 'awdgl5l23ug1h23.a,doa31'){
            exit;
        }
        $data = Vote::all();
        // output headers so that the file is downloaded rather than displayed
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=votes.csv');
        $output = fopen('php://output', 'w');
        fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
        fputcsv($output, array('id', 'email', 'name', 'link', 'created_at', 'social_id', 'video_id'), ';');
        foreach ($data as $item){
            fputcsv($output, [
                $item->id, $item->email, $item->name, $item->link, $item->created_at->format('d.m.Y H:i'), $item->social_id, $item->video_id
            ], ';');
        }
        exit;
    }

    private function getUloginUser(Request $request){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://lookbook-ulogin.grapheme.ru/index.php?token=' . $request->get('token') . '&urlDriver=http://ulogin.ru/token.php&host=' . $_SERVER['HTTP_HOST']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
        #curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
        #curl_setopt($ch, CURLOPT_HEADER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = curl_exec($ch);
        curl_close($ch);
        // Get information about user.
        //$data = file_get_contents('http://ulogin.ru/token.php?token=' . $request->get('token') . '&host=' . $_SERVER['HTTP_HOST']);
        $user = json_decode($data, TRUE);
        return $user;
    }
}
