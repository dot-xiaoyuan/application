<?php

namespace backend\modules\rbac\models\search;

use backend\modules\rbac\models\AuthItem;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * authItemSearch represents the model behind the authItemSearch form of `backend\modules\rbac\models\AuthItem`.
 */
class authItemSearch extends AuthItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'rule_name', 'data'], 'safe'],
            [['type', 'created_at', 'updated_at'], 'integer'],
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
     * Creates data provider instance with authItemSearch query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = AuthItem::find();

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
            'type' => $this->type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'rule_name', $this->rule_name])
            ->andFilterWhere(['like', 'data', $this->data]);

        return $dataProvider;
    }
}