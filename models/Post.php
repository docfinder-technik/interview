<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class Post extends ActiveRecord
{
    public static function tableName()
    {
        return "post";
    }

    public function rules()
    {
        return [
            [["title", "content", "author"], "required"],
            [["title", "content"], "trim"],
            [["title", "content"], "string", "length" => [1]],
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public static function findNewest($n = 5)
    {
       return Post::find()
            ->orderBy("created_at DESC")
            ->limit($n)
            ->all();
    }

    public static function findAllOrderedByNewest()
    {
       return Post::find()
            ->orderBy("created_at DESC")
            ->all(); 
    }
}