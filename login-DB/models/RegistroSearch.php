<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tareas;

/**
 * RegistroSearch represents the model behind the search form of `app\models\Tareas`.
 */
class RegistroSearch extends Tareas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'ID_Usuario'], 'integer'],
            [['Tarea', 'Descripción'], 'safe'],
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
        $query = Tareas::find();

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
            'ID' => $this->ID,
            'ID_Usuario' => $this->ID_Usuario,
        ]);

        $query->andFilterWhere(['like', 'Tarea', $this->Tarea])
            ->andFilterWhere(['like', 'Descripción', $this->Descripción]);

        return $dataProvider;
    }
}
