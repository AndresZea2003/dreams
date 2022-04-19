<?php

namespace App\Observers;

use App\Models\Invoice;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ModelObserver
{

    public function created(Model $model): void
    {
        Log::info($this->getMessage($model, 'created'), $this->info($model));
    }

    public function updated(Model $model): void
    {
        Log::info($this->getMessage($model, 'updated'), $this->info($model));
    }

    public function deleted(Model $model): void
    {
        Log::warning($this->getMessage($model, 'deleted'), $this->info($model));
    }

    protected function info(Model $model): array
    {
        return [
            'model_id' => $model->getKey(),
            'user_id' => auth()->id(),
        ];
    }
    protected function getMessage(Model $model, string $type): string
    {
        return trans('logs.messages.' . $type, ['model' => get_class($model)]);
    }

    public function restored(Model $model): void
    {
        //
    }

    public function forceDeleted(Model $model): void
    {
        //
    }
}
