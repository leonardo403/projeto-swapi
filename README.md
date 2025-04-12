# ✅ projeto-swapi
Calcular paradas SWAPI 

### 🧮 Informações sobre o  cálculo
* Tempo em horas antes de reabastecer = converter(consumables)
* Autonomia da nave = MGLT * tempo_em_horas
* Número de paradas = distância_total / autonomia

### 📦 Instalar composer via terminal

``
composer install
``

### ▶️ Rodar o servidor embutido

``
php -S localhost:8080 -t public
``

Isso serve o diretório public/ na URL:

👉 http://localhost:8000


### ▶️ Rodar o app Docker
#### Na raiz do projeto, execute:
``
docker-compose up --build
``

Depois Acesse em: http://localhost:8080

### ▶️ Rodar os testes dentro no container
``
docker exec -it swapi-php-app ./vendor/bin/phpunit
``

### 🧪Executar os testes
#### Windows
``
vendor\bin\phpunit.bat tests\SwapiServiceTest.php
 ``
#### Linux
 ``
vendor/bin/phpunit tests\SwapiServiceTest.php
 ``
