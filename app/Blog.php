<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    protected $fillable = array(
        'noteid',
        'title',
        'content',
        'userid',
        'created_at',
        'updated_at'
    );

    public function run($request){
        $user = DB::table('user')->where([
                    ['login', $_POST['login']],
                    ['password', MD5($_POST['password'])]
                ])->get();

        if(count($user)>0){
            $user_row = $user[0];

            $request->session()->put('role', $user_row->role);
            $request->session()->put('loggedIn', true);
            $request->session()->put('userid', $user_row->userid);

            $cookiehash = md5(sha1($user_row->login.self::sGetIP()));

            if (isset($_POST['remember'])) {
                setcookie('username', $cookiehash, time() + 3600 * 24 * 365, '/');
            } else {
                setcookie('username', $cookiehash, 0, '/');
            }

            DB::table('user')->where('userid',$user_row->userid)->update(['login_session'=>$cookiehash]);
        }
    }

    public function xhrInsert($request){
        $id = DB::table('data')->insertGetId(['text' => $_POST['text']]);

        $data = ['text' => $_POST['text'], 'id' => $id];
        echo json_encode($data);
    }

    public function edit($id){
        $aNote = DB::table('note')->where('noteid',$id)->get();
        if(count($aNote)>0)
            return $aNote[0];
        else
            return array();
    }

    public function editSave(){

    }

    public function xhrGetListings(){
        $result = DB::table('data')->get();
        echo json_encode($result);
    }

    public function xhrDeleteListing(){
        $id = (int) $_POST['id'];
        DB::table('data')->where('dataid', $id)->delete();
    }

    public function noteList($request){
        $userid = $request->session()->get('userid');
        $aNote = DB::table('note')->where('userid', $userid)->get();
        return $aNote;
    }

    public function create($request){
        $userid = $request->session()->get('userid');
        $id = DB::table('note')->insertGetId(
            [
                'title' => $_POST['title'],
                'userid' => $userid,
                'content' => $_POST['content'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
    }


    public static function sGetIP()
    {
        if (! empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }


}
