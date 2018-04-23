# CacheManager
Uma simple classe para tabalhar com Cache no Laravel 5 .*

Adicione a variavel _CACHE_EN_ em seu arquivo __.env__.
```txt
CACHE_EN=true
```

### Usando Calsse
```php
// Injetar uma instancia de \Illuminate\Cache\Repository no primerio parametro.
// O segundo parametro é opcional. É o duração do cache, pode ser do tipo: \DateTimeInterface|\DateInterval|float|int

$valores = "Meu valor de exemplo";
$minutes = 5;
$cache = new CacheManager($repository,$minutes);

// salvou cache com a chave: minhachave caso o CACHE_EN seja true
$cache->minhachave = $valores; 

// Recuperar valor
echo $cache->minhachave;

// Testar se existe a chave

if ($cache->has('minhachave')) {
    echo "existe!";
}
```
