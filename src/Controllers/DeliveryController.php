<?php

namespace App\Controllers;

use App\Controllers\Dtos\DeliveryDto;
use App\Controllers\Params\GetDeliveryPricesParams;
use Yii;
use yii\filters\ContentNegotiator;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;

class DeliveryController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors(): array
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::class,
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];
        return $behaviors;
    }

    /**
     * Get domain with prices
     *
     * @return DeliveryDto[]
     * @throws BadRequestHttpException
     */
    public function actionCheck(): array
    {
        $params = new GetDeliveryPricesParams();
        if (!$params->load(Yii::$app->request->get(), '') || !$params->validate()) {
            throw new BadRequestHttpException();
        }

        // todo найти список типов лоставки из таблицы type
        // todo создать список город + тип
        // todo проверить город на корректность имени (разрешены латинские символы, пробелы и тире)
        // todo проверить наличие города в таблице deny
        // todo создать список dto с ценами для типов доставки

        /** @var DeliveryDto[] $dtos */
        $dtos = [];
        return $dtos;
    }
}
