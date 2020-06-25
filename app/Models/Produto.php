<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Produto
 *
 * @property int $id
 * @property string $nome
 * @property float $qnt_inicial
 * @property float $vlr_padrao
 * @property int $categoria_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Produto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Produto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Produto query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Produto whereCategoriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Produto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Produto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Produto whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Produto whereQntInicial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Produto whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Produto whereVlrPadrao($value)
 * @mixin \Eloquent
 */
class Produto extends Model
{
    protected $table = 'produto';

}
