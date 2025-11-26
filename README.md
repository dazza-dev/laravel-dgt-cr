# Laravel DGT Costa Rica 🇨🇷

Paquete Laravel para generar, firmar y enviar documentos electrónicos (Factura, Nota crédito, Nota débito y Tiquete Electrónico) al Ministerio de Hacienda (Costa Rica).

## Instalar

```bash
composer require dazza-dev/laravel-dgt-cr
```

## Configurar

Publica el archivo de configuración:

```bash
php artisan vendor:publish --tag="laravel-dgt-cr-config"
```

## Migraciones

Publica y ejecuta las migraciones:

```bash
php artisan vendor:publish --tag="laravel-dgt-cr-migrations"
```

```bash
php artisan migrate
```

## Insertar los datos

```bash
php artisan dgt-cr:install
```

## Variables de entorno

```bash
DGT_TEST=true # true o false
DGT_CERTIFICATE_PATH=ruta_del_certificado
DGT_CERTIFICATE_PASSWORD=clave_del_certificado
DGT_AUTH_USERNAME=nombre_de_usuario
DGT_AUTH_PASSWORD=contraseña_de_usuario
DGT_PATH=ruta_donde_se_guardaran_los_archivos
DGT_CALLBACK_URL=url_de_callback
```

## Ejemplos

### Generar un documento electrónico

Para enviar un documento electrónico como Factura, Nota crédito, Nota débito o Tiquete Electrónico. primero debes pasar la estructura de datos que puedes encontrar en: [dazza-dev/dgt-xml-generator](https://github.com/dazza-dev/dgt-xml-generator).

### Configurar el emisor y receptor

Antes de enviar un documento, debes configurar el emisor y receptor. Esto se puede hacer con los métodos `setIssuer` y `setReceiver`.

```php
use DazzaDev\LaravelDgtCr\Facades\LaravelDgtCr;

$client = LaravelDgtCr::getClient();

// Emisor
$client->setIssuer([
    'identification_type' => '02',
    'identification_number' => 'identificacion_emisor',
]);

// Receptor
$client->setReceiver([
    'identification_type' => '02',
    'identification_number' => 'identificacion_receptor',
]);
```

```php
// Usar el valor en inglés de la tabla
$client->setDocumentType('invoice');

// Datos del documento
$client->setDocumentData($documentData);

// Enviar el documento
$document = $client->sendDocument();
```

### Tipos de documentos disponibles

| Documento           | Valor              |
| ------------------- | ------------------ |
| Factura             | `invoice`          |
| Nota de crédito     | `credit-note`      |
| Nota de débito      | `debit-note`       |
| Tiquete Electrónico | `ticket`           |
| Mensaje Receptor    | `receiver-message` |

### Consultar estado del documento enviado

Después de enviar un documento, puedes consultar su estado usando el método `checkStatus`:

```php
$documentStatus = $client->checkStatus(
    documentKey: $clave
);
```

### Buscar un documento

Para buscar un documento debemos pasar la clave del documento que se obtiene al enviar el documento.

```php
$document = $client->getDocument(
    documentKey: $clave
);
```

### Obtener lista de documentos

Para obtener una lista de documentos electrónicos que se han enviado, puedes usar el método `getDocuments`.

```php
$documents = $client->getDocuments(
    offset: 0,
    limit: 50
);
```

### Obtener los listados

El ministerio de hacienda tiene una lista de códigos que este paquete te pone a disposición para facilitar el trabajo de consultar esto en el anexo técnico:

```php
use DazzaDev\LaravelDgtCr\Facades\LaravelDgtCr;

// Obtener los listados disponibles
$listings = LaravelDgtCr::getListings();

// Consultar los datos de un listado por tipo
$listingByType = LaravelDgtCr::getListing('tipos-comprobante');
```

## Contribuciones

Las contribuciones son bienvenidas. Si encuentras algún error o tienes ideas para mejoras, por favor abre un issue o envía un pull request. Asegúrate de seguir las pautas de contribución.

## Autor

Laravel DGT Costa Rica fue creado por [DAZZA](https://github.com/dazza-dev).

## Licencia

Este proyecto está licenciado bajo la [MIT License](https://opensource.org/licenses/MIT).
