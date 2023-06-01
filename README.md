# WeMovie

#### Environnement:

```shell 
php 8.2
```

#### Installation via docker:

```shell 
make init
```
#### installation du front
```shell 
yarn install
```
#### site URL
```shell 
http://localhost:8030/
```

####  Test unitaire

```shell 
make test
```

####  Configuration API Client
```shell
    http_client:
        default_options:
            max_redirects: 5
        scoped_clients:
            abstract.api.client:
                timeout: 10
                base_uri: 'https://api.themoviedb.org'
                headers:
                    'Accept': 'application/json'
                auth_bearer: '%env(APP_TOKEN)%'
```