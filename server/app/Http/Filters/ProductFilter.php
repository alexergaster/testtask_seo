<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const MIN_PRICE = 'min_price';
    public const MAX_PRICE = 'max_price';
    public const SEARCH = 'search';
    public const START_DATE = 'start_date';
    public const END_DATE = 'end_date';
    public const SORT_BY = 'sort_by';
    public const CATEGORY_ID = 'category_id';


    protected function getCallbacks(): array
    {
        return [
            self::SEARCH => [$this, 'search'],
            self::MIN_PRICE => [$this, 'min_price'],
            self::MAX_PRICE => [$this, 'max_price'],
            self::START_DATE => [$this, 'start_date'],
            self::END_DATE => [$this, 'end_date'],
            self::SORT_BY => [$this, 'sort_by'],
            self::CATEGORY_ID => [$this, 'category_id'],
        ];
    }

    public function category_id(Builder $builder, $value):void
    {
        $builder->where('category_id', '=', $value);
    }

    public function sort_by(Builder $builder, $value):void
    {
        $builder->orderBy('name', $value);
    }

    public function start_date(Builder $builder, $value): void
    {
        $builder->where('created_at', '>=', $value);
    }

    public function end_date(Builder $builder, $value): void
    {
        $builder->where('created_at', '<=', $value);
    }

    public function min_price(Builder $builder, $value): void
    {
        $builder->where('price', '>=', $value);
    }

    public function max_price(Builder $builder, $value): void
    {
        $builder->where('price', '<=', $value);
    }

    public function search(Builder $builder, $value): void
    {
        $builder->where('name', 'like', "%{$value}%");
        $builder->Where('description', 'like', "%{$value}%");
    }


}
