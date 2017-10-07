<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;

class ModelObserver
{
    /**
     * Listening event on creating.
     *
     * @param  Model $model
     * @return void
     */
    public function creating(Model $model)
    {
        $this->convertEmptyStringsToNull($model);
    }

    /**
     * Listening event on updating.
     *
     * @param  Model $model
     * @return void
     */
    public function updating(Model $model)
    {
        $this->convertEmptyStringsToNull($model);
    }

    /**
     * Listening event on saving.
     *
     * @param  Model $model
     * @return void
     */
    public function saving(Model $model)
    {
        $this->convertEmptyStringsToNull($model);
    }

    /**
     * Listening event on deleting.
     *
     * @param  Model $model
     * @return void
     */
    public function deleting(Model $model)
    {
        $this->convertEmptyStringsToNull($model);
    }

    /**
     * Listening event on restoring.
     *
     * @param  Model $model
     * @return void
     */
    public function restoring(Model $model)
    {
        $this->convertEmptyStringsToNull($model);
    }

    /**
     * Transform any parameters.
     *
     * @param  Model $model
     * @return void
     */
    private function convertEmptyStringsToNull(Model $model)
    {
        foreach ($model->attributesToArray() as $key => $value) {
            $model->{$key} = is_string($value) && $value === '' ? null : $value;
        }
    }

}
