# ScitotecUrlDecodeEnvVarProcessorBundle

A Symfony Bundle containing an [Environment Variable Processors](https://symfony.com/doc/current/configuration/env_var_processors.html) for decoding url-encoded strings.

## Usage

Install and add the bundle:

```shell
composer require scitotec/url-decode-env-var-processor-bundle
```

You can use and combine it with other [Environment Variable Processors](https://symfony.com/doc/current/configuration/env_var_processors.html), e.g.:

```shell
# .env
MONGODB_URL="mongodb://db_user:db_pa%24%24word@127.0.0.1:27017/db_name"
```

```yaml
# config/packages/mongodb.yaml
mongo_db_bundle:
    clients:
        default:
            hosts:
                - { host: '%env(string:key:host:url:MONGODB_URL)%', port: '%env(int:key:port:url:MONGODB_URL)%' }
            username: '%env(string:url_decode:key:user:url:MONGODB_URL)%' # ⬅️
            password: '%env(string:url_decode:key:pass:url:MONGODB_URL)%' # ⬅️
    connections:
        default:
            database_name: '%env(key:path:url:MONGODB_URL)%'
```
