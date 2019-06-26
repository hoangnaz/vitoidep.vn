<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Blog;

/**
 * BlogSearch represents the model behind the search form of `app\models\Blog`.
 */
class BlogSearch extends Blog
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blog_id', 'viet_nam_title', 'blog_name', 'blog_catalog', 'image_blog', 'content_sumary', 'content_full', 'date_create', 'date_update', 'create_user'], 'safe'],
            [['number_view', 'status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Blog::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
            'number_view' => $this->number_view,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'blog_id', $this->blog_id])
            ->andFilterWhere(['like', 'viet_nam_title', $this->viet_nam_title])
            ->andFilterWhere(['like', 'blog_name', $this->blog_name])
            ->andFilterWhere(['like', 'blog_catalog', $this->blog_catalog])
            ->andFilterWhere(['like', 'image_blog', $this->image_blog])
            ->andFilterWhere(['like', 'content_sumary', $this->content_sumary])
            ->andFilterWhere(['like', 'content_full', $this->content_full])
            ->andFilterWhere(['like', 'create_user', $this->create_user]);

        return $dataProvider;
    }
}
