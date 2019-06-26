<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog_catalog".
 *
 * @property string $id_catalog
 * @property string $name_blog
 * @property string $description
 * @property string $name_sumary
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class CatalogBlog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_catalog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_catalog', 'name_blog', 'description', 'name_sumary'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['id_catalog', 'name_blog'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 1000],
            [['name_sumary'], 'string', 'max' => 300],
            [['id_catalog'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_catalog' => 'Id Catalog',
            'name_blog' => 'Name Blog',
            'description' => 'Description',
            'name_sumary' => 'Name Sumary',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
