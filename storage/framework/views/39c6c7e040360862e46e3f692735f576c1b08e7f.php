<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $__env->yieldContent('title','Tarefas'); ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100">
<div class="min-h-screen flex">
  <aside class="w-64 bg-white border-r">
    <div class="p-4 text-xl font-bold">Meu Sistema</div>
    <nav class="px-2 space-y-1">
      <a href="<?php echo e(route('categorias.index')); ?>" class="block px-3 py-2 rounded hover:bg-slate-100">Categorias</a>
      <a href="<?php echo e(route('tarefas.index')); ?>" class="block px-3 py-2 rounded hover:bg-slate-100">Tarefas</a>
    </nav>
  </aside>

  <main class="flex-1 p-6">
    <?php if(session('ok')): ?>
      <div class="mb-4 p-3 bg-green-100 border border-green-200 text-green-800 rounded">
        <?php echo e(session('ok')); ?>

      </div>
    <?php endif; ?>
    <?php echo $__env->yieldContent('content'); ?>
  </main>
</div>
</body>
</html>
<?php /**PATH C:\Users\Usuario\OneDrive\Área de Trabalho\trabGe_Tarefas\Gerenc_Tarefas\resources\views/layouts/app.blade.php ENDPATH**/ ?>