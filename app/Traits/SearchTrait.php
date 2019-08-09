<?php

namespace App\Traits;

trait SearchTrait {

   /**
     * Busca vi un parametro el query enviado
     *
     *
     * @param $query
     * @return $string
     */
    public function scopeSearch( $query, $field, $text) {

        return $query->where($field,$text);

    }

}
