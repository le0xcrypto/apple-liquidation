# Apple Liquidation

### Starting the project

```bash
docker-compose up
```

Enter the main container called app and init the db

```bash
docker-compose exec app bash

# Than
php artisan db:summon
```

Compile assets

```bash
# You can use provided container (if you dont have node 15.6 installed locally)
docker-compose run --rm node npm run dev
```
