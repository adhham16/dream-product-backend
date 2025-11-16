<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Laravel Admin Auth & Product API</title>
<style>
    body { font-family: Arial, sans-serif; line-height: 1.6; margin: 20px; }
    pre { background: #f4f4f4; padding: 10px; overflow-x: auto; }
    code { background: #eee; padding: 2px 5px; }
    h1, h2, h3 { color: #333; }
    table { border-collapse: collapse; width: 100%; margin-bottom: 20px; }
    th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
    th { background: #f4f4f4; }
</style>
</head>
<body>

<h1>🚀 Dream Backend Product</h1>

<p>A scalable Laravel API with:</p>
<ul>
<li>Admin authentication via <strong>Sanctum</strong></li>
<li>Protected Product CRUD routes</li>
<li>Service architecture</li>
<li>Filters, pagination, and sorting</li>
<li>Multi-auth support with separate Admin guard</li>
</ul>

<h2>⚡ Features</h2>
<ul>
<li>Admin login & logout</li>
<li>Protected API routes for admins only</li>
<li>Product CRUD with filters and pagination</li>
<li>Clean folder structure</li>
<li>Form Requests for validation</li>
<li>Service-based business logic</li>
</ul>

<h2>⚙️ Installation</h2>
<pre><code>git clone https://github.com/adhham16/dream-product-backend.git
cd your-repo
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
php artisan db:seed --class=AdminSeeder
</code></pre>


<h2>🌐 API Routes</h2>

<h2>🔑 Admin Authentication API</h2>
<table>
<tr><th>Method</th><th>Endpoint</th><th>Description</th></tr>
<tr><td>POST</td><td>/admin/login</td><td>Admin login, returns token</td></tr>
<tr><td>POST</td><td>/admin/logout</td><td>Admin logout, invalidates token</td></tr>
</table>
<h3>Login</h3>
<pre><code>POST /admin/login
{
  "email": "admin@example.com",
  "password": "password123"
}</code></pre>

<h3>Logout</h3>
<pre><code>POST /admin/logout
Authorization: Bearer &lt;token&gt;</code></pre>

<h2>📦 Product API Endpoints</h2>
<table>
<tr><th>Method</th><th>Endpoint</th><th>Description</th></tr>
<tr><td>GET</td><td>/products</td><td>List products</td></tr>
<tr><td>POST</td><td>/products</td><td>Create product</td></tr>
</table>

<h2>🔍 Filters & Pagination</h2>
<pre><code>GET /products?category=electronics&stock_status=in_stock&min_price=100&max_price=500&per_page=20</code></pre>

<h2>▶️ Running the Project</h2>
<pre><code>php artisan serve</code></pre>
<p>Use the token from login for all protected routes:</p>
<pre><code>Authorization: Bearer &lt;token&gt;</code></pre>

<h2>📄 License</h2>
<p>Open-source, free to use.</p>


</body>
</html>
