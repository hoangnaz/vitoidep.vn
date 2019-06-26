<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog".
 *
 * @property string $blog_id
 * @property string $viet_nam_title
 * @property string $blog_name
 * @property string $blog_catalog
 * @property string $image_blog
 * @property string $content_sumary
 * @property string $content_full
 * @property string $date_create
 * @property string $date_update
 * @property string $create_user
 * @property int $number_view
 * @property int $status
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blog_id', 'viet_nam_title', 'blog_name', 'blog_catalog', 'image_blog', 'content_sumary', 'content_full', 'date_create', 'date_update', 'create_user', 'number_view'], 'required'],
            [['date_create', 'date_update'], 'safe'],
            [['number_view', 'status'], 'integer'],
            [['blog_id', 'blog_catalog'], 'string', 'max' => 200],
            [['viet_nam_title', 'blog_name'], 'string', 'max' => 300],
            [['image_blog', 'content_sumary'], 'string', 'max' => 500],
            [['content_full'], 'string', 'max' => 10000],
            [['create_user'], 'string', 'max' => 100],
            [['blog_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'blog_id' => 'Blog ID',
            'viet_nam_title' => 'Viet Nam Title',
            'blog_name' => 'Blog Name',
            'blog_catalog' => 'Blog Catalog',
            'image_blog' => 'Image Blog',
            'content_sumary' => 'Content Sumary',
            'content_full' => 'Content Full',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'create_user' => 'Create User',
            'number_view' => 'Number View',
            'status' => 'Status',
        ];
    }
}
