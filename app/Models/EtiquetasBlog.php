<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EtiquetasBlog
 * 
 * @property string $etiqueta
 *
 * @package App\Models
 */
class EtiquetasBlog extends Model
{
	protected $table = 'etiquetas_blog';
	protected $primaryKey = 'etiqueta';
	public $incrementing = false;
	public $timestamps = false;
    
    protected $fillable = [
        'etiqueta',
    ];
}
