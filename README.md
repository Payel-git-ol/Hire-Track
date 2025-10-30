# HireTrack

Система управления вакансиями с ролевой моделью доступа.

## 🚀 Возможности

- Аутентификация пользователей
- Ролевая система (Администратор, Модератор, Пользователь)
- Управление вакансиями
- API для интеграции
- Фильтрация и поиск вакансий

## 📋 Требования

- PHP 8.2+
- Composer
- PostgreSQL 15+
- Docker (опционально)

## 🛠 Установка

1. Клонируйте репозиторий:
```bash
git clone https://github.com/yourusername/HireTrack.git
cd HireTrack
```

2. Установите зависимости:
```bash
composer install
```

3. Настройте окружение:
```bash
cp .env.example .env
php artisan key:generate
```

4. Запустите Docker (опционально):
```bash
docker-compose up -d
```

5. Выполните миграции:
```bash
php artisan migrate
```

## 🔑 Роли пользователей

### Администратор
- Управление пользователями
- Полный доступ к системе

### Модератор
- Модерация вакансий
- Управление статусами вакансий

### Пользователь
- Создание вакансий
- Просмотр доступных вакансий

## 📚 API Документация

### Аутентификация

```http
POST /api/auth
Content-Type: application/json

{
    "email": "user@example.com",
    "name": "John Doe"
}
```

### Вакансии

#### Получение списка вакансий
```http
GET /api/vacancies
```

#### Создание вакансии
```http
POST /api/vacancies
Content-Type: application/json

{
    "job_title": "PHP Developer",
    "title": "Senior PHP Developer",
    "experience": "5+ years"
}
```

## 🧪 Тестирование

```bash
php artisan test
```

## 🔧 Команды

### Создание пользователей с ролями
```bash
php artisan make:admin {id}
php artisan make:moderator {id}
php artisan make:user {id}
```

## 📦 Структура проекта

```
app/
├── Console/Commands/      # Консольные команды
├── Http/
│   ├── Controllers/      # Контроллеры
│   └── Middleware/       # Промежуточное ПО
├── Models/               # Модели
└── Service/             # Сервисный слой

database/
├── factories/            # Фабрики для тестов
├── migrations/          # Миграции БД
└── seeders/            # Сидеры

routes/
└── api.php             # API маршруты
```
