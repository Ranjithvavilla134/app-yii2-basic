<?php

namespace app\models\search;

use app\models\SourceMessage;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Class SourceMessageSearch
 * @package app\models\search
 */
class SourceMessageSearch extends SourceMessage
{
    public $translationEn;
    public $translationRu;
    public $translationKz;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['message', 'category', 'translationEn', 'translationRu', 'translationKz'], 'safe']
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
        $query = SourceMessage::find()->groupBy('source_message.id');

        $query->joinWith('messages');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 15,
            ],
        ]);

        /*$dataProvider->sort->attributes['translationRu'] = [
            'asc'  => ['messages.language' => SORT_ASC],
            'desc' => ['messages.language' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['translationKz'] = [
            'asc'  => ['messages.language' => SORT_ASC],
            'desc' => ['messages.language' => SORT_DESC],
        ];*/

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id'       => $this->id,
            'category' => 'app'
        ]);

        $query->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'translation', $this->translationEn])
            ->andFilterWhere(['like', 'translation', $this->translationRu])
            ->andFilterWhere(['like', 'translation', $this->translationKz]);

        return $dataProvider;
    }
}
