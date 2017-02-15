<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    //order statuses
    const STATUS_PENDING = 'pending';
    const STATUS_PROCESSING = 'processing';
    const STATUS_FINISHED = 'finished';
    const STATUS_PREORDER = 'preorder';

    /**
     * Returns status description by code
     *
     * @param $order_status
     * @return string
     */
    public static function getStatusDescr($order_status)
    {
        switch ($order_status) {
            case self::STATUS_PENDING:
                return 'ожидает обработки';
                break;
            case self::STATUS_PROCESSING:
                return 'в обработке';
                break;
            case self::STATUS_FINISHED:
                return 'выполнен';
                break;
            case self::STATUS_PREORDER:
                return 'предзаказ';
                break;
        }
    }
}
