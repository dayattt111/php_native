<h1>Hello, <?= htmlspecialchars(
isset($name) ? $name : 'Guest', ENT_QUOTES, 'UTF-8') ?>!</h1>
<p>Ini halaman hello dengan parameter dinamis.</p>
