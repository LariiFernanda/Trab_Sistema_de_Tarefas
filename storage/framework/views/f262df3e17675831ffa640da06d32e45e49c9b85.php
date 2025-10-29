<?php $__env->startSection('title','Tarefas'); ?>
<?php $__env->startSection('content'); ?>
<div class="flex items-center justify-between mb-4">
  <h1 class="text-2xl font-semibold">Tarefas</h1>
  <a href="<?php echo e(route('tarefas.create')); ?>" class="px-4 py-2 bg-blue-600 text-white rounded">Nova Tarefa</a>
</div>

<form method="GET" class="mb-4">
  <div class="bg-white p-3 rounded shadow flex gap-3 items-center">
    <label class="text-sm">Filtrar por categoria</label>
    <select name="categoria_id" class="border rounded px-3 py-2">
      <option value="">Todas</option>
      <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($cat->id); ?>" <?php if(request('categoria_id')==$cat->id): echo 'selected'; endif; ?>><?php echo e($cat->nome); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <button class="px-4 py-2 border rounded">Aplicar</button>
  </div>
</form>

<div class="bg-white rounded shadow">
  <table class="min-w-full divide-y divide-slate-200">
    <thead class="bg-slate-50">
      <tr>
        <th class="px-4 py-2 text-left">Título</th>
        <th class="px-4 py-2 text-left">Categoria</th>
        <th class="px-4 py-2 text-left">Concluída</th>
        <th class="px-4 py-2"></th>
      </tr>
    </thead>
    <tbody class="divide-y divide-slate-200">
      <?php $__empty_1 = true; $__currentLoopData = $tarefas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
          <td class="px-4 py-2"><?php echo e($t->titulo); ?></td>
          <td class="px-4 py-2"><?php echo e($t->categoria?->nome); ?></td>
          <td class="px-4 py-2">
            <?php if($t->concluida): ?>
              <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">Sim</span>
            <?php else: ?>
              <span class="px-2 py-1 text-xs bg-slate-100 text-slate-700 rounded">Não</span>
            <?php endif; ?>
          </td>
          <td class="px-4 py-2 text-right space-x-2">
            <?php if (! ($t->concluida)): ?>
              <form action="<?php echo e(route('tarefas.concluir',$t)); ?>" method="POST" class="inline">
                <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                <button class="px-3 py-1 border rounded">Concluir</button>
              </form>
            <?php endif; ?>
            <a href="<?php echo e(route('tarefas.edit',$t)); ?>" class="px-3 py-1 border rounded">Editar</a>
            <form action="<?php echo e(route('tarefas.destroy',$t)); ?>" method="POST" class="inline">
              <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
              <button class="px-3 py-1 border rounded text-red-700">Excluir</button>
            </form>
          </td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr><td class="px-4 py-4" colspan="4">Sem registros.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<div class="mt-4"><?php echo e($tarefas->withQueryString()->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\OneDrive\Área de Trabalho\trabGe_Tarefas\Gerenc_Tarefas\resources\views/tarefas/index.blade.php ENDPATH**/ ?>