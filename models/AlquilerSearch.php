<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Alquiler;

/**
 * AlquilerSearch represents the model behind the search form about `app\models\Alquiler`.
 */
class AlquilerSearch extends Alquiler
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'socios_id', 'libros_id'], 'integer'],
            [['fecha'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Alquiler::find();

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
            'id' => $this->id,
            'socios_id' => $this->socios_id,
            'libros_id' => $this->libros_id,
            'fecha' => $this->fecha,
        ]);

        return $dataProvider;
    }
}
