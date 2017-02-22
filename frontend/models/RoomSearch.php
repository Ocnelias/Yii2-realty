<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Room;

/**
 * RoomSearch represents the model behind the search form about `frontend\models\Room`.
 */
class RoomSearch extends Room
{
    /**
     * @inheritdoc
     */
	 
	 public $min_price;
     public $max_price;
	 public $min_room;
	 public $max_room;
	 public $min_floor;
	 public $max_floor;
	 
	 
	 
    public function rules()
    {
        return [
            [['id', 'floor', 'rooms_number', 'has_parking', 'has_lift', 'has_balcony', 'has_fridge', 'has_washer', 'has_conditioner', 'has_tv', 'has_wifi', 'has_iron', 'has_iron_table', 'has_jacuzzi', 'created_at', 'updated_at', 'user_id'], 'integer'],
            [['title', 'city', 'district', 'street', 'house', 'square', 'description', 'imageFile','min_price','max_price','min_room','max_room','min_floor','max_floor'], 'safe'],
            [['price','min_price','max_price','min_room','max_room','min_floor','max_floor'], 'number'],
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
        $query = Room::find();

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

            'floor' => $this->floor,
            'rooms_number' => $this->rooms_number,
            'has_parking' => $this->has_parking,
			
            'has_lift' => $this->has_lift,
            'has_balcony' => $this->has_balcony,
            'has_fridge' => $this->has_fridge,
            'has_washer' => $this->has_washer,
            'has_conditioner' => $this->has_conditioner,
            'has_tv' => $this->has_tv,
            'has_wifi' => $this->has_wifi,
            'has_iron' => $this->has_iron,
            'has_iron_table' => $this->has_iron_table,
            'has_jacuzzi' => $this->has_jacuzzi,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['>', 'price', $this->min_price])
			->andFilterWhere(['<', 'price', $this->max_price])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'house', $this->house])
            ->andFilterWhere(['like', 'square', $this->square])
            ->andFilterWhere(['like', 'description', $this->description]);
            

        return $dataProvider;
    }
}
